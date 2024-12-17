<?php

namespace App\Http\Controllers;
use App\Models\RolesModel;
use Illuminate\Http\Request;
use App\Models\PremissionsModel;
use App\Models\role_premissionModel;
use App\Http\Requests\PermissionsRequest;
use Tymon\JWTAuth\Exceptions\JWTException;

class PremissionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $permissions = PremissionsModel::all();
        return view('roles.list_permission', compact('permissions'));
    }

    public function store(PermissionsRequest $request)
    {
        $dataInsert = [
            "premissionName"=> $request->premissionName,
            "create_at"=> now(),
        ];
        $permission = PremissionsModel::create($dataInsert);
        $dataDone = [
            'status' => true,
            'message' => "Quyền truy cập Đã được lưu",
            'permissions' => PremissionsModel::all(),
        ];
        return response()->json($dataDone, 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            // Xác thực người dùng bằng token JWT
            $permission = PremissionsModel::where('id', $id)->first();
            // dd($permission);
            return response()->json([
                'status' => 'success',
                'message' => 'Lấy dữ liệu thành công',
                'data' => $permission,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Lấy dữ liệu thất bại',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function grant_access(Request $request)
    {
        $role = RolesModel::where('id', $request->role_id)->first();
        if (!$role) {
            return redirect()->route('list_permission', [
                'token' => auth()->user()->refesh_token,
                'id' => $request->role_id
            ])->with('message', 'Vai trò không tồn tại!');
        }
        $selectedPermissions = $request->input('permissions', []); 
        $currentPermissions = role_premissionModel::where('role_id', $role->id)
            ->pluck('premission_id')
            ->toArray();
        $permissionsToAdd = array_diff($selectedPermissions, $currentPermissions);
        $permissionsToRemove = array_diff($currentPermissions, $selectedPermissions);
        foreach ($permissionsToAdd as $permission) {
            role_premissionModel::create([
                "role_id" => $role->id,
                "premission_id" => $permission,
                "create_at" => now(),
            ]);
        }
        role_premissionModel::where('role_id', $role->id)
            ->whereIn('premission_id', $permissionsToRemove)
            ->delete();
        return redirect()->route('list_permission', [
            'token' => auth()->user()->refesh_token,
            'id' => $role->id
        ])->with('message', 'Cập nhật quyền cho vai trò thành công!');
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }
    public function destroy($id)
    {
        // Code để xóa tài nguyên theo $id
    }

    public function delete_access(Request $request)
    {
        $has_permissions = role_premissionModel::where('role_id', $request->role_id)->get();
        $role = RolesModel::where('id', $request->role_id)->first();
  
        if (!$role) {
            return redirect()->route('list_permission', ['token' => auth()->user()->refesh_token, 'has_permissions' => $has_permissions,'id' => $role->id])->with('message', 'Vai trò không tồn tại!');

        }
        // Kiểm tra xem quyền đã tồn tại cho role chưa
        $permissionExist = role_premissionModel::where('role_id', $request->role_id)->first();

        if (!$permissionExist) {
            return redirect()->route('list_permission', ['token' => auth()->user()->refesh_token, 'has_permissions' => $has_permissions,'id' => $role->id])->with('message', 'Quyền chưa được gán cho vai trò này!');
        }
        $permissionExist = role_premissionModel::where('role_id', $request->role_id)->get();
        foreach ($permissionExist as $permission) {
            $permission->delete();
        }
        return redirect()->route('list_permission', ['token' => auth()->user()->refesh_token, 'has_permissions' => $has_permissions,'id' => $role->id])->with('message', 'xóa vai trò thành công!');
    }

}

