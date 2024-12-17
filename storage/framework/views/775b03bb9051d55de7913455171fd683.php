<?php $__env->startSection('title', 'List Store'); ?>
<?php $__env->startSection('link'); ?>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" />
  
  <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Danh sách tìm kiếm</h4>
                </div><!-- end card header -->
                <div class="card-body">
                    <div class="live-preview">
                        <div class="table-responsive">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link <?php echo e(session('tab')  == 'products' ? 'active' : ''); ?>" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="<?php echo e(session('tab')  == 'products' ? 'true' : 'false'); ?>">Sản phẩm</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link <?php echo e(session('tab') == 'shops' ? 'active' : ''); ?>" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="<?php echo e(session('tab')  == 'shops' ? 'true' : 'false'); ?>">Cửa hàng</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link <?php echo e(session('tab') == 'users' ? 'active' : ''); ?>" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact-tab-pane" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="<?php echo e(session('tab')  == 'users' ? 'true' : 'false'); ?>">Tài khoản</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link <?php echo e(session('tab') == 'posts' ? 'active' : ''); ?>" id="blog-tab" data-bs-toggle="tab" data-bs-target="#blog-tab-pane" type="button" role="tab" aria-controls="blog-tab-pane" aria-selected="<?php echo e(session('tab')  == 'posts' ? 'true' : 'false'); ?>">Bài viết</button>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade <?php echo e(session('tab')  == 'products' ? 'show active' : ''); ?>" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                                    <table id="product" class="display" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Image</th>
                                                <th>Tên sảm phẩm</th>
                                                <th>SLUG và SKU</th>
                                                <th>Description</th>
                                                <th>Infomation</th>
                                                <th>Price</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__currentLoopData = $resultsByTable["products"]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td><?php echo e($data->id); ?></td>
                                                    <td><img src="<?php echo e($data->image); ?>" alt="<?php echo e($data->name); ?>" style="height: 100px; width: 100px" ></td>
                                                    <td>
                                                        <?php echo e($data->name); ?> <br>
                                                    <?php switch($data->status):
                                                        case (1): ?>
                                                            <span style="color: red;"><b>(Không hoạt động)</b></span>
                                                            <?php break; ?>

                                                        <?php case (2): ?>
                                                            <span style="color: green;"><b>(Đang hoạt động)</b></span>
                                                            <?php break; ?>

                                                        <?php case (3): ?>
                                                        <?php case (101): ?>
                                                            <span style="color: orange;"><b>(Chờ duyệt)</b></span>
                                                            <?php break; ?>

                                                        <?php case (4): ?>
                                                            <span style="color: purple;"><b>(Vi phạm)</b></span>
                                                            <?php break; ?>

                                                        <?php case (5): ?>
                                                            <span style="color: gray;"><b>(Xóa mềm)</b></span>
                                                            <?php break; ?>

                                                        <?php case (0): ?>
                                                            <span style="color: brown;"><b>(Không đồng ý khi duyệt)</b></span>
                                                            <?php break; ?>

                                                        <?php default: ?>
                                                            <span style="color: black;"><b>(Trạng thái không xác định)</b></span>
                                                    <?php endswitch; ?>
                                                    </td>
                                                    <td>
                                                        <b>SKU:</b> <?php echo e($data->sku); ?> 
                                                        <br> 
                                                        <b>SLUG:</b> <?php echo e($data->slug); ?>

                                                    </td>
                                                    <td>
                                                        <?php echo e(\Illuminate\Support\Str::limit($data->description, 100, '...')); ?>

                                                        <!-- <?php echo e($data->description); ?> -->
                                                    </td>
                                                    <td>
                                                        <?php echo e(\Illuminate\Support\Str::limit($data->infomation, 100, '...')); ?>

                                                        <!-- <?php echo e($data->infomation); ?> -->
                                                    </td>
                                                    <td>
                                                        <b>SHOW PRICE:</b> <?php echo e($data->show_price); ?> 
                                                        <br> 
                                                        <b>PRICE:</b> <?php echo e($data->price); ?>

                                                        <br> 
                                                        <b>SALE PRICE:</b> <?php echo e($data->sale_price); ?>

                                                    </td>
                                                    <td>
                                                        <!-- Duyệt -->
                                                        <form action="<?php echo e(route( 'products.approve' ,[
                                                                                                'token' => auth()->user()->refesh_token,
                                                                                                'id' =>$data->id,
                                                                                                'tab'=>'products',
                                                                                                'search'=>$search
                                                                                                ])); ?>" method="POST" style="display:inline;">
                                                            <?php echo csrf_field(); ?>
                                                            <button type="submit" class="btn btn-success" title="Duyệt">
                                                                <i class="ri-check-line align-middle"></i>
                                                            </button>
                                                        </form>
                                                     
                                                        <!-- Báo cáo vi phạm -->
                                                        
                                                            <a href="#" data-bs-toggle="modal" data-bs-target="#reportModal">
                                                                <button type="submit" class="btn btn-danger" title="Báo cáo vi phạm">
                                                                    <i class="ri-error-warning-line align-middle"></i> 
                                                                </button>
                                                            </a>
                                                        
                        
                                                        <!-- Modal Báo cáo vi phạm -->
                                                        <div class="modal fade" id="reportModal" tabindex="-1" aria-labelledby="reportModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="reportModalLabel">Báo cáo vi phạm</h5>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form action="<?php echo e(route('products.submitReport', [
                                                                            'id' =>$data->id,
                                                                            'token' => auth()->user()->refesh_token,
                                                                            'search'=>$search,
                                                                            'tab' => 'products'
                                                                        ])); ?>" method="POST">
                                                                            <?php echo csrf_field(); ?>
                                                                            <div class="mb-3">
                                                                                <label for="reason" class="form-label">Lý do vi phạm:</label>
                                                                                <textarea name="reason" id="reason" class="form-control" required></textarea>
                                                                            </div>
                                                                            <button type="submit" class="btn btn-danger">Gửi báo cáo</button>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                        
                                                    
                                                        <!-- Không duyệt -->
                                                        <form action="<?php echo e(route('products.reject',[
                                                                                                'token' => auth()->user()->refesh_token,
                                                                                                'id' =>$data->id,
                                                                                                'tab'=>'products',
                                                                                                'search'=>$search,
                                                                                                ])); ?>" method="POST" style="display:inline;">
                                                            <?php echo csrf_field(); ?>
                                                            <button type="submit" class="btn btn-warning" title="Không duyệt">
                                                                <i class="ri-close-circle-line align-middle"></i> 
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                    <script>
                                        new DataTable('#product', {
                                            language: {   
                                                lengthMenu: "Hiển thị _MENU_ sản phẩm",
                                                search: "Tìm kiếm:" 
                                            }
                                        });
                                    </script>
                                </div>
                                <div class="tab-pane fade <?php echo e(session('tab') == 'shops' ? 'show active' : ''); ?>" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                                    <table id="shop" class="display" style="width:100%">
                                         <thead>
                                            <tr>
                                                <th scope="col">ID</th>
                                                <th scope="col">Tên cửa hàng</th>
                                                <th scope="col">Thông tin chủ shop</th>
                                                <th scope="col">Địa chỉ</th>
                                                <th scope="col">Ngày tạo</th>
                                                <th scope="col">Hành động</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__currentLoopData = $resultsByTable["shops"]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $shop): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <th scope="row"><a href="#" class="fw-medium"><?php echo e($shop->id); ?></a></th>
                                                    <td style="word-wrap: break-word; white-space: normal; max-width: 200px;">
                                                        <?php echo e($shop->shop_name ?? "Chưa đặt tên"); ?>-<?php echo e($shop->status); ?><br>
                                                        <?php switch($shop->status):
                                                            case (1): ?>
                                                                <span style="color: red;"><b>(Không hoạt động)</b></span>
                                                                <?php break; ?>

                                                            <?php case (2): ?>
                                                                <span style="color: green;"><b>(Đang hoạt động)</b></span>
                                                                <?php break; ?>
                                                            <?php case (101): ?>
                                                                <span style="color: orange;"><b>(Chờ duyệt)</b></span>
                                                                <?php break; ?>

                                                            <?php case (4): ?>
                                                                <span style="color: purple;"><b>(Vi phạm)</b></span>
                                                                <?php break; ?>

                                                            <?php case (5): ?>
                                                                <span style="color: gray;"><b>(Xóa mềm)</b></span>
                                                                <?php break; ?>

                                                            <?php case (0): ?>
                                                                <span style="color: brown;"><b>(Không đồng ý khi duyệt)</b></span>
                                                                <?php break; ?>

                                                            <?php default: ?>
                                                                <span style="color: black;"><b>(Trạng thái không xác định)</b></span>
                                                        <?php endswitch; ?>
                                                    </td>
                                                    <td style="display: flex; align-items: center;">
                                                        <img src="<?php echo e($shop->user[0]->avatar ?? 'assets/images/users/avatar-1.jpg'); ?>" alt="Avatar" class="avatar-xs rounded-circle me-3 material-shadow" style="width: 60px; height: 60px;">
                                                        <div style="display: flex; flex-direction: column;">
                                                            <span style="font-weight: bold;"><?php echo e($shop->user[0]->fullname ?? 'No Name'); ?></span>
                                                            <span style="color: gray;"><?php echo e($shop->user[0]->phone ?? 'No Phone'); ?></span>
                                                            <span style="color: gray;"><?php echo e($shop->user[0]->phone ?? 'No Phone'); ?></span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        -<?php echo e($shop->district); ?> <br>
                                                        -<?php echo e($shop->ward); ?> <br>
                                                        -<?php echo e($shop->pick_up_address); ?> <br>
                                                    </td>
                                                    <td><?php echo e($shop->created_at); ?></td>
                                                    <td>
                                                        <ul class="list-inline">
                                                            <?php if($shop->status == 2): ?>
                                                            <li class="list-inline-item">
                                                                <a 
                                                                    href="<?php echo e(route('changeShopSearch', [
                                                                                                        'token' => auth()->user()->refesh_token,
                                                                                                        'id' => $shop->id,
                                                                                                        'tab' => 'shops',
                                                                                                        'search'=>$search,
                                                                                                        'status' => 4,
                                                                                                        ])); ?>"
                                                                >
                                                                <button type="button" class="btn btn-warning" title="Khóa">
                                                                    <i class="ri-lock-line align-middle"></i>
                                                                </button>  
                                                                </a>
                                                            </li>
                                                            <?php elseif($shop->status == 4): ?>
                                                            <li class="list-inline-item">
                                                                <a 
                                                                    href="<?php echo e(route('changeShopSearch', [
                                                                                                        'token' => auth()->user()->refesh_token,
                                                                                                        'id' => $shop->id,
                                                                                                        'tab' => 'shops',
                                                                                                        'search'=>$search,
                                                                                                        'status' => 2,
                                                                                                        ])); ?>"
                                                                >
                                                                <button type="button" class="btn btn-success" title="mở"> <i class="ri-check-line align-middle"></i></button>
                                                                </a>
                                                            </li>
                                                            <?php endif; ?>
                                                            <?php if($shop->status == 5): ?>
                                                            <li class="list-inline-item mt-2">
                                                                <a 
                                                                    href="<?php echo e(route('changeShopSearch', [
                                                                                                        'token' => auth()->user()->refesh_token,
                                                                                                        'id' => $shop->id,
                                                                                                        'tab' => 'shops',
                                                                                                        'search'=>$search,
                                                                                                        'status' => 2,
                                                                                                        ])); ?>"
                                                                >
                                                                    <button type="button" class="btn rounded-pill btn-danger waves-effect waves-light">Khôi phục</button>
                                                                    </a>
                                                            </li>
                                                            <?php else: ?>
                                                            <li class="list-inline-item mt-2">
                                                                <a 
                                                                    href="<?php echo e(route('changeShopSearch', [
                                                                                                        'token' => auth()->user()->refesh_token,
                                                                                                        'id' => $shop->id,
                                                                                                        'tab' => 'shops',
                                                                                                        'search'=>$search,
                                                                                                        'status' => 5,
                                                                                                        ])); ?>"
                                                                >
                                                                <button type="button" class="btn btn-danger" title="Xóa"  onclick="return confirm('Bạn có chắc chắn muốn xóa khách hàng này?');">
                                                                    <i class="ri-delete-bin-line align-middle"></i>
                                                                </button>
                                                                </a>
                                                            </li>
                                                            <?php endif; ?>
                                                        </ul>
                                                    </td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                   
                                     <script>
                                        new DataTable('#shop', {
                                            language: {   
                                                lengthMenu: "Hiển thị _MENU_ sản phẩm",
                                                search: "Tìm kiếm:" 
                                            }
                                        });
                                    </script>
                                </div>
                                <div class="tab-pane fade <?php echo e(session('tab') == 'users' ? 'show active' : ''); ?>" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">
                                    <table id="usershow" class="display" style="width:100%">
                                        <thead>
                                            <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Ảnh đại diện</th>
                                            <th scope="col">Thông tin tài khoản</th>
                                            <th scope="col">Ngày tạo</th>
                                            <th scope="col">Mức rank và tích điểm</th>
                                            <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__currentLoopData = $resultsByTable["users"]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <th scope="row"><a href="#" class="fw-medium"><?php echo e($user->id); ?></a></th>
                                                <td style="word-wrap: break-word; white-space: normal; max-width: 200px;">
                                                    <img src="<?php echo e($user->avatar ?? 'assets/images/users/avatar-1.jpg'); ?>" alt="Avatar" class="avatar-xs rounded-circle me-3 material-shadow" style="width: 60px; height: 60px;">
                                                </td>
                                                <td style="" class="col-3">
                                                    <div style="display: flex; flex-direction: column;">
                                                        <span style="font-weight: bold;"><?php echo e($user->fullname ?? 'No Name'); ?></span>
                                                        <span style="color: gray;"><?php echo e($user->email ?? 'No Email'); ?></span>
                                                        <span style="color: gray;"><?php echo e($user->phone ?? 'No Phone'); ?></span><br>
                                                        <?php switch($user->status):
                                                            case (1): ?>
                                                                <span style="color: red;"><b>(Không hoạt động)</b></span>
                                                                <?php break; ?>

                                                            <?php case (2): ?>
                                                                <span style="color: green;"><b>(Đang hoạt động)</b></span>
                                                                <?php break; ?>

                                                            <?php case (3): ?>
                                                            <?php case (101): ?>
                                                                <span style="color: orange;"><b>(Chờ duyệt)</b></span>
                                                                <?php break; ?>

                                                            <?php case (4): ?>
                                                                <span style="color: purple;"><b>(Vi phạm)</b></span>
                                                                <?php break; ?>

                                                            <?php case (5): ?>
                                                                <span style="color: gray;"><b>(Xóa mềm)</b></span>
                                                                <?php break; ?>

                                                            <?php case (0): ?>
                                                                <span style="color: brown;"><b>(Không đồng ý khi duyệt)</b></span>
                                                                <?php break; ?>

                                                            <?php default: ?>
                                                                <span style="color: black;"><b>(Trạng thái không xác định)</b></span>
                                                        <?php endswitch; ?>
                                                    </div>
                                                </td>
                                                <td><?php echo e($user->created_at); ?></td>
                                                <td>
                                                    <?php echo e($user->rank->title ?? "Vô danh"); ?>: <?php echo e($user->point); ?> điểm tích lũy
                                                </td>
                                                <td>
                                                    <ul class="list-inline">
                                                        <?php if($user->status == 2): ?>
                                                        <li class="list-inline-item">
                                                            <a 
                                                                href="<?php echo e(route('changeUserSearch', [
                                                                                                    'token' => auth()->user()->refesh_token,
                                                                                                    'id' => $user->id,
                                                                                                    'tab' => 'users',
                                                                                                    'search'=>$search,
                                                                                                    'status' => 4,
                                                                                                    ])); ?>"
                                                            >
                                                            <button type="button" class="btn btn-warning" title="Khóa">
                                                                <i class="ri-lock-line align-middle"></i>
                                                            </button>  
                                                            </a>
                                                        </li>
                                                        <?php elseif($user->status == 4): ?>
                                                        <li class="list-inline-item">
                                                            <a 
                                                                href="<?php echo e(route('changeUserSearch', [
                                                                                                    'token' => auth()->user()->refesh_token,
                                                                                                    'id' => $user->id,
                                                                                                    'tab' => 'users',
                                                                                                    'search'=>$search,
                                                                                                    'status' => 2,
                                                                                                    ])); ?>"
                                                            >
                                                            <button type="button" class="btn btn-success" title="mở"> <i class="ri-check-line align-middle"></i></button>
                                                            </a>
                                                        </li>
                                                        <?php endif; ?>
                                                        <?php if($user->status == 2): ?>
                                                        <li class="list-inline-item mt-2">
                                                            <a 
                                                                href="<?php echo e(route('changeUserSearch', [
                                                                                                    'token' => auth()->user()->refesh_token,
                                                                                                    'id' => $user->id,
                                                                                                    'tab' => 'users',
                                                                                                    'search'=>$search,
                                                                                                    'status' => 5,
                                                                                                    ])); ?>"
                                                            >
                                                            <button type="button" class="btn btn-danger" title="Xóa"  onclick="return confirm('Bạn có chắc chắn muốn xóa khách hàng này?');">
                                                                <i class="ri-delete-bin-line align-middle"></i>
                                                            </button>
                                                            </a>
                                                        </li>
                                                        <?php elseif($user->status == 2): ?>
                                                        <li class="list-inline-item mt-2">
                                                            <a 
                                                                href="<?php echo e(route('changeUserSearch', [
                                                                                                    'token' => auth()->user()->refesh_token,
                                                                                                    'id' => $user->id,
                                                                                                    'tab' => 'users',
                                                                                                    'search'=>$search,
                                                                                                    'status' => 5,
                                                                                                    ])); ?>"
                                                            >
                                                            <button type="button" class="btn btn-danger" title="Xóa"  onclick="return confirm('Bạn có chắc chắn muốn xóa khách hàng này?');">
                                                                <i class="ri-delete-bin-line align-middle"></i>
                                                            </button>
                                                            </a>
                                                        </li>
                                                        <?php elseif($user->status == 3 || $user->status == 101): ?>
                                                        <li class="list-inline-item mt-2">
                                                            <a 
                                                                href="<?php echo e(route('changeUserSearch', [
                                                                                                    'token' => auth()->user()->refesh_token,
                                                                                                    'id' => $user->id,
                                                                                                    'tab' => 'users',
                                                                                                    'search'=>$search,
                                                                                                    'status' => 2,
                                                                                                    ])); ?>"
                                                            >
                                                            
                                                            <button type="button" class="btn btn-success" title="Duyệt">
                                                                <i class="ri-check-line align-middle"></i>
                                                            </button>
                                                        </a>
                                                        </li>
                                                        <?php elseif($user->status == 5): ?>
                                                        <li class="list-inline-item mt-2">
                                                            <a 
                                                                href="<?php echo e(route('changeUserSearch', [
                                                                                                    'token' => auth()->user()->refesh_token,
                                                                                                    'id' => $user->id,
                                                                                                    'tab' => 'users',
                                                                                                    'search'=>$search,
                                                                                                    'status' => 2,
                                                                                                    ])); ?>"
                                                            >
                                                           
                                                            <button type="button" class="btn btn-info" title="khôi phục">
                                                                <i class="ri-refresh-line align-middle"></i>
                                                            </button>
                                                        </a>
                                                        </li>
                                                        <?php elseif($user->status == 1): ?>
                                                        <li class="list-inline-item mt-2">
                                                            <a 
                                                                href="<?php echo e(route('changeUserSearch', [
                                                                                                    'token' => auth()->user()->refesh_token,
                                                                                                    'id' => $user->id,
                                                                                                    'tab' => 'users',
                                                                                                    'search'=>$search,
                                                                                                    'status' => 2,
                                                                                                    ])); ?>"
                                                            >
                                                           
                                                            <button type="button" class="btn btn-success" title="Duyệt">
                                                                <i class="ri-check-line align-middle"></i>
                                                            </button>
                                                        </a>
                                                        </li>

                                                        <?php endif; ?>
                                                        <li class="mt-2 ">
                                                            <a href="#" data-bs-toggle="modal" data-bs-target="#detailsModal-<?php echo e($user->id); ?>">
                                                                <button type="button" class="btn btn-primary" title="Thông tin chi tiết tài khoản">
                                                                    <i class="ri-eye-line align-middle"></i>
                                                                </button>
                                                            </a>
                                                        
                                                            <!-- Modal Chi tiết sản phẩm -->
                                                            <div class="modal fade" id="detailsModal-<?php echo e($user->id); ?>" tabindex="-1" aria-labelledby="detailsModalLabel-<?php echo e($user->id); ?>" aria-hidden="true">
                                                                <div class="modal-dialog modal-lg">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="detailsModalLabel-<?php echo e($user->id); ?>">Thông tin tài khoản</h5>
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
                                                                                            <img src="<?php echo e($user->avatar ?? 'assets/images/users/avatar-1.jpg'); ?>" alt="Avatar" class="rounded-circle me-3 mb-3" style="width: 100px; height: 100px;">
                                                                                        </div>
                                                                                        <!-- Cột trái -->
                                                                                        <div class="col-lg-6">
                                                                                            <div class="mb-3 d-flex ">
                                                                                                <strong>ID:</strong> <span class="text-muted me-5"><?php echo e($user->id); ?></span>
                                                                                                <strong>CHỨC VỤ: </strong> <span class="text-muted"><?php echo e($user->role->title); ?></span>
                                                                                            </div>
                                                                                            <div class="mb-3">
                                                                                                <strong>Tên Tài Khoản:</strong> <span class="text-muted"><?php echo e($user->fullname); ?></span>
                                                                                            </div>
                                                                                            <div class="mb-3">
                                                                                                <strong>Số Điện Thoại:</strong> <span class="text-muted"><?php echo e($user->phone); ?></span>
                                                                                            </div>
                                                                                            <div class="mb-3">
                                                                                                <strong>Email:</strong> <span class="text-muted"><?php echo e($user->email); ?></span>
                                                                                            </div>
                                                                                            <div class="mb-3">
                                                                                                <strong>Giới Tính:</strong> <span class="text-muted"><?php echo e($user->genre); ?></span>
                                                                                            </div>
                                                                                            <div class="mb-3">
                                                                                                <strong>Ngày Sinh Nhật:</strong> <span class="text-muted"><?php echo e($user->datebirth); ?></span>
                                                                                            </div>
                                                                                        </div>
                                                                                        <!-- Cột phải -->
                                                                                        <div class="col-lg-6">
                                                                                            <div class="mb-3">
                                                                                                <strong>Mô Tả:</strong> <span class="text-muted"><?php echo e($user->description); ?></span>
                                                                                            </div>
                                                                                            <div class="mb-3">
                                                                                                <strong>Thành Viên Hạng:</strong> <span class="text-muted"><?php echo e($user->rank->title ?? "Không hạng"); ?></span>
                                                                                            </div>
                                                                                            <div class="mb-3">
                                                                                                <strong>Điểm Tích Lũy:</strong> <span class="text-muted"><?php echo e($user->point); ?></span>
                                                                                            </div>
                                                                                            <div class="mb-3">
                                                                                                <strong>Ngày Tạo:</strong> <span class="text-muted"><?php echo e($user->created_at); ?></span>
                                                                                            </div>
                                                                                            <div class="mb-3">
                                                                                                <strong>Ngày Cập Nhật:</strong> <span class="text-muted"><?php echo e($user->updated_at); ?></span>
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
                                                                                        <?php $__currentLoopData = $user->address; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                        <tr>
                                                                                            <td><?php echo e($data->id); ?></td>
                                                                                            <td><?php echo e($data->type); ?></td>
                                                                                            <td><?php echo e($data->province); ?></td>
                                                                                            <td><?php echo e($data->district); ?></td>
                                                                                            <td><?php echo e($data->ward); ?></td>
                                                                                            <td><?php echo e($data->name); ?></td>
                                                                                            <td><?php echo e($data->phone); ?></td>
                                                                                        </tr>
                                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                                                           
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </td>
                                            </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                        
                                    </table>>
                                    <script>
                                        new DataTable('#usershow', {
                                            language: {   
                                                lengthMenu: "Hiển thị _MENU_ sản phẩm",
                                                search: "Tìm kiếm:" 
                                            }
                                        });
                                    </script>
                                </div>
                                <div class="tab-pane fade <?php echo e(session('tab') == 'posts' ? 'show active' : ''); ?>" id="blog-tab-pane" role="tabpanel" aria-labelledby="blog-tab" tabindex="0">
                                    <table id="blog" class="display" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th scope="col">ID</th>
                                                <th scope="col">blog</th>
                                                <th scope="col">slug</th>
                                                <th scope="col">tiêu đề</th>
                                                <th scope="col">nội dung</th>
                                                <th scope="col">Người tạo</th>
                                                <th scope="col">Hành động</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__currentLoopData = $resultsByTable["posts"]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            
                                            <tr>
                                                <th scope="row"><a href="#" class="fw-medium"><?php echo e($Post->id); ?></a></th>
                                                    <td style="max-width: 150px; white-space: normal; overflow: hidden; text-overflow: ellipsis;"><?php echo e($Post->blog->name ?? "Danh mục đã bị xóa"); ?><br>
                                                    <?php switch($data->status):
                                                        case (1): ?>
                                                            <span style="color: red;"><b>(Không hoạt động)</b></span>
                                                            <?php break; ?>

                                                        <?php case (2): ?>
                                                            <span style="color: green;"><b>(Đang hoạt động)</b></span>
                                                            <?php break; ?>

                                                        <?php case (3): ?>
                                                        <?php case (101): ?>
                                                            <span style="color: orange;"><b>(Chờ duyệt)</b></span>
                                                            <?php break; ?>

                                                        <?php case (4): ?>
                                                            <span style="color: purple;"><b>(Vi phạm)</b></span>
                                                            <?php break; ?>

                                                        <?php case (5): ?>
                                                            <span style="color: gray;"><b>(Xóa mềm)</b></span>
                                                            <?php break; ?>

                                                        <?php case (0): ?>
                                                            <span style="color: brown;"><b>(Không đồng ý khi duyệt)</b></span>
                                                            <?php break; ?>

                                                        <?php default: ?>
                                                            <span style="color: black;"><b>(Trạng thái không xác định)</b></span>
                                                    <?php endswitch; ?></td>
                                                    <td style="max-width: 150px; white-space: normal; overflow: hidden; text-overflow: ellipsis;"><?php echo e($Post->slug); ?></td>
                                                    <td style="max-width: 150px; white-space: normal; overflow: hidden; text-overflow: ellipsis;"><?php echo e($Post->title); ?></td>
                                                    <td style="max-width: 150px; white-space: normal; overflow: hidden; text-overflow: ellipsis;">
                                                        <?php echo e(\Illuminate\Support\Str::limit($Post->content, 150, '...')); ?>

                                                    </td>
                                                    <td style="max-width: 150px; white-space: normal; overflow: hidden; text-overflow: ellipsis;"><?php echo e($Post->user->fullname); ?></td>
                                                    <td>
                                                        <ul class="list-inline">
                                                            <li class="list-inline-item">
                                                                <a 
                                                                    href="<?php echo e(route('change_shop', [
                                                                                                        'token' => auth()->user()->refesh_token,
                                                                                                        'id' => $data->id,
                                                                                                        'tab' => 'blogs',
                                                                                                        'search'=>$search,
                                                                                                        'status' => 4,
                                                                                                        ])); ?>"
                                                                >
                                                                <button type="button" class="btn btn-warning" title="Khóa">
                                                                    <i class="ri-lock-line align-middle"></i>
                                                                </button>  
                                                            </li>
                                                            <li class="list-inline-item mt-2">
                                                                <a 
                                                                    href="<?php echo e(route('change_shop', [
                                                                                                        'token' => auth()->user()->refesh_token,
                                                                                                        'id' => $data->id,
                                                                                                        'tab' => 'blogs',
                                                                                                        'search'=>$search,
                                                                                                        'status' => 5,
                                                                                                        ])); ?>"
                                                                >
                                                                <button type="button" class="btn btn-danger" title="Xóa"  onclick="return confirm('Bạn có chắc chắn muốn xóa khách hàng này?');">
                                                                    <i class="ri-delete-bin-line align-middle"></i>
                                                                </button>
                                                        </li>
                                                    </ul>
                                                </td>
                                            </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>    
                                        </tbody>
                                        
                                    </table>
                                     <script>
                                        new DataTable('#blog', {
                                          
                                        });
                                    </script>
                                </div>
                            </div>  
                        </div>
                    </div>
                </div><!-- end card -->
            </div> 
        </div>
    </div>
</div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\datn_1\resources\views/search/search.blade.php ENDPATH**/ ?>