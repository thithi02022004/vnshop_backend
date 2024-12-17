<?php $__env->startSection('title', 'List Store'); ?>

<?php $__env->startSection('main'); ?>
   <div class="container-fluid">
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Thông tin sàn</h4>
                    <a href="#" data-bs-toggle="modal" data-bs-target="#editModal-<?php echo e($config->id); ?>">
                                                <button type="button" class="btn btn-primary" title="Chỉnh sửa">
                                                    <i class="ri-edit-line align-middle"></i>
                                                </button>
                                                
                                            </a>
                                        
                                            <!-- Modal Chỉnh sửa -->
                                            <div class="modal fade" id="editModal-<?php echo e($config->id); ?>" tabindex="-1" aria-labelledby="editModalLabel-<?php echo e($config->id); ?>" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="editModalLabel-<?php echo e($config->id); ?>">Chỉnh sửa config</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="<?php echo e(route('config.update', ['id' => $config->id, 'tab' => 1, 'token' => auth()->user()->refesh_token])); ?>" method="POST" enctype="multipart/form-data">
                                                                <?php echo csrf_field(); ?>
                                                                <?php echo method_field('PUT'); ?>
                                                                
                                                                <!-- Logo Header -->
                                                                <div class="mb-3">
                                                                    <label for="logo_header" class="form-label">Logo Header</label>
                                                                    <div>
                                                                        <img src="<?php echo e($config->logo_header); ?>" alt="Logo Header" style="max-width: 100px; height: auto;">
                                                                    </div>
                                                                    <input type="file" name="logo_header" id="logo_header" class="form-control" accept="image/*">
                                                                </div>
                                            
                                                                <!-- Logo Footer -->
                                                                <div class="mb-3">
                                                                    <label for="logo_footer" class="form-label">Logo Footer</label>
                                                                    <div>
                                                                        <img src="<?php echo e($config->logo_footer); ?>" alt="Logo Footer" style="max-width: 100px; height: auto;">
                                                                    </div>
                                                                    <input type="file" name="logo_footer" id="logo_footer" class="form-control" accept="image/*">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="main_color" class="form-label">Main Color</label>
                                                                    <input type="text" name="main_color" id="main_color" class="form-control" value="<?php echo e($config->main_color); ?>" required>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="icon" class="form-label">Icon</label>
                                                                    <div>
                                                                        <img src="<?php echo e($config->icon); ?>" alt="Icon" style="max-width: 100px; height: auto;">
                                                                    </div>
                                                                    <input type="file" name="icon" id="icon" class="form-control" accept="image/*">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="description" class="form-label">Mô tả doanh nghiệp</label>
                                                                    <input type="text" name="description" id="description" class="form-control" value="<?php echo e($config->description); ?>" required>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="address" class="form-label">Địa chỉ doanh nghiệp</label>
                                                                    <input type="text" name="address" id="address" class="form-control" value="<?php echo e($config->address); ?>" required>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="mail" class="form-label">Mail</label>
                                                                    <input type="text" name="mail" id="mail" class="form-control" value="<?php echo e($config->mail); ?>" required>
                                                                </div>
                                                              
                                                                <div class="mb-3">
                                                                    <label for="logo_admin" class="form-label">logo admin</label>
                                                                    <div>
                                                                        <img src="<?php echo e($config->logo_admin); ?>" alt="logo_admin" style="max-width: 100px; height: auto;">
                                                                    </div>
                                                                    <input type="file" name="logo_admin" id="logo_admin" class="form-control" accept="image/*">
                                                                </div>
                                                                
                                                                <div class="mb-3">
                                                                    <label for="thumbnail" class="form-label">ThumBnail</label>
                                                                    <input type="text" name="thumbnail" id="thumbnail" class="form-control" value="<?php echo e($config->thumbnail); ?>" required>
                                                                </div>
                                                                
                                                                
                                                                <div class="mb-3 form-check">
                                                                    <input type="checkbox" name="is_active" id="is_active" class="form-check-input" <?php echo e($config->is_active ? 'checked' : ''); ?>>
                                                                    <label for="is_active" class="form-check-label">Is Active</label>
                                                                </div>
                                                                
                                                                <input type="hidden" name="update_by" value="<?php echo e(auth()->user()->id); ?>">
                                                                <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                </div><!-- end card header -->
                
                <div class="card-body">
                <div class="container my-4">

                        <!-- Content Section -->
                         <div class="row">
                            <div class="col-8">
                                <div class="card-body contact-info bg-light">
                                         <!-- Header Section -->
                                    <div class="card mb-4">
                                        <div class="row g-0 align-items-center header p-3">
                                            <div class="col-md-2 text-center">
                                                <img src="<?php echo e($config->icon); ?>" 
                                                    alt="Platform Logo" class="rounded-circle img-fluid" style="max-width: 80px;">
                                            </div>
                                            <div class="col-md-10">
                                                <h3 class="card-title mb-1">VN shop: <span class="text-primary">8</span></h3>
                                                <p class="text-muted mb-0">Màu chủ đạo: <span class="badge d-flex justyfile-content" style="background-color: <?php echo e($config->main_color); ?>; height: 42px; width: 91px;"><?php echo e($config->main_color); ?></span></p>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <h5 class="card-title">Thông tin khác</h5>
                                    <p class="mb-1"><strong>Tên Người Đại Diện:</strong> <?php echo e($information->name); ?></p>
                                    <p class="mb-1"><strong>Email:</strong> <a href="mailto:hoang@gmail.com"><?php echo e($information->mail); ?></a></p>
                                    <p class="mb-0"><strong>Đường dây nóng:</strong> <a href="tel:01122334455"><?php echo e($information->phone); ?></a></p>
                                    ...
                                </div>
                            </div>
                            <div class="col-4">
                                    <div>
                                        <h4>logo header</h4>
                                        <div class="card">
                                            <img src="<?php echo e($config->logo_header); ?>"  
                                                alt="Promotional Banner" class="card-img-top">
                                        </div>
                                    </div>
                                    <div>
                                        <h4>logo footer</h4>
                                        <div class="card">
                                            <img src="<?php echo e($config->logo_footer); ?>" 
                                                alt="Secondary Banner" class="card-img-top">
                                        </div>
                                    </div>
                            </div>
                         </div>
                    </div>
                </div><!-- end card-body -->
            </div><!-- end card -->
        </div>
        <!-- end col -->
    </div>
   </div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\datn_1\resources\views/config/config_list.blade.php ENDPATH**/ ?>