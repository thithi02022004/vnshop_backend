<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Models\OrdersModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Product;
use App\Jobs\autoCancelOrder;
use App\Jobs\CancelOrderS;
use App\Jobs\sendNotiPrepareCancelOrderForSeller;
use App\Jobs\sendNotiWhenCanceledOrder;
use App\Jobs\sendNotiWhenCanceledOrderForSeller;
use App\Models\order_timelines;
use App\Models\Shop;
use App\Models\UsersModel;
use Carbon\Carbon;
use Tymon\JWTAuth\Facades\JWTAuth;

class OrdersController extends Controller
{
    public function index(Request $request)
    {
        $user = JWTAuth::parseToken()->authenticate();
        $status = $request->status ?? null;
        if ($status == null) {
            $orders = OrdersModel::where('user_id', $user->id)->paginate(15);
        }else{
            $orders = OrdersModel::where('user_id', $user->id)->where('status', $status)->paginate(15);
        }
        if ($orders->isEmpty()) {
            return $this->errorResponse("Không tồn tại Order nào", 404);
        }

        return $this->successResponse('Lấy dữ liệu thành công', $orders);
    }

    public function store(OrderRequest $request)
    {
        "Thường là tự động tạo";
    }

    public function indexOrderToShop($id)
    {
        $orders = OrdersModel::where('shop_id', $id)
            ->with('orderDetails', 'payment') 
            ->paginate(10); 
    
        foreach ($orders as $order) {
            foreach ($order->orderDetails as $orderDetail) {
                if ($orderDetail->variant != null) {
                    $variant = $orderDetail->variant;
                } else {
                    $product = $orderDetail->product;
                }
            }
        }
        foreach ($orders as $key => $order) {
            foreach ($order->orderDetails as $orderDetail) {
                if ($orderDetail->variant) {
                    $orderDetail['product'] = $orderDetail->variant->product;
                    unset($orderDetail->variant['product']);
                }
            }
        }
    
        if ($orders->isEmpty()) {
            return $this->errorResponse("Không tồn tại Order nào", 404);
        }
    
        return $this->successResponse('Lấy dữ liệu thành công', $orders ?? []);
    }
    
    public function indexOrderToUser(Request $request)
    {
        
        $user = JWTAuth::parseToken()->authenticate();
        $order_status = $request->order_status ?? 1;
        $orders = OrdersModel::with(['orderDetails.variant.product', 'shop','payment']) // Eager load 'product' qua 'orderDetails'
            ->where('user_id', $user->id)
            ->where('order_status', $order_status)
            ->orderby('updated_at', 'desc')
            ->paginate(10);

            $orders->appends(['order_status' => $order_status])->links();
            foreach ($orders as $order) {
                foreach ($order->orderDetails as $orderDetail) {
                    if($orderDetail->variant!=null){
                        $variant = $orderDetail->variant;  
                    }else{
                        $product = $orderDetail->product;  
                    }
                  
                }
            }
            foreach ($orders as $key => $order) {
                foreach ($order->orderDetails as $orderDetail  ) {
                    if( $orderDetail->variant){
                       $orderDetail['product']  = $orderDetail->variant->product;
                       unset($orderDetail->variant['product']);
                    }
                }
            }
    
        return $this->successResponse('Lấy dữ liệu thành công', $orders ?? []);
    }

    public function indexOrderToUserNew(Request $request)
    {
        
        $user = JWTAuth::parseToken()->authenticate();
        $order_status = $request->order_status ?? 1;
        $orders = OrdersModel::with(['orderDetails.variant.product', 'shop','payment']) // Eager load 'product' qua 'orderDetails'
            ->where('user_id', $user->id)
            ->where(function ($query) use ($order_status) {
                if ($order_status == 5) {
                    $query->whereIn('order_status', [2, 3, 4, 5]);
                } else {
                    $query->where('order_status', $order_status);
                }
            })
            ->orderby('updated_at', 'desc')
            ->paginate(10);

            $orders->appends(['order_status' => $order_status])->links();
            foreach ($orders as $order) {
                foreach ($order->orderDetails as $orderDetail) {
                    if($orderDetail->variant!=null){
                        $variant = $orderDetail->variant;  
                    }else{
                        $product = $orderDetail->product;  
                    }
                  
                }
            }
            foreach ($orders as $key => $order) {
                foreach ($order->orderDetails as $orderDetail  ) {
                    if( $orderDetail->variant){
                       $orderDetail['product']  = $orderDetail->variant->product;
                       unset($orderDetail->variant['product']);
                    }
                }
            }
    
        return $this->successResponse('Lấy dữ liệu thành công', $orders ?? []);
    }
    

    public function OrderToUserDetail(Request $request, $id)
    {
        
        $user = JWTAuth::parseToken()->authenticate();
        $orders = OrdersModel::with(['orderDetails.variant.product', 'shop','payment']) // Eager load 'product' qua 'orderDetails'
            ->where('user_id', $user->id)
            ->where('id', $id)
            ->get();
            foreach ($orders as $order) {
                foreach ($order->orderDetails as $orderDetail) {
                    if($orderDetail->variant!=null){
                        $variant = $orderDetail->variant;  
                    }else{
                        $product = $orderDetail->product;  
                    }
                  
                }
            }
            foreach ($orders as $key => $order) {
                foreach ($order->orderDetails as $orderDetail  ) {
                    if( $orderDetail->variant){
                       $orderDetail['product']  = $orderDetail->variant->product;
                       unset($orderDetail->variant['product']);
                    }
                }
            }
        return $this->successResponse('Lấy dữ liệu thành công', $orders ?? []);
    }

    public function OrderToShopDetail(Request $request, $id)
    {

        $user = JWTAuth::parseToken()->authenticate();
        $orders = OrdersModel::with(['orderDetails.variant.product', 'shop','payment','timeline']) // Eager load 'product' qua 'orderDetails'
            ->where('id', $id)
            ->get();
            foreach ($orders as $order) {
                foreach ($order->orderDetails as $orderDetail) {
                    if($orderDetail->variant!=null){
                        $variant = $orderDetail->variant;  
                    }else{
                        $product = $orderDetail->product;  
                    }
                  
                }
            }
            
            foreach ($orders as $key => $order) {
                foreach ($order->orderDetails as $orderDetail  ) {
                    if( $orderDetail->variant){
                       $orderDetail['product']  = $orderDetail->variant->product;
                       unset($orderDetail->variant['product']);
                    }
                }
            }
        return $this->successResponse('Lấy dữ liệu thành công', $orders ?? []);
    }

    
    public function HistoryOrderToUser()
{
    $orders = OrdersModel::with('orderDetails')
        ->where('user_id', auth()->id())
        ->where('status', 4)
        ->get();


    if ($orders->isEmpty()) {
        return $this->errorResponse("Không tồn tại Order nào", 404);
    }

    return $this->successResponse('Lấy dữ liệu thành công', $orders);
}

    
    public function show(string $id)
    {
        $order = OrdersModel::find($id);

        if (!$order) {
            return $this->errorResponse("Order không tồn tại", 404);
        }

        return $this->successResponse("Lấy dữ liệu thành công", $order);
    }

    public function update(Request $request, string $id)
    {
        $order = OrdersModel::where('id', $id)->first();
        $user = JWTAuth::parseToken()->authenticate();
        if (!$order) {
            return $this->errorResponse("Order không tồn tại", 404);
        }
        $dataUpdate = [
            'order_status' => $request->order_status ?? $order->order_status,
            'updated_by' => $user->id,
            'updated_at' => Carbon::now(),
        ];

        $status = $request->order_status ?? 0;
        $events = [
            0 => 'Đơn hàng mới',
            1 => 'Đã xác nhận',
            2 => 'Chuẩn bị hàng',
            3 => 'Đã đóng gói',
            4 => 'Đã bàn giao vận chuyển',
            5 => 'Đã vận chuyển',
            6 => 'Giao hàng thất bại',
            7 => 'Đã Giao hàng',
            8 => 'Hoàn thành ',
            9 => 'Hoàn trả',
            10 => 'Đã hủy',
        ];
        if (array_key_exists($status, $events)) {
            $eventTitle = $events[$status];
        }
        order_timelines::create([
            'order_id' => $order->id,
            'title' => $eventTitle ?? 'Éc Éc',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        try {
            $order->update($dataUpdate);
            if ($order->order_status == 8) {
                $order->update(['status' => 1]);
            }
            return $this->successResponse("Order đã được cập nhật", $order);
        } catch (\Throwable $th) {
            return $this->errorResponse("Cập nhật Order không thành công", $th->getMessage());
        }
    }

    public function cancelOrder(Request $request)
    {
        $order = OrdersModel::where('id', $request->id)->first();
        $user = JWTAuth::parseToken()->authenticate();
        if (!$order) {
            return $this->errorResponse("Order không tồn tại", 404);
        }
        $dataUpdate = [
            'order_status' => 10,
            'updated_by' => $user->id,
            'updated_at' => Carbon::now(),
        ];
        try {
            $order->update($dataUpdate);
            return $this->successResponse("Order đã được cập nhật");
        } catch (\Throwable $th) {
            return $this->errorResponse("Cập nhật Order không thành công", $th->getMessage());
        }
    }

    public function destroy(string $id)
    {
        $order = OrdersModel::find($id);

        if (!$order) {
            return $this->errorResponse("Order không tồn tại", 404);
        }

        try {
            $order->update(['status' => 101]);
            return $this->successResponse("Order đã được xóa");
        } catch (\Throwable $th) {
            return $this->errorResponse("Xóa Order không thành công", $th->getMessage());
        }
    }

    private function successResponse($message, $data = null, $status = 200)
    {
        return response()->json([
            'status' => true,
            'message' => $message,
            'data' => $data
        ], $status);
    }

    private function errorResponse($message, $error = null, $status = 400)
    {
        return response()->json([
            'status' => false,
            'message' => $message,
            'error' => $error
        ], $status);
    }

    public function cancel_order_auto()
    {
        CancelOrderS::dispatch();

        return response()->json([
            'status' => 'success',
            'message' => 'Đã hủy đơn hàng tự động'
        ], 200);
    }

}
