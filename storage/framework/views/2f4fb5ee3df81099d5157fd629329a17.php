<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đơn Hàng Thành Công</title>
</head>
<body style="background-color: #f8f9fa; font-family: Arial, sans-serif; margin: 0; padding: 0;">
    <div style="max-width: 600px; margin: 20px auto; background: #ffffff; border-radius: 5px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); overflow: hidden;">
        <!-- Header --> 
        <div style="background-color: #0e64c1; text-align: center; color: #ffffff; padding: 20px;">
            <img src="https://res.cloudinary.com/dg5xvqt5i/image/upload/v1732077788/igagmdm7troprglewvnz.png" alt="Hình ảnh" style="width: 100px; height: auto;">
            <h1 style="margin: 10px 0; font-size: 24px; font-weight: bold;">Đặt Hàng Thành Công!</h1>
        </div>

        <!-- Body -->
        <div style="padding: 20px;">
            <h2 style="text-align: center; margin-bottom: 20px; font-size: 18px; font-weight: normal;">Cảm ơn bạn đã mua sắm tại Shop!</h2>
            <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <!-- Order Info -->
            <div style="border-top: 1px solid #ddd; padding-top: 15px; margin-top: 15px;">
                <p style="margin: 0 0 10px;"><strong><h1><?php echo e($order->shop->shop_name); ?></h1></strong></p>
                <p style="margin: 0 0 10px;"><strong>Mã đơn hàng:</strong> <?php echo e($order->group_order_id); ?></p>
                <p style="margin: 0 0 10px;"><strong>Ngày đặt hàng:</strong> <?php echo e($order->created_at); ?></p>
                <p style="margin: 0 0 10px;"><strong>Phương thức thanh toán:</strong> <?php echo e($paymentMethod); ?></p>
            </div>
            <!-- Product Details -->
            <div style="border-top: 1px solid #ddd; padding-top: 15px; margin-top: 15px;">
                <h4 style="font-size: 16px; font-weight: bold; margin-bottom: 10px;">Chi tiết sản phẩm</h4>
                <ul style="list-style: none; padding: 0; margin: 0;">
                    <?php $__currentLoopData = $orderDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $orderDetail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($orderDetail->order_id == $order->id): ?>
                        <?php if(!$orderDetail->variant_id ): ?>
                            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($orderDetail->product_id == $product->id): ?>
                                    <li style="display: flex; justify-content: space-between; align-items: center; padding: 10px 0; border-bottom: 1px solid #ddd;">
                                        <span>
                                            <img src="<?php echo e($product->image ?? null); ?>" alt="" style="width: 110px; height: 80px; padding-right: 10px;">
                                           
                                        </span>
                                        <?php echo e($product->name ?? null); ?> x<?php echo e($orderDetail->quantity ?? null); ?>

                                        <span style="font-weight: bold;"><?php echo e(number_format($orderDetail->subtotal ?? 0)); ?> đ</span>
                                    </li>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?> 
                                <?php $__currentLoopData = $carts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($cart->product_id == $orderDetail->product_id): ?>
                                        <li style="display: flex; justify-content: space-between; align-items: center; padding: 10px 0; border-bottom: 1px solid #ddd;">
                                            <span>
                                                <img src="<?php echo e($cart->variant_image ?? null); ?>" alt="" style="width: 110px; height: 80px; padding-right: 10px;">
                                               
                                            </span>
                                            <?php echo e(\Illuminate\Support\Str::words($cart->product_name ?? '', 7, '...')); ?> x<?php echo e($orderDetail->quantity ?? null); ?>

                                            <span style="font-weight: bold;"><?php echo e(number_format($orderDetail->subtotal ?? 0)); ?> đ</span>
                                        </li>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <!-- Summary -->
                <div style="border-top: 1px solid #ddd; padding-top: 15px; margin-top: 15px;">
                    <p style="margin: 0 0 10px;">Tổng tiền hàng:
                        <span style="font-weight: bold;"><?php echo e(number_format($subTotal ?? $order->total_amount)); ?>đ</span>
                    </p>
                    <p style="margin: 0 0 10px;">VAT:
                        <span style="font-weight: bold;"><?php echo e(number_format($order->vat ?? 0)); ?>đ</span>
                    </p>
                    <p style="margin: 0 0 10px;">Phí vận chuyển:
                        <span style="font-weight: bold;"><?php echo e(number_format($shipFee) ?? 0); ?>đ</span>
                    </p>
                    <p style="margin: 0 0 10px;">Giảm giá thành viên:
                        <span style="font-weight: bold;"><?php echo e(number_format($order->disscount_by_rank ?? 0)); ?>đ</span>
                    </p>
                    <p style="margin: 0 0 10px;">Mã giảm giá cửa hàng:
                        <span style="font-weight: bold;"><?php echo e(number_format($order->voucher_shop_disscount ?? 0)); ?>đ</span>
                    </p>
                    <p style="margin: 0 0 10px;">Mã giảm giá VNSHOP:
                        <span style="font-weight: bold;"><?php echo e(number_format($order->voucher_main_disscount ?? 0)); ?>đ</span>
                    </p>
                    <p style="margin: 0 0 10px;"><strong>Tổng tiền:</strong>
                        <span style="color: #dc3545; font-weight: bold;"><?php echo e(number_format($order->total_amount ?? 0)); ?>đ</span>
                    </p>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</body>
</html><?php /**PATH D:\laragon\www\datn_1\resources\views/emails/confirm_oder_tocart.blade.php ENDPATH**/ ?>