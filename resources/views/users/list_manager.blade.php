@extends('index')
@section('title', 'List Store')

@section('main')
   <div class="container-fluid">
    <div class="row">
        <div class="col-xl-12">
        <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Danh sách tài khoản quản lý</h4>
                        <a
                            href="{{ route('costomer', ['token' => auth()->user()->refesh_token]) }}"
                            class="nav-link text-primary"
                            style="font-weight: bold;"
                            data-key="t-ecommerce"
                        >
                            Danh sách Khách hàng
                        </a>
                        <div style="width: 20px;">/</div> 
                        <a
                            href="{{ route('manager',['token' => auth()->user()->refesh_token]) }}"
                            class="nav-link text-primary"
                            style="font-weight: bold;"
                            data-key="t-ecommerce"
                        >
                            Danh sách user quản lý
                        </a>

                        <div style="width: 20px;">/</div> 
                        <a
                            href="{{ route('trash_user',['token' => auth()->user()->refesh_token]) }}"
                            class="nav-link text-primary"
                            style="font-weight: bold;"
                            data-key="t-ecommerce"
                        >
                            User đã xóa
                        </a>
                        <div style="width: 20px;"></div> 
                        <!-- Toggle Between Modals -->
                    <button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#firstmodal">Thêm tài khoản</button>
                    <!-- First modal dialog -->
                    <div class="modal fade" id="firstmodal" aria-hidden="true" aria-labelledby="..." tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-body text-center p-5">
                                <form id="addUser">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label for="fullname" class="form-label">Họ Tên</label>
                                                <input type="text" class="form-control" placeholder="Tên tài khoảnkhoản" id="fullname">
                                            </div>
                                        </div><!--end col-->
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label for="email" class="form-label">Email</label>
                                                <input type="email" class="form-control" placeholder="Nhập Email" id="email">
                                            </div>
                                        </div><!--end col-->
                                        <div class="col-6">
                                            <div class="mb-3">
                                                <label for="password" class="form-label">Mật Khẩu</label>
                                                <input type="text" class="form-control" placeholder="*********" id="password">
                                            </div>
                                        </div><!--end col-->
                                        <div class="col-6">
                                        <div class="mb-3">
                                            <label for="role_id" class="form-label">Chức vụ</label>
                                            <select id="role_id" class="form-select" name="role">
                                                <!-- <option value="customer" selected>Khách hàng</option> -->
                                               
                                                @foreach($roles as $role)
                                                    <option value="{{ $role->id }}">{{ $role->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        </div><!--end col-->
                                        <div class="col-lg-12">
                                            <div class="text-end">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </div><!--end col-->
                                    </div><!--end row-->
                                </form>

                                <script>
                                document.getElementById('firstmodal').addEventListener('submit', async function (event) {
                                    event.preventDefault(); // Ngăn chặn hành vi mặc định của form
                                    await addCategory();
                                });

                                async function addCategory() {
                                    const urlParams = new URLSearchParams(window.location.search);
                                    const token = urlParams.get('token');
                                    // console.log(token);
                                    
                                    const fullname = document.getElementById('fullname').value;
                                    const password = document.getElementById('password').value;
                                    const email = document.getElementById('email').value; // Nếu bạn có URL của ảnh
                                    const role_id = document.getElementById('role_id').value;
                                    
                                    const data = {
                                        fullname: fullname,
                                        password: password,
                                        email: email,
                                        role_id: role_id
                                    };
                                    // console.log(data);
                                    
                                    try {
                                        const res = await fetch(`https://vnshop.top/api/users/register`, {
                                            method: 'POST',
                                            headers: {
                                                'Content-Type': 'application/json',
                                                'Authorization': `Bearer ${token}` // Gắn Bearer Token vào header
                                            },
                                            body: JSON.stringify(data)});
                                        const payload = await res.json();
                                        if(!res.ok) {
                                            throw new Error('Network response was not ok');
                                        }
                                        alert('Thêm Tài khoản thành công!');
                                        window.location.reload();
                                        } catch (error) {
                                        console.error('Error:', error);
                                        alert('Đã xảy ra lỗi: ' + error.message);
                                        }
                                }
                                </script>


                                </div>
                            </div>
                        </div>
                    </div>
                    </div><!-- end card header -->
    
                    <div class="card-body">
                        <div class="live-preview">
                            <div class="table-responsive">
                                <table class="table align-middle table-nowrap mb-0">
                                    <thead>
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Ảnh đại diện</th>
                                            <th scope="col">Thông tin tài khoản</th>
                                            {{-- <th scope="col">Địa chỉ</th> --}}
                                            <th scope="col">Ngày tạo</th>
                                            
                                            <th scope="col ">Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if($users->isEmpty())
                                            <tr>
                                                <td colspan="6" class="text-center">Không có tài khoản khách hàng nào.</td>
                                            </tr>
                                        @else
                                            @foreach($users as $user)
                                                <tr>
                                                    <th scope="row"><a href="#" class="fw-medium">{{ $user->id }}</a></th>
                                                    <td style="word-wrap: break-word; white-space: normal; max-width: 200px;">
                                                        <img src="{{$user->avatar ?? 'assets/images/users/avatar-1.jpg'}}" alt="Avatar" class="avatar-xs rounded-circle me-3 material-shadow" style="width: 60px; height: 60px;">
                                                    </td>
                                                    <td style="word-wrap: break-word; white-space: normal; max-width: 200px;">
                                                        <div style="display: flex; flex-direction: column;">
                                                            <span style="font-weight: bold;">{{$user->fullname ?? 'No Name'}}</span>
                                                            @if( optional($user->role)->title == "OWNER")
                                                            <span class="badge bg-success text-white" style="width:200px; font-size: 1rem; padding: 5px 10px;">{{ optional($user->role)->title ?? 'No Role' }}</span>
                                                            @else
                                                            <span class="badge bg-info text-white" style="width:200px; font-size: 1rem; padding: 5px 10px;">{{ optional($user->role)->title ?? 'No Role' }}</span>
                                                            @endif
                                                        </div>
                                                    </td>
                                                    {{-- <td>
                                                        @foreach($user->address as $address)
                                                            *. {{ $address->district }}_{{ $address->ward }}_{{ $address->address }}<br>
                                                        @endforeach
                                                    </td> --}}
                                                    <td>
                                                        {{ $user->created_at}}
                                                        {{-- {{ $user->status}} --}}
                                                    </td>
                                                    
                                                    <td>
                                                    <ul class="list-inline">
                                                        @if ($user->status == 1)
                                                            <li class="list-inline-item">
                                                                <a 
                                                                    href="{{ route('change_user', [
                                                                                                        'token' => auth()->user()->refesh_token,
                                                                                                        'id' => $user->id,
                                                                                                        'status' => 4,
                                                                                                        ]) }}"
                                                                >
                                                                <button type="button" class="btn btn-warning" title="Khóa">
                                                                    <i class="ri-lock-line align-middle"></i>
                                                                </button>                                                                </a>
                                                            </li>
                                                            <li class="list-inline-item">
                                                                <a 
                                                                    href="{{ route('change_user', [
                                                                                                        'token' => auth()->user()->refesh_token,
                                                                                                        'id' => $user->id,
                                                                                                        'status' => 4,
                                                                                                        ]) }}"
                                                                >
                                                                <button type="button" class="btn btn-warning" title="Vi phạm"> <i class="ri-error-warning-line align-middle"></i></button>
                                                            </li>
                                                        @elseif($user->status == 4 ||  $user->status ==  2)
                                                            <li class="list-inline-item">
                                                            <a 
                                                                href="{{ route('change_user', [
                                                                                                    'token' => auth()->user()->refesh_token,
                                                                                                    'id' => $user->id,
                                                                                                    'status' => 1,
                                                                                                    ]) }}"
                                                            >
                                                            <button type="button" class="btn btn-success" title="mở"> <i class="ri-check-line align-middle"></i></button>
                                                            </li>
                                                        @endif
                                                        
                                                        <li class="list-inline-item">
                                                            <a 
                                                                    href="{{ route('change_user', [
                                                                                                        'token' => auth()->user()->refesh_token,
                                                                                                        'id' => $user->id,
                                                                                                        'status' => 5,
                                                                                                        ]) }}"
                                                            >
                                                            <button type="button" class="btn btn-danger" title="Xóa"  onclick="return confirm('Bạn có chắc chắn muốn xóa khách hàng này?');">
                                                                <i class="ri-delete-bin-line align-middle"></i>
                                                        </button>
                                                            </a>
                                                        </li>
                                                        <li class="list-inline-item">
                                                            <a href="#" data-bs-toggle="modal" data-bs-target="#detailsModal-{{ $user->id }}">
                                                                <button type="button" class="btn btn-primary" title="Chi tiết sản phẩm">
                                                                    <i class="ri-eye-line align-middle"></i>
                                                                </button>
                                                            </a>
                                                        
                                                            <!-- Modal Chi tiết sản phẩm -->
                                                            <div class="modal fade" id="detailsModal-{{ $user->id }}" tabindex="-1" aria-labelledby="detailsModalLabel-{{ $user->id }}" aria-hidden="true">
                                                                <div class="modal-dialog modal-xl">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="detailsModalLabel-{{ $user->id }}">Thông tin tài khoản</h5>
                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <div class="card shadow-sm">
                                                                                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                                                                                    <h5 class="mb-0 text-white">Thông Tin Tài Khoản</h5>
                                                                                    <span class="badge bg-success">Hoạt Động</span>
                                                                                </div>
                                                                                <div class="card-body">
                                                                                    <div class="row">
                                                                                        <div class="">
                                                                                            <img src="{{$user->avatar ?? 'assets/images/users/avatar-1.jpg'}}" alt="Avatar" class="rounded-circle me-3 mb-3" style="width: 100px; height: 100px;">
                                                                                        </div>
                                                                                        <!-- Cột trái -->
                                                                                        <div class="col-lg-6">
                                                                                            <div class="mb-3 d-flex ">
                                                                                                <strong>ID:</strong> <span class="text-muted me-5">{{ $user->id }}</span>
                                                                                                <strong>CHỨC VỤ: </strong> <span class="text-muted">{{ $user->role->title}}</span>
                                                                                            </div>
                                                                                            <div class="mb-3">
                                                                                                <strong>Tên Tài Khoản:</strong> <span class="text-muted">{{ $user->fullname }}</span>
                                                                                            </div>
                                                                                            <div class="mb-3">
                                                                                                <strong>Số Điện Thoại:</strong> <span class="text-muted">{{ $user->phone }}</span>
                                                                                            </div>
                                                                                            <div class="mb-3">
                                                                                                <strong>Email:</strong> <span class="text-muted">{{ $user->email }}</span>
                                                                                            </div>
                                                                                            <div class="mb-3">
                                                                                                <strong>Giới Tính:</strong> <span class="text-muted">{{ $user->genre }}</span>
                                                                                            </div>
                                                                                            <div class="mb-3">
                                                                                                <strong>Ngày Sinh Nhật:</strong> <span class="text-muted">{{ $user->datebirth }}</span>
                                                                                            </div>
                                                                                        </div>
                                                                                        <!-- Cột phải -->
                                                                                        <div class="col-lg-6">
                                                                                            <div class="mb-3">
                                                                                                <strong>Mô Tả:</strong> <span class="text-muted">{{ $user->description }}</span>
                                                                                            </div>
                                                                                            <div class="mb-3">
                                                                                                <strong>Thành Viên Hạng:</strong> <span class="text-muted">{{ $user->rank->title ?? "Không hạng" }}</span>
                                                                                            </div>
                                                                                            <div class="mb-3">
                                                                                                <strong>Điểm Tích Lũy:</strong> <span class="text-muted">{{ $user->point }}</span>
                                                                                            </div>
                                                                                            <div class="mb-3">
                                                                                                <strong>Ngày Tạo:</strong> <span class="text-muted">{{ $user->created_at }}</span>
                                                                                            </div>
                                                                                            <div class="mb-3">
                                                                                                <strong>Ngày Cập Nhật:</strong> <span class="text-muted">{{ $user->updated_at }}</span>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            <!-- Danh Sách Địa Chỉ -->
                                                                            <div class="mt-5">
                                                                                <h4 class="mb-3">Danh Sách Địa Chỉ</h4>
                                                                                <table class="table table-bordered table-hover shadow-sm">
                                                                                    <thead class="table-light">
                                                                                        <tr>
                                                                                            <th>#</th>
                                                                                            <th>Phân Loại</th>
                                                                                            <th>Tỉnh/Thành</th>
                                                                                            <th>Quận/Huyện</th>
                                                                                            <th>Xã/Phường</th>
                                                                                            <th>Người Nhận</th>
                                                                                            <th>Số Điện Thoại</th>
                                                                                        </tr>
                                                                                    </thead>
                                                                                    <tbody>
                                                                                        @foreach($user->address as $data)
                                                                                        <tr>
                                                                                            <td>{{$data->id}}</td>
                                                                                            <td>{{$data->type}}</td>
                                                                                            <td>{{$data->province}}</td>
                                                                                            <td>{{$data->district}}</td>
                                                                                            <td>{{$data->ward}}</td>
                                                                                            <td>{{$data->name}}</td>
                                                                                            <td>{{$data->phone}}</td>
                                                                                        </tr>
                                                                                        @endforeach
                                                                                    </tbody>
                                                                                </table>
                                                                            </div>
                                                                         </div>
                                                                       
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="list-inline-item">
                                                            
                                                            <a href="#" data-bs-toggle="modal" data-bs-target="#changeRolechangeRole-{{ $user->id }}">
                                                                <button type="button" class="btn btn-success" title="Cập nhật chức vụ cho user">
                                                                    <i class="ri-edit-line align-middle"></i>
                                                                </button>
                                                            </a>
                                                        
                                                            <!-- Modal Chi tiết sản phẩm -->
                                                            <div class="modal fade" id="changeRolechangeRole-{{ $user->id }}" tabindex="-1" aria-labelledby="changeRolechangeRoleLabel-{{ $user->id }}" aria-hidden="true">
                                                                <div class="modal-dialog modal-xl">
                                                                    <div class="modal-content"  style="width: 400px; margin: 0 auto">
                                                                    <form action="{{ route('user_change_role', ['id' => $user->id, 'token' => auth()->user()->refesh_token]) }}" method="POST">
                                                                        @csrf
                                                                        @method('PUT')
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="changeRolechangeRoleLabel-{{ $user->id }}">Cập nhật chức vụ cho user</h5>
                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                        <select id="role_id" name="roleId" class="form-control js-example-templating">
                                                                                <option value="{{$user->role->id}}">{{ $user->role->title}}</option>
                                                                                @foreach($roles as $role)
                                                                                    <option value="{{$role->id}}">{{$role->title}}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                       
                                                                        <div class="modal-footer">
                                                                            <button type="submit" class="btn btn-secondary" onclick="return confirm('Bạn có chắc muốn thay đổi chức vụ của tài khoản này ???') "> cập nhật</button>
                                                                        </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                       
                                                    </td>
                                                    
                                                    
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
    
                        <!-- Pagination Links -->
                        
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="mt-3">
                                    {{ $users->appends(['token' => auth()->user()->refesh_token])->links() }}
                                </div>
                                <a
                                    href="{{ route('trash_user',['token' => auth()->user()->refesh_token]) }}"
                                    class="nav-link text-primary"
                                    style="font-weight: bold;"
                                    data-key="t-ecommerce"
                                >
                                    User đã xóa
                                </a>
                            </div>
                    </div><!-- end card-body -->
                </div><!-- end card -->
            
        </div> 


    </div>
   </div>


@endsection
