<?php $__env->startSection('title', 'List Store'); ?>
<?php $__env->startSection('link'); ?>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" />
  
  <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main'); ?>
   <div class="container-fluid">
    
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link <?php echo e($tab == 1 ? 'active' : ''); ?>" id="home-tab" data-bs-toggle="tab" data-bs-target="#all-products" type="button" role="tab" aria-controls="all-products" aria-selected="<?php echo e($tab == 1 ? 'true' : 'false'); ?>">Tất cả(<?php echo e($allProductsCount); ?>)</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link <?php echo e($tab == 2 ? 'active' : ''); ?>" id="pending-tab" data-bs-toggle="tab" data-bs-target="#pending-products" type="button" role="tab" aria-controls="pending-products" aria-selected="<?php echo e($tab == 2 ? 'true' : 'false'); ?>">Chờ duyệt sản phẩm mới(<?php echo e($newProductsCount); ?>)</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link <?php echo e($tab == 6 ? 'active' : ''); ?>" id="pending-update-tab" data-bs-toggle="tab" data-bs-target="#pending-update-products" type="button" role="tab" aria-controls="pending-products" aria-selected="<?php echo e($tab == 6 ? 'true' : 'false'); ?>">Chờ duyệt sản phẩm cập nhật(<?php echo e($allUpdateProductsCount); ?>)</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link <?php echo e($tab == 3 ? 'active' : ''); ?>" id="active-tab" data-bs-toggle="tab" data-bs-target="#active-products" type="button" role="tab" aria-controls="active-products" aria-selected="<?php echo e($tab == 3 ? 'true' : 'false'); ?>">Đang hoạt động(<?php echo e($activeProductsCount); ?>)</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link <?php echo e($tab == 4 ? 'active' : ''); ?>" id="rejected-tab" data-bs-toggle="tab" data-bs-target="#rejected-products" type="button" role="tab" aria-controls="rejected-products" aria-selected="<?php echo e($tab == 4 ? 'true' : 'false'); ?>">Đã từ chối(<?php echo e($rejectedProductsCount); ?>)</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link <?php echo e($tab == 5 ? 'active' : ''); ?>" id="violating-tab" data-bs-toggle="tab" data-bs-target="#violating-products" type="button" role="tab" aria-controls="violating-products" aria-selected="<?php echo e($tab == 5 ? 'true' : 'false'); ?>">Vi phạm(<?php echo e($violatingProductsCount); ?>)</button>
        </li>
    </ul>
    
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade <?php echo e($tab == 1 ? 'show active' : ''); ?>" id="all-products" role="tabpanel" aria-labelledby="home-tab">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Tất cả sản phẩm</h4>
                        <div class="dropdown" >
                            <button class="btn dropdown-toggle" style="border: 1px solid #747474;" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                Xuất FILE Excel
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="<?php echo e(route('exportdata', ['data' => 'products', 'status' => 0])); ?>">Xuất sản phẩm từ chối duyệt </a>
                                <a class="dropdown-item" href="<?php echo e(route('exportdata', ['data' => 'products', 'status' => 2])); ?>">Xuất Sản phẩm đang hoạt động</a>
                                <a class="dropdown-item" href="<?php echo e(route('exportdata', ['data' => 'products', 'status' => 3])); ?>">Xuất Sản phẩm chờ duyệt</a>
                                <a class="dropdown-item" href="<?php echo e(route('exportdata', ['data' => 'products', 'status' => 4])); ?>">Xuất Sản phẩm vi phạm</a>
                            </div>
                        </div>
                    </div><!-- end card header -->
                    <!-- Single Button Dropdown -->
                   
                    <div class="card-body">
                        <div class="live-preview">
                            <div class="table-responsive">
                                <table id="all"  class="table align-middle table-nowrap mb-0">
                                    <thead>
                                        <tr>
                                            <th scope="col-1">ID Sản phẩm</th>
                                            <th scope="col-3">Hình ảnh</th>
                                            <th scope="col-3">Tên sản phẩm</th>
                                            <th scope="col-3">Mã SKU</th>
                                            <th scope="col">Giá Sản phẩm</th>
                                            <th scope="col-3">Tên Shop</th> 
                                            <th scope="col">Trạng thái</th>
                                            <th scope="col">Ngày tạo</th>
                                          
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if($mergedProducts->isEmpty()): ?>
                                            
                                        <?php else: ?>
                                            <?php $__currentLoopData = $mergedProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <th scope="row"><a href="#" class="fw-medium"><?php echo e($product->id); ?></a></th>
                                                    <td>
                                                        <img src="<?php echo e($product->image); ?>" alt="<?php echo e($product->name); ?>" style="width: 50px; height: 50px;">
                                                        
                                                        
                                                    </td>
                                                    <td style="word-wrap: break-word; white-space: normal; max-width: 200px;">
                                                        <?php echo e($product->name); ?>

                                                    </td>
                                                    <td><?php echo e($product->sku); ?></td>
                                                    <td><?php echo e(number_format($product->price, 0, ',', '.')); ?> VNĐ</td>
                                                    <td><?php echo e($product->shop->shop_name ?? "vô danh"); ?></td> 
                                                    <td>
                                                        <?php if($product->status == 3): ?>
                                                        Chưa duyệt
                                                    <?php elseif($product->status == 2): ?>
                                                        Đang hoạt động
                                                    <?php elseif($product->status == 0): ?>
                                                        Đã từ chối
                                                    <?php elseif($product->status == 4): ?>
                                                        Vi phạm
                             
                                                   
                                                    <?php endif; ?>
                                                    <td><?php echo e($product->created_at); ?></td>    
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
    
                        <!-- Pagination Links -->
                        <div class="mt-3">
                            <script>
                                new DataTable('#all', {
                                    language: {   
                                        lengthMenu: "Hiển thị _MENU_ sản phẩm",
                                        search: "Tìm kiếm:" 
                                    }
                                });
                            </script>
                            
                        </div>
                    </div><!-- end card-body -->
                </div><!-- end card -->
            </div>
            <!-- end col -->
        </div>
       
        <div class="tab-pane fade <?php echo e($tab == 2 ? 'show active' : ''); ?>" id="pending-products" role="tabpanel" aria-labelledby="pending-tab">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Danh sách sản phẩm mới chờ duyệt</h4>
                    </div><!-- end card header -->
    
                    <div class="card-body">
                        <div class="live-preview">
                            <div class="table-responsive">
                                <table id="pending" class="table align-middle table-nowrap mb-0">
                                    <thead>
                                        <tr>
                                            <th scope="col" style="width: 10%;">ID Sản phẩm</th>
                                            <th scope="col" style="width: 15%;">Hình ảnh</th>
                                            <th scope="col" style="width: 20%;">Tên sản phẩm</th>
                                            <th scope="col" style="width: 10%;">Mã SKU</th>
                                            <th scope="col" style="width: 15%;">Giá Sản phẩm</th>
                                            <th scope="col" style="width: 15%;">Tên Shop</th>
                                            <th scope="col" style="width: 10%;">Trạng thái</th>
                                            <th scope="col" style="width: 10%;">Ngày tạo</th>
                                            <th scope="col" style="width: 10%;">Hành động</th>
                                            

                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if($pendingProducts->isEmpty()): ?>
                                            
                                        <?php else: ?>
                                            <?php $__currentLoopData = $pendingProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <th scope="row"><a href="#" class="fw-medium"><?php echo e($product->id); ?></a></th>
                                                    <td>
                                                        <img src="<?php echo e($product->image); ?>" alt="<?php echo e($product->name); ?>" style="width: 50px; height: 50px;">
                                                        
                                                    </td>
                                                    <td style="word-wrap: break-word; white-space: normal; max-width: 200px;">
                                                        <?php echo e($product->name); ?>

                                                    </td>
                                                    <td><?php echo e($product->sku); ?></td>
                                                    <td><?php echo e(number_format($product->price, 0, ',', '.')); ?> VNĐ</td>
                                                    <td style="word-wrap: break-word; white-space: normal; max-width: 50px;" ><?php echo e($product->shop->shop_name ?? null); ?></td> 
                                                    <td>
                                                        <?php if($product->status == 3): ?>
                                                        Chưa duyệt
                                                    <?php endif; ?>
                                                    <td><?php echo e($product->created_at); ?></td>
                                                    <td>
                                                        <div>
                                                        <!-- Duyệt -->
                                                        <form action="<?php echo e(route( 'products.approve' ,[
                                                                                                'token' => auth()->user()->refesh_token,
                                                                                                'id' => $product->id,
                                                                                                'tab'=>2,
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
                                                                            'id' => $product->id,
                                                                            'token' => auth()->user()->refesh_token,
                                                                            'tab' => 2
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
                                                    </div>
                                                    <div class="mt-2">
                                                        <!-- Không duyệt -->
                                                        <form action="<?php echo e(route('products.reject',[
                                                                                                'token' => auth()->user()->refesh_token,
                                                                                                'id' => $product->id,
                                                                                                'tab'=>2,
                                                                                                ])); ?>" method="POST" style="display:inline;">
                                                            <?php echo csrf_field(); ?>
                                                            <button type="submit" class="btn btn-warning" title="Không duyệt">
                                                                <i class="ri-close-circle-line align-middle"></i> 
                                                            </button>
                                                        </form>
                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#detailsModal-<?php echo e($product->id); ?>">
                                                            <button type="button" class="btn btn-primary" title="Chi tiết sản phẩm">
                                                                <i class="ri-eye-line align-middle"></i>
                                                            </button>
                                                        </a>
                                                    
                                                        <!-- Modal Chi tiết sản phẩm -->
                                                        <div class="modal fade" id="detailsModal-<?php echo e($product->id); ?>" tabindex="-1" aria-labelledby="detailsModalLabel-<?php echo e($product->id); ?>" aria-hidden="true">
                                                            <div class="modal-dialog modal-lg">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="detailsModalLabel-<?php echo e($product->id); ?>">Thông tin sản phẩm chi tiết</h5>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="card shadow-sm">
                                                                            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                                                                                <h5 class="mb-0 text-white">Sản phẩm chi tiết</h5>
                                                                                <span class="badge bg-success">
                                                                                    <?php if($product->status == 3): ?>
                                                                                    Chưa duyệt
                                                                                        <?php endif; ?>
                                                                                </span>
                                                                            </div>
                                                                            <div class="card-body">
                                                                              <div class="mb-5 d-flex">
                                                                                    <span class="text-muted"> 
                                                                                       <?php $__currentLoopData = $product->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                           <img style="width:100px; height: 100px; " src="<?php echo e($image->url); ?>" alt="Product Image">
                                                                                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                                   </span>
                                                                                  
                                                                               </div>
                                                                                <div class="row">
                                                                                   
                                                                                    <!-- Cột trái -->
                                                                                    <div class="col-lg-6">
                                                                                      
                                                                                        <div class="mb-3 d-flex ">
                                                                                            <strong>ID:</strong> <span class="text-muted me-5"><?php echo e($product->id); ?></span> 
                                                                                        </div>
                                                                                        <div class="mb-3 d-flex ">
                                                                                            <strong>Tên sản phẩm: </strong> <span class="text-muted"><?php echo e($product->name); ?></span>
                                                                                        </div>
                                                                                       
                                                                                       
                                                                                        <div class="mb-3">
                                                                                            <strong>Mã SKU:</strong> <span class="text-muted"><?php echo e($product->sku); ?></span>
                                                                                        </div>
                                                                                        <div class="mb-3">
                                                                                            <strong>Giá sản phẩm:</strong> <span class="text-muted"><?php echo e(number_format($product->price, 0, ',', '.')); ?> VNĐ</span>
                                                                                        </div>
                                                                                    </div>
                                                                                    <!-- Cột phải -->
                                                                                    <div class="col-lg-6">
                                                                                        <div class="mb-3">
                                                                                            <strong>Tên Shop</strong> <span class="text-muted"><?php echo e($product->shop->shop_name ?? null); ?></span>
                                                                                        </div>
                                                                                        <div class="mb-3">
                                                                                            <strong>Trạng thái:</strong> <span class="text-muted">
                                                                                                <?php if($product->status == 3): ?>
                                                                                                Chưa duyệt
                                                                                                    <?php endif; ?>
                                                                                            </span>
                                                                                        </div>
                                                                                        <div class="mb-3">
                                                                                            <strong>Ngày tạo:</strong> <span class="text-muted"><?php echo e($product->created_at); ?></span>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <!-- Danh Sách Địa Chỉ -->
                                                                        <div class="mt-5">
                                                                            <h4 class="mb-3">Biến thể sản phẩm</h4>
                                                                            <table class="table table-bordered table-hover shadow-sm">
                                                                                <thead class="table-light">
                                                                                    <tr>
                                                                                        <th>id</th>
                                                                                        <th>Tên biến thể</th>
                                                                                        <th>Hình ảnh</th>
                                                                                        <th>Mã Sku</th>
                                                                                        <th>Giá </th>
                
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                    <?php $__currentLoopData = $product->variants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $variant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                    <tr>
                                                                                        <td><?php echo e($variant->id); ?></td>
                                                                                        <td><?php echo e($variant->name); ?></td>
                                                                                        <td>
                                                                                           
                                                                                                <img src="<?php echo e($variant->images); ?>" alt="Product Image" style="width: 50px; height: 50px; margin-right: 5px;">
                                                                        
                                                                                        </td>
                                                                                        <td><?php echo e($variant->sku); ?></td>
                                                                                        <td><?php echo e(number_format($variant->price, 0, ',', '.')); ?> VNĐ</td>
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
                                                     </div>
                                                    </td>
                                                    
                                                    
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
    
                        <div class="mt-3">
                            <script>
                                new DataTable('#pending', {
                                    language: {   
                                        lengthMenu: "Hiển thị _MENU_ sản phẩm",
                                        search: "Tìm kiếm:" 
                                    }
                                });
                            </script>
                        </div>
                    </div><!-- end card-body -->
                </div><!-- end card -->
            </div>
            <!-- end col -->
        </div>
        <div class="tab-pane fade <?php echo e($tab == 6 ? 'show active' : ''); ?>" id="pending-update-products" role="tabpanel" aria-labelledby="pending-update-tab">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Danh sách sản phẩm cập nhật chờ duyệt</h4>
                    </div><!-- end card header -->
    
                    <div class="card-body">
                        <div class="live-preview">
                            <div class="table-responsive">
                                <table id="update2" class="table align-middle table-nowrap mb-0">
                                    <thead>
                                        <tr>
                                            <th scope="col">ID Sản phẩm</th>
                                            <th scope="col">Hình ảnh</th>
                                            <th scope="col">Tên sản phẩm</th>
                                            <th scope="col">Mã SKU</th>
                                            <th scope="col">Giá Sản phẩm</th>
                                            <th scope="col">Tên Shop</th> 
                                            <th scope="col">Ngày tạo</th>
                                            <th scope="col">Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if($allUpdateProducts->isEmpty()): ?>
                                            
                                        <?php else: ?>
                                            <?php $__currentLoopData = $allUpdateProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <th scope="row"><a href="" class="fw-medium"><?php echo e($product->product_id); ?></a></th>
                                                    <td>
                                                        <img src="<?php echo e($product->image); ?>" alt="<?php echo e($product->name); ?>" style="width: 50px; height: 50px;">
                                                        
                                                     
                                                    </td>
                                                    <td style="word-wrap: break-word; white-space: normal; max-width: 200px;">
                                                        <?php echo e($product->name); ?>

                                                    </td>
                                                    <td><?php echo e($product->sku); ?></td>
                                                    <td><?php echo e(number_format($product->price, 0, ',', '.')); ?> VNĐ</td>
                                                    <td style="word-wrap: break-word; white-space: normal; max-width: 50px;" ><?php echo e($product->shop->shop_name ?? null); ?></td>
                                                    
                                                    <td><?php echo e($product->created_at); ?></td>
                                                    <td>
                                                        <!-- Duyệt -->
                                                        <form action="<?php echo e(route( 'handleUpdateProduct' ,[
                                                                                                'token' => auth()->user()->refesh_token,
                                                                                                'id' => $product->product_id,
                                                                                                'action'=> 1,
                                                                                                'tab'=>6,
                                                                                                ])); ?>" method="POST" style="display:inline;">
                                                            <?php echo csrf_field(); ?>
                                                            <button type="submit" class="btn btn-success" title="Duyệt">
                                                                <i class="ri-check-line align-middle"></i>
                                                            </button>
                                                        </form>
                                                        <!-- Không duyệt -->
                                                        <form action="<?php echo e(route('handleUpdateProduct',[
                                                                                                'token' => auth()->user()->refesh_token,
                                                                                                'id' => $product->product_id,
                                                                                                'action'=> 2,
                                                                                                'tab'=>6,
                                                                                                ])); ?>" method="POST" style="display:inline;">
                                                            <?php echo csrf_field(); ?>
                                                            <button type="submit" class="btn btn-warning" title="Không duyệt">
                                                                <i class="ri-close-circle-line align-middle"></i> 
                                                            </button>
                                                        </form>
                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#detailsModal-<?php echo e($product->product_id); ?>">
                                                            <button type="button" class="btn btn-primary" title="Chi tiết sản phẩm">
                                                                <i class="ri-eye-line align-middle"></i>
                                                            </button>
                                                        </a>
                                                        <!-- Modal Chi tiết sản phẩm -->
                                                        <div class="modal fade" id="detailsModal-<?php echo e($product->product_id); ?>" tabindex="-1" aria-labelledby="detailsModalLabel-<?php echo e($product->product_id); ?>" aria-hidden="true">
                                                        <div class="modal fade" id="detailsModal-<?php echo e($product->product_id); ?>" tabindex="-1" aria-labelledby="detailsModalLabel-<?php echo e($product->product_id); ?>" aria-hidden="true">
                                                            <div class="modal-dialog modal-lg">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="detailsModalLabel-<?php echo e($product->product_id); ?>">Thông tin sản phẩm chi tiết</h5>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="card shadow-sm">
                                                                            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                                                                                <h5 class="mb-0 text-white">Sản phẩm chi tiết</h5>
                                                                                <span class="badge bg-success">
                                                                                    <?php if($product->status == 3): ?>
                                                                                    Chưa duyệt
                                                                                        <?php endif; ?>
                                                                                </span>
                                                                            </div>
                                                                            <div class="card-body">
                                                                              <div class="mb-5 d-flex">
                                                                                    <span class="text-muted"> 
                                                                                       <?php if(is_array($product->images)): ?>
                                                                                            <?php $__currentLoopData = $product->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                                <img style="width:100px; height: 100px; " src="<?php echo e($image->url); ?>" alt="Product Image">
                                                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                                       <?php endif; ?>
                                                                                   </span>
                                                                                  
                                                                               </div>
                                                                                <div class="row">
                                                                                   
                                                                                    <!-- Cột trái -->
                                                                                    <div class="col-lg-6">
                                                                                      
                                                                                        <div class="mb-3 d-flex ">
                                                                                            <strong>ID:</strong> <span class="text-muted me-5"><?php echo e($product->product_id); ?></span> 
                                                                                        </div>
                                                                                        <div class="mb-3 d-flex ">
                                                                                            <strong>Tên sản phẩm: </strong> <span class="text-muted"><?php echo e($product->name); ?></span>
                                                                                        </div>
                                                                                       
                                                                                       
                                                                                        <div class="mb-3">
                                                                                            <strong>Mã SKU:</strong> <span class="text-muted"><?php echo e($product->sku); ?></span>
                                                                                        </div>
                                                                                        <div class="mb-3">
                                                                                            <strong>Giá sản phẩm:</strong> <span class="text-muted"><?php echo e(number_format($product->price, 0, ',', '.')); ?> VNĐ</span>
                                                                                        </div>
                                                                                    </div>
                                                                                    <!-- Cột phải -->
                                                                                    <div class="col-lg-6">
                                                                                        <div class="mb-3">
                                                                                            <strong>Tên Shop</strong> <span class="text-muted"><?php echo e($product->shop->shop_name ?? "Vô danh"); ?></span>
                                                                                        </div>
                                                                                        <div class="mb-3">
                                                                                           
                                                                                        </div>
                                                                                        <div class="mb-3">
                                                                                            <strong>Ngày tạo:</strong> <span class="text-muted"><?php echo e($product->created_at); ?></span>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <!-- Danh Sách Địa Chỉ -->
                                                                        <div class="mt-5">
                                                                            <h4 class="mb-3">Biến thể sản phẩm</h4>
                                                                            <table class="table table-bordered table-hover shadow-sm">
                                                                                <thead class="table-light">
                                                                                    <tr>
                                                                                        <th>id</th>
                                                                                        <th>Tên biến thể</th>
                                                                                        <th>Hình ảnh</th>
                                                                                        <th>Mã Sku</th>
                                                                                        <th>số lượng tồn kho</th>
                                                                                        <th>Giá </th>
                
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                    <?php if(is_array(json_decode($product->change_of))): ?>
                                                                                        <?php $__currentLoopData = json_decode($product->change_of); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $variant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                        <tr>
                                                                                            <td><?php echo e($variant->id); ?></td>
                                                                                            <td><?php echo e($variant->name ?? "chưa nhập"); ?></td>
                                                                                            <td>
                                                                                            
                                                                                                    <img src="<?php echo e($variant->images); ?>" alt="Product Image" style="width: 50px; height: 50px; margin-right: 5px;">
                                                                            
                                                                                            </td>
                                                                                            <td><?php echo e($variant->sku); ?></td>
                                                                                            <td><?php echo e($variant->stock); ?></td>
                                                                                            <td><?php echo e(number_format($variant->price, 0, ',', '.')); ?> VNĐ</td>
                                                                                        </tr>
                                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                                    <?php endif; ?>
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
                                                    </td>
                                                    
                                                    
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
    
                        <!-- Pagination Links -->
                        <div class="mt-3">
                            <script>
                                new DataTable('#update2', {
                                    language: {   
                                        lengthMenu: "Hiển thị _MENU_ sản phẩm",
                                        search: "Tìm kiếm:" 
                                    }
                                });
                            </script>
                        </div>
                    </div><!-- end card-body -->
                </div><!-- end card -->
            </div>
            <!-- end col -->
        </div>
      
        <div class="tab-pane fade <?php echo e($tab == 3 ? 'show active' : ''); ?>" id="active-products" role="tabpanel" aria-labelledby="active-tab">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Danh sách sản phẩm đang hoạt động</h4>
                    </div><!-- end card header -->
    
                    <div class="card-body">
                        <div class="live-preview">
                            <div class="table-responsive">
                                <table id="active" class="table align-middle table-nowrap mb-0">
                                    <thead>
                                        <tr>
                                            <th scope="col">ID Sản phẩm</th>
                                            <th scope="col">Hình ảnh</th>
                                            <th scope="col">Tên sản phẩm</th>
                                            <th scope="col">Mã SKU</th>
                                            <th scope="col">Giá Sản phẩm</th>
                                            <th scope="col">Tên Shop</th> 
                                            <th scope="col">Trạng thái</th>
                                            <th scope="col">Ngày tạo</th>
                                            <th scope="col">Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if($activeProducts->isEmpty()): ?>
                                            <tr>
                                               
                                            </tr>
                                        <?php else: ?>
                                            <?php $__currentLoopData = $activeProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <th scope="row"><a href="#" class="fw-medium"><?php echo e($product->id); ?></a></th>
                                                    <td>
                                                        <img src="<?php echo e($product->image); ?>" alt="<?php echo e($product->name); ?>" style="width: 50px; height: 50px;">
                                                    </td>
                                                    <td style="word-wrap: break-word; white-space: normal; max-width: 200px;">
                                                        <?php echo e($product->name); ?>

                                                    </td>
                                                    <td><?php echo e($product->sku); ?></td>
                                                    <td><?php echo e(number_format($product->price, 0, ',', '.')); ?> VNĐ</td>
                                                    <td><?php echo e($product->shop->shop_name ?? null); ?></td> 
                                                    <td>
                                                        <?php if($product->status == 2): ?>
                                                       Đang hoạt động
                                                    <?php endif; ?>
                                                    <td><?php echo e($product->created_at); ?></td>
                                                   <!-- Nút Báo cáo vi phạm -->
                                                   <td>
                                                    <!-- Button to open report modal -->
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#reportModal-<?php echo e($product->id); ?>">
                                                        <button type="button" class="btn btn-danger" title="Báo cáo vi phạm">
                                                            <i class="ri-error-warning-line align-middle"></i> 
                                                        </button>
                                                    </a>
                                                
                                                    <!-- Modal Báo cáo vi phạm -->
                                                    <div class="modal fade" id="reportModal-<?php echo e($product->id); ?>" tabindex="-1" aria-labelledby="reportModalLabel-<?php echo e($product->id); ?>" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="reportModalLabel-<?php echo e($product->id); ?>">Báo cáo vi phạm</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form action="<?php echo e(route('products.submitReport', ['id' => $product->id, 'token' => auth()->user()->refesh_token, 'tab' => 3])); ?>" method="POST">
                                                                        <?php echo csrf_field(); ?>
                                                                        <div class="mb-3">
                                                                            <label for="reason-<?php echo e($product->id); ?>" class="form-label">Lý do vi phạm:</label>
                                                                            <textarea name="reason" id="reason-<?php echo e($product->id); ?>" class="form-control" required></textarea>
                                                                        </div>
                                                                        <button type="submit" class="btn btn-danger">Gửi báo cáo</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#detailsModal-<?php echo e($product->id); ?>">
                                                        <button type="button" class="btn btn-primary" title="Chi tiết sản phẩm">
                                                            <i class="ri-eye-line align-middle"></i>
                                                        </button>
                                                    </a>
                                                
                                                    <!-- Modal Chi tiết sản phẩm -->
                                                    <div class="modal fade" id="detailsModal-<?php echo e($product->id); ?>" tabindex="-1" aria-labelledby="detailsModalLabel-<?php echo e($product->id); ?>" aria-hidden="true">
                                                        <div class="modal-dialog modal-lg">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="detailsModalLabel-<?php echo e($product->id); ?>">Thông tin sản phẩm chi tiết</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="card shadow-sm">
                                                                        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                                                                            <h5 class="mb-0 text-white">Sản phẩm chi tiết</h5>
                                                                            <span class="badge bg-success">
                                                                                <?php if($product->status == 2): ?>
                                                                                Hoạt động
                                                                                    <?php endif; ?>
                                                                            </span>
                                                                        </div>
                                                                        <div class="card-body">
                                                                          <div class="mb-5 d-flex">
                                                                                <span class="text-muted"> 
                                                                                   <?php $__currentLoopData = $product->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                       <img style="width:100px; height: 100px; " src="<?php echo e($image->url); ?>" alt="Product Image">
                                                                                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                               </span>
                                                                              
                                                                           </div>
                                                                            <div class="row">
                                                                               
                                                                                <!-- Cột trái -->
                                                                                <div class="col-lg-6">
                                                                                  
                                                                                    <div class="mb-3 d-flex ">
                                                                                        <strong>ID:</strong> <span class="text-muted me-5"><?php echo e($product->id); ?></span> 
                                                                                    </div>
                                                                                    <div class="mb-3 d-flex ">
                                                                                        <strong>Tên sản phẩm: </strong> <span class="text-muted"><?php echo e($product->name); ?></span>
                                                                                    </div>
                                                                                   
                                                                                   
                                                                                    <div class="mb-3">
                                                                                        <strong>Mã SKU:</strong> <span class="text-muted"><?php echo e($product->sku); ?></span>
                                                                                    </div>
                                                                                    <div class="mb-3">
                                                                                        <strong>Giá sản phẩm:</strong> <span class="text-muted"><?php echo e(number_format($product->price, 0, ',', '.')); ?> VNĐ</span>
                                                                                    </div>
                                                                                </div>
                                                                                <!-- Cột phải -->
                                                                                <div class="col-lg-6">
                                                                                    <div class="mb-3">
                                                                                        <strong>Tên Shop</strong> <span class="text-muted"><?php echo e($product->shop->shop_name ?? null); ?></span>
                                                                                    </div>
                                                                                    <div class="mb-3">
                                                                                        <strong>Trạng thái:</strong> <span class="text-muted">
                                                                                            <?php if($product->status == 2): ?>
                                                                                           Hoạt động
                                                                                                <?php endif; ?>
                                                                                        </span>
                                                                                    </div>
                                                                                    <div class="mb-3">
                                                                                        <strong>Ngày tạo:</strong> <span class="text-muted"><?php echo e($product->created_at); ?></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <!-- Danh Sách Địa Chỉ -->
                                                                    <div class="mt-5">
                                                                        <h4 class="mb-3">Biến thể sản phẩm</h4>
                                                                        <table class="table table-bordered table-hover shadow-sm">
                                                                            <thead class="table-light">
                                                                                <tr>
                                                                                    <th>id</th>
                                                                                    <th>Tên biến thể</th>
                                                                                    <th>Hình ảnh</th>
                                                                                    <th>Mã Sku</th>
                                                                                    <th>Giá </th>
            
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <?php $__currentLoopData = $product->variants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $variant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                <tr>
                                                                                    <td><?php echo e($variant->id); ?></td>
                                                                                    <td><?php echo e($variant->name); ?></td>
                                                                                    <td>
                                                                                       
                                                                                            <img src="<?php echo e($variant->images); ?>" alt="Product Image" style="width: 50px; height: 50px; margin-right: 5px;">
                                                                    
                                                                                    </td>
                                                                                    <td><?php echo e($variant->sku); ?></td>
                                                                                    <td><?php echo e(number_format($variant->price, 0, ',', '.')); ?> VNĐ</td>
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
                                                </td>
                                                

                                                   

                                                    
                                                    
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
    
                        <!-- Pagination Links -->
                        <div class="mt-3">
                            <script>
                                new DataTable('#active', {
                                    language: {   
                                        lengthMenu: "Hiển thị _MENU_ sản phẩm",
                                        search: "Tìm kiếm:" 
                                    }
                                });
                            </script>
                        </div>
                    </div><!-- end card-body -->
                </div><!-- end card -->
            </div>
            <!-- end col -->
        </div>
        
        <div class="tab-pane fade <?php echo e($tab == 4 ? 'show active' : ''); ?>" id="rejected-products" role="tabpanel" aria-labelledby="rejected-tab">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Danh sách sản phẩm từ chối</h4>
                    </div><!-- end card header -->
    
                    <div class="card-body">
                        <div class="live-preview">
                            <div class="table-responsive">
                                <table id="rejected" class="table align-middle table-nowrap mb-0">
                                    <thead>
                                        <tr>
                                            <th scope="col">ID Sản phẩm</th>
                                            <th scope="col">Hình ảnh</th>
                                            <th scope="col">Tên sản phẩm</th>
                                            <th scope="col">Mã SKU</th>
                                            <th scope="col">Giá Sản phẩm</th>
                                            <th scope="col">Tên Shop</th> 
                                            <th scope="col">Trạng thái</th>
                                            <th scope="col">Ngày tạo</th>
                                            <th scope="col">Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if($rejectedProducts->isEmpty()): ?>
                                            <tr>
                                               
                                            </tr>
                                        <?php else: ?>
                                            <?php $__currentLoopData = $rejectedProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <th scope="row"><a href="#" class="fw-medium"><?php echo e($product->id); ?></a></th>
                                                    <td>
                                                        <img src="<?php echo e($product->image); ?>" alt="<?php echo e($product->name); ?>" style="width: 50px; height: 50px;">
                                                        
                                                        
                                                    </td>
                                                    <td style="word-wrap: break-word; white-space: normal; max-width: 200px;">
                                                        <?php echo e($product->name); ?>

                                                    </td>
                                                    <td><?php echo e($product->sku); ?></td>
                                                    <td><?php echo e(number_format($product->price, 0, ',', '.')); ?> VNĐ</td>
                                                    <td><?php echo e($product->shop->shop_name ?? null); ?></td> 
                                                    <td>
                                                        <?php if($product->status == 0): ?>
                                                        từ chối duyệt
                                                   
                                                    <?php endif; ?>
                                                    <td><?php echo e($product->created_at); ?></td>
                                                    <td>
                                                        <!-- Duyệt -->
                                                        <form action="<?php echo e(route( 'products.approve' ,[
                                                                                                'token' => auth()->user()->refesh_token,
                                                                                                'id' => $product->id,
                                                                                                'tab'=>4,
                                                                                                ])); ?>" method="POST" style="display:inline;">
                                                            <?php echo csrf_field(); ?>
                                                            <button type="submit" class="btn btn-success" title="Duyệt">
                                                                <i class="ri-check-line align-middle"></i>
                                                            </button>
                                                        </form>
                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#detailsModal-<?php echo e($product->id); ?>">
                                                            <button type="button" class="btn btn-primary" title="Chi tiết sản phẩm">
                                                                <i class="ri-eye-line align-middle"></i>
                                                            </button>
                                                        </a>
                                                    
                                                        <!-- Modal Chi tiết sản phẩm -->
                                                        <div class="modal fade" id="detailsModal-<?php echo e($product->id); ?>" tabindex="-1" aria-labelledby="detailsModalLabel-<?php echo e($product->id); ?>" aria-hidden="true">
                                                            <div class="modal-dialog modal-lg">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="detailsModalLabel-<?php echo e($product->id); ?>">Thông tin sản phẩm chi tiết</h5>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="card shadow-sm">
                                                                            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                                                                                <h5 class="mb-0 text-white">Sản phẩm chi tiết</h5>
                                                                                <span class="badge bg-success">
                                                                                    <?php if($product->status == 0): ?>
                                                                                  Từ chối duyệt
                                                                                        <?php endif; ?>
                                                                                </span>
                                                                            </div>
                                                                            <div class="card-body">
                                                                              <div class="mb-5 d-flex">
                                                                                    <span class="text-muted"> 
                                                                                       <?php $__currentLoopData = $product->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                           <img style="width:100px; height: 100px; " src="<?php echo e($image->url); ?>" alt="Product Image">
                                                                                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                                   </span>
                                                                                  
                                                                               </div>
                                                                                <div class="row">
                                                                                   
                                                                                    <!-- Cột trái -->
                                                                                    <div class="col-lg-6">
                                                                                      
                                                                                        <div class="mb-3 d-flex ">
                                                                                            <strong>ID:</strong> <span class="text-muted me-5"><?php echo e($product->id); ?></span> 
                                                                                        </div>
                                                                                        <div class="mb-3 d-flex ">
                                                                                            <strong>Tên sản phẩm: </strong> <span class="text-muted"><?php echo e($product->name); ?></span>
                                                                                        </div>
                                                                                       
                                                                                       
                                                                                        <div class="mb-3">
                                                                                            <strong>Mã SKU:</strong> <span class="text-muted"><?php echo e($product->sku); ?></span>
                                                                                        </div>
                                                                                        <div class="mb-3">
                                                                                            <strong>Giá sản phẩm:</strong> <span class="text-muted"><?php echo e(number_format($product->price, 0, ',', '.')); ?> VNĐ</span>
                                                                                        </div>
                                                                                    </div>
                                                                                    <!-- Cột phải -->
                                                                                    <div class="col-lg-6">
                                                                                        <div class="mb-3">
                                                                                            <strong>Tên Shop</strong> <span class="text-muted"><?php echo e($product->shop->shop_name ?? null); ?></span>
                                                                                        </div>
                                                                                        <div class="mb-3">
                                                                                            <strong>Trạng thái:</strong> <span class="text-muted">
                                                                                                <?php if($product->status == 0): ?>
                                                                                                Từ chối duyệt
                                                                                                    <?php endif; ?>
                                                                                            </span>
                                                                                        </div>
                                                                                        <div class="mb-3">
                                                                                            <strong>Ngày tạo:</strong> <span class="text-muted"><?php echo e($product->created_at); ?></span>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="mt-5">
                                                                            <h4 class="mb-3">Biến thể sản phẩm</h4>
                                                                            <table class="table table-bordered table-hover shadow-sm">
                                                                                <thead class="table-light">
                                                                                    <tr>
                                                                                        <th>id</th>
                                                                                        <th>Tên biến thể</th>
                                                                                        <th>Hình ảnh</th>
                                                                                        <th>Mã Sku</th>
                                                                                        <th>Giá </th>
                
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                    <?php $__currentLoopData = $product->variants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $variant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                    <tr>
                                                                                        <td><?php echo e($variant->id); ?></td>
                                                                                        <td><?php echo e($variant->name); ?></td>
                                                                                        <td>
                                                                                           
                                                                                                <img src="<?php echo e($variant->images); ?>" alt="Product Image" style="width: 50px; height: 50px; margin-right: 5px;">
                                                                        
                                                                                        </td>
                                                                                        <td><?php echo e($variant->sku); ?></td>
                                                                                        <td><?php echo e(number_format($variant->price, 0, ',', '.')); ?> VNĐ</td>
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
                                                     
                                                      
                                                    </td>
                                                    
                                                    
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
    
                        <!-- Pagination Links -->
                        <div class="mt-3">
                            
                            <script>
                                new DataTable('#rejected', {
                                    language: {   
                                        lengthMenu: "Hiển thị _MENU_ sản phẩm",
                                        search: "Tìm kiếm:" 
                                    }
                                });
                            </script>
                        </div>
                    </div><!-- end card-body -->
                </div><!-- end card -->
            </div>
            <!-- end col -->
        </div>
       
        <div class="tab-pane fade <?php echo e($tab == 5 ? 'show active' : ''); ?>" id="violating-products" role="tabpanel" aria-labelledby="violating-tab">
            <div class="col-xl-12">
               
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Danh sách sản phẩm vi phạm</h4>
                    </div><!-- end card header -->
    
                    <div class="card-body">
                        <div class="live-preview">
                            <div class="table-responsive">
                                <table id="report" class="table align-middle table-nowrap mb-0">
                                    <thead>
                                        <tr>
                                            <th scope="col">ID Sản phẩm</th>
                                            <th scope="col">Hình ảnh</th>
                                            <th scope="col">Tên sản phẩm</th>
                                            <th scope="col">Mã SKU</th>
                                            <th scope="col">Giá Sản phẩm</th>
                                            <th scope="col">Tên Shop</th> 
                                            <th scope="col">Trạng thái</th>
                                            <th scope="col">Ngày tạo</th>
                                            <th scope="col">Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if($violatingProducts->isEmpty()): ?>
                                            <tr>
                                              
                                            </tr>
                                        <?php else: ?>
                                            <?php $__currentLoopData = $violatingProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <th scope="row"><a href="#" class="fw-medium"><?php echo e($product->id); ?></a></th>
                                                    <td>
                                                        <img src="<?php echo e($product->image); ?>" alt="<?php echo e($product->name); ?>" style="width: 50px; height: 50px;">
                                                        
                                                    </td>
                                                    <td style="word-wrap: break-word; white-space: normal; max-width: 200px;">
                                                        <?php echo e($product->name); ?>

                                                    </td>
                                                    <td><?php echo e($product->sku); ?></td>
                                                    <td><?php echo e(number_format($product->price, 0, ',', '.')); ?> VNĐ</td>
                                                    <td><?php echo e($product->shop->shop_name ?? null); ?></td> 
                                                    <td>
                                                        <?php if($product->status == 4): ?>
                                                        sản phẩm vi phạm
                                                   
                                                    <?php endif; ?>
                                                    <td><?php echo e($product->created_at); ?></td>
                                                    <td>
                                                        <!-- Duyệt -->
                                                        <form action="<?php echo e(route( 'products.approve' ,[
                                                                                                'token' => auth()->user()->refesh_token,
                                                                                                'id' => $product->id,
                                                                                                'tab'=>5,
                                                                                                ])); ?>" method="POST" style="display:inline;">
                                                            <?php echo csrf_field(); ?>
                                                            <button type="submit" class="btn btn-success" title="Duyệt">
                                                                <i class="ri-check-line align-middle"></i>
                                                            </button>
                                                        </form>
                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#detailsModal-<?php echo e($product->id); ?>">
                                                            <button type="button" class="btn btn-primary" title="Chi tiết sản phẩm">
                                                                <i class="ri-eye-line align-middle"></i>
                                                            </button>
                                                        </a>
                                                    
                                                        <div class="modal fade" id="detailsModal-<?php echo e($product->id); ?>" tabindex="-1" aria-labelledby="detailsModalLabel-<?php echo e($product->id); ?>" aria-hidden="true">
                                                            <div class="modal-dialog modal-lg">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="detailsModalLabel-<?php echo e($product->id); ?>">Thông tin sản phẩm chi tiết</h5>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="card shadow-sm">
                                                                            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                                                                                <h5 class="mb-0 text-white">Sản phẩm chi tiết</h5>
                                                                                <span class="badge bg-success">
                                                                                    <?php if($product->status == 4): ?>
                                                                                    Vi phạm
                                                                                        <?php endif; ?>
                                                                                </span>
                                                                            </div>
                                                                            <div class="card-body">
                                                                              <div class="mb-5 d-flex">
                                                                                    <span class="text-muted"> 
                                                                                       <?php $__currentLoopData = $product->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                           <img style="width:100px; height: 100px; " src="<?php echo e($image->url); ?>" alt="Product Image">
                                                                                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                                   </span>
                                                                                  
                                                                               </div>
                                                                                <div class="row">
                                                                                   
                                                                                    <!-- Cột trái -->
                                                                                    <div class="col-lg-6">
                                                                                      
                                                                                        <div class="mb-3 d-flex ">
                                                                                            <strong>ID:</strong> <span class="text-muted me-5"><?php echo e($product->id); ?></span> 
                                                                                        </div>
                                                                                        <div class="mb-3 d-flex ">
                                                                                            <strong>Tên sản phẩm: </strong> <span class="text-muted"><?php echo e($product->name); ?></span>
                                                                                        </div>
                                                                                       
                                                                                       
                                                                                        <div class="mb-3">
                                                                                            <strong>Mã SKU:</strong> <span class="text-muted"><?php echo e($product->sku); ?></span>
                                                                                        </div>
                                                                                        <div class="mb-3">
                                                                                            <strong>Giá sản phẩm:</strong> <span class="text-muted"><?php echo e(number_format($product->price, 0, ',', '.')); ?> VNĐ</span>
                                                                                        </div>
                                                                                    </div>
                                                                                    <!-- Cột phải -->
                                                                                    <div class="col-lg-6">
                                                                                        <div class="mb-3">
                                                                                            <strong>Tên Shop</strong> <span class="text-muted"><?php echo e($product->shop->shop_name ?? null); ?></span>
                                                                                        </div>
                                                                                        <div class="mb-3">
                                                                                            <strong>Trạng thái:</strong> <span class="text-muted">
                                                                                                <?php if($product->status == 4): ?>
                                                                                                Vi phạm
                                                                                                    <?php endif; ?>
                                                                                            </span>
                                                                                        </div>
                                                                                        <div class="mb-3">
                                                                                            <strong>Ngày tạo:</strong> <span class="text-muted"><?php echo e($product->created_at); ?></span>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <!-- Danh Sách Địa Chỉ -->
                                                                        <div class="mt-5">
                                                                            <h4 class="mb-3">Biến thể sản phẩm</h4>
                                                                            <table class="table table-bordered table-hover shadow-sm">
                                                                                <thead class="table-light">
                                                                                    <tr>
                                                                                        <th>id</th>
                                                                                        <th>Tên biến thể</th>
                                                                                        <th>Hình ảnh</th>
                                                                                        <th>Mã Sku</th>
                                                                                        <th>Giá </th>
                
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                    <?php $__currentLoopData = $product->variants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $variant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                    <tr>
                                                                                        <td><?php echo e($variant->id); ?></td>
                                                                                        <td><?php echo e($variant->name); ?></td>
                                                                                        <td>
                                                                                           
                                                                                                <img src="<?php echo e($variant->images); ?>" alt="Product Image" style="width: 50px; height: 50px; margin-right: 5px;">
                                                                        
                                                                                        </td>
                                                                                        <td><?php echo e($variant->sku); ?></td>
                                                                                        <td><?php echo e(number_format($variant->price, 0, ',', '.')); ?> VNĐ</td>
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
                                                     
                                                      
                                                    </td>
                                                    
                                                    
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
    
                        <!-- Pagination Links -->
                        <div class="mt-3">
                            <script>
                                new DataTable('#report', {
                                    language: {   
                                        lengthMenu: "Hiển thị _MENU_ sản phẩm",
                                        search: "Tìm kiếm:" 
                                    }
                                });
                            </script>
                        </div>
                    </div><!-- end card-body -->
                </div><!-- end card -->
            </div>
            <!-- end col -->
        </div>
        
    </div>
    

        

      </div>
   
   </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\datn_1\resources\views/products/list_product.blade.php ENDPATH**/ ?>