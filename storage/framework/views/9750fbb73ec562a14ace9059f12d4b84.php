<?php $__env->startSection('title', 'List Store'); ?>

<?php $__env->startSection('link'); ?>
    <!-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet"> -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->

    <!-- include summernote css/js -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.js"></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main'); ?>
    <div class="container-fluid">
        <div class="row">
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <button class="nav-link <?php echo e($tab == 1 ? 'active' : ''); ?>" id="nav-home-tab" data-bs-toggle="tab"
                        data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home"
                        aria-selected="<?php echo e($tab == 1 ? 'true' : 'false'); ?>">Hoạt động</button>
                    <button class="nav-link <?php echo e($tab == 2 ? 'active' : ''); ?>" id="nav-profile-tab" data-bs-toggle="tab"
                        data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile"
                        aria-selected="<?php echo e($tab == 2 ? 'true' : 'false'); ?>">Đã Tắt </button>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade <?php echo e($tab == 1 ? 'show active' : ''); ?>" id="nav-home" role="tabpanel"
                    aria-labelledby="nav-home-tab" tabindex="0">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-header align-items-center d-flex">
                                <h4 class="card-title mb-0 flex-grow-1">Voucher hoạt động</h4>
                                <!-- Toggle Between Modals -->
                                <button type="button" class="btn btn-primary " data-bs-toggle="modal"
                                    data-bs-target="#firstmodal">Thêm Voucher</button>
                                <!-- First modal dialog -->
                                <div class="modal fade" id="firstmodal" aria-hidden="true" aria-labelledby="..."
                                    tabindex="-1">
                                    <div class="modal-dialog modal-dialog-centered modal-xl">
                                        <div class="modal-content">
                                            <div class="modal-body text-center p-5">
                                                <form action="<?php echo e(route('voucher_main.store',[
                                                                                                'token' => auth()->user()->refesh_token])); ?>" method="POST" enctype="multipart/form-data">
                                                    <?php echo csrf_field(); ?>
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="mb-3">
                                                                <label for="title" class="form-label">Tiêu đề</label>
                                                                <input type="text" class="form-control"
                                                                    placeholder="Tiêu đề" id="title" name="title"
                                                                    required>
                                                            </div>
                                                        </div>

                                                        <div class="col-6">
                                                            <div class="mb-3">
                                                                <label for="description"
                                                                    class="form-label">Nội dung</label>
                                                                <textarea class="form-control" placeholder="Nội dung" id="description" name="description" rows="2"
                                                                    required></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="mb-3">
                                                                <label for="quantity" class="form-label">Số lượng</label>
                                                                <input type="number" class="form-control" id="quantity"
                                                                    name="quantity" placeholder="Số lượng" required>
                                                            </div>
                                                        </div>

                                                        <div class="col-6">
                                                            <div class="mb-3">
                                                                <label for="limitValue" class="form-label">Số tiền tối đa được giảm</label>
                                                                <input type="number" class="form-control" id="limitValue"
                                                                    name="limitValue" placeholder="số tiền tối đa được giảm"
                                                                    required>
                                                            </div>
                                                        </div>

                                                        <div class="col-6">
                                                            <div class="mb-3">
                                                                <label for="ratio" class="form-label">Phần trăm giảm giá</label>
                                                                <input type="number"  step="0.01" class="form-control" id="ratio"
                                                                    name="ratio" placeholder="Phần trăm giảm giá">
                                                            </div>
                                                        </div>

                                                        <div class="col-6">
                                                            <div class="mb-3">
                                                                <label for="min_order" class="form-label">Đơn hàng tối thiểu được áp dụng</label>
                                                                <input type="number" class="form-control" id="min_order"
                                                                    name="min_order" placeholder="Đơn hàng tối thiểu được áp dụng">
                                                            </div>
                                                        </div>

                                                        <div class="col-6">
                                                            <div class="mb-3">
                                                                <label for="code" class="form-label">Mã giảm giá</label>
                                                                <input type="text" class="form-control" id="code"
                                                                    name="code" placeholder="Enter code">
                                                            </div>
                                                        </div>

                                                        <div class="col-6">
                                                            <div class="mb-3">
                                                                <label for="status" class="form-label">Status</label>
                                                                <select style="    width: 513px;
                                                                                    margin-top: -12px;
                                                                                    left: 2em;"
                                                                        class="form-control" id="status"
                                                                        name="status"
                                                                        required
                                                                >
                                                                    <option  value="" disabled selected>chọn trạng thái</option>
                                                                    <option value="2">Active</option>
                                                                    <option value="0">Inactive</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-4">
                                                            <div class="mb-3">
                                                                <label for="image_voucher" class="form-label">Hình ảnh</label>
                                                                <input type="file" class="form-control" id="image_voucher"
                                                                    name="image_voucher" placeholder="Hình ảnh voucher">
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-12">
                                                            <div class="text-end">
                                                                <button type="submit"
                                                                    class="btn btn-primary">Submit</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
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
                                                    <th scope="col">tiêu đề</th>
                                                    <th scope="col">Số lượng</th>
                                                    <th scope="col">Giảm giá</th>
                                                    <th scope="col">Mã giảm giá</th>
                                                    <th scope="col">Người tạo</th>
                                                    <th scope="col">Hành động</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php $__currentLoopData = $voucherMains; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $voucherMain): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                       
                                                        <th scope="row"><a href="#"
                                                                class="fw-medium"><?php echo e($voucherMain->id); ?></a></th>
                                                        <td
                                                            style="max-width: 150px; white-space: normal; overflow: hidden; text-overflow: ellipsis;">
                                                            <?php echo e($voucherMain->title); ?></td>
                                                       
                                                        <td
                                                            style="max-width: 150px; white-space: normal; overflow: hidden; text-overflow: ellipsis;">
                                                            <?php echo e($voucherMain->quantity); ?></td>
                                                       
                                    
                                                        <td
                                                            style="max-width: 150px; white-space: normal; overflow: hidden; text-overflow: ellipsis;">
                                                            <?php echo e($voucherMain->ratio *100); ?>%</td>
                                                        <td
                                                            style="max-width: 150px; white-space: normal; overflow: hidden; text-overflow: ellipsis;">
                                                            <?php echo e($voucherMain->code); ?></td>
                                                        <td
                                                            style="max-width: 150px; white-space: normal; overflow: hidden; text-overflow: ellipsis;">
                                                            <?php echo e($voucherMain->user->fullname); ?></td>
                                                            <td>
                                                                <a href="#" data-bs-toggle="modal" data-bs-target="#editModal-<?php echo e($voucherMain->id); ?>">
                                                                    <button type="button" class="btn btn-primary" title="Chỉnh sửa">
                                                                            <i class="ri-edit-line align-middle"></i>
                                                                    </button>
                                                                </a>
                                                            
                                                                <!-- Modal Chỉnh sửa -->
                                                                <div class="modal fade" id="editModal-<?php echo e($voucherMain->id); ?>" tabindex="-1"
                                                                    aria-labelledby="editModalLabel-<?php echo e($voucherMain->id); ?>" aria-hidden="true">
                                                                    <div class="modal-dialog modal-xl">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title" id="editModalLabel-<?php echo e($voucherMain->id); ?>">
                                                                                    Chỉnh sửa Voucher</h5>
                                                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                                    aria-label="Close"></button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <form action="<?php echo e(route('voucher_main.update', ['id' => $voucherMain->id,  'token' => auth()->user()->refesh_token])); ?>" method="POST" enctype="multipart/form-data">
                                                                                    <?php echo csrf_field(); ?>
                                                                                    <?php echo method_field('PUT'); ?>
                                                                                    <div class="row">
                                                                                        <div class="col-6">
                                                                                            <div class="mb-3">
                                                                                                <label for="title-<?php echo e($voucherMain->id); ?>" class="form-label">Tiêu đề</label>
                                                                                                <input type="text" class="form-control"
                                                                                                    placeholder="Tiêu đề" id="title-<?php echo e($voucherMain->id); ?>" name="title"
                                                                                                    value="<?php echo e($voucherMain->title); ?>" required>
                                                                                            </div>
                                                                                        </div>
                                                            
                                                                                        <div class="col-6">
                                                                                            <div class="mb-3">
                                                                                                <label for="description-<?php echo e($voucherMain->id); ?>" class="form-label">Nội dung</label>
                                                                                                <textarea class="form-control" placeholder="Nội dung" id="description-<?php echo e($voucherMain->id); ?>" name="description" rows="2" required><?php echo e($voucherMain->description); ?></textarea>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="row">
                                                                                            
                                                                                            <div class="col-6">
                                                                                                <div class="mb-3">
                                                                                                    <label for="quantity-<?php echo e($voucherMain->id); ?>" class="form-label">Số lượng</label>
                                                                                                    <input type="number" class="form-control" id="quantity-<?php echo e($voucherMain->id); ?>"
                                                                                                        name="quantity" placeholder="Số lượng" value="<?php echo e($voucherMain->quantity); ?>" required>
                                                                                                </div>
                                                                                            </div>
                                                                
                                                                                            <div class="col-6">
                                                                                                <div class="mb-3">
                                                                                                    <label for="limitValue-<?php echo e($voucherMain->id); ?>" class="form-label">Tổng tiền sản phẩm</label>
                                                                                                    <input type="number" class="form-control" id="limitValue-<?php echo e($voucherMain->id); ?>"
                                                                                                        name="limitValue" placeholder="Tổng tiền sản phẩm"
                                                                                                        value="<?php echo e($voucherMain->limitValue); ?>" required>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="row">
                                                                                            <div class="col-6">
                                                                                                <div class="mb-3">
                                                                                                    <label for="ratio-<?php echo e($voucherMain->id); ?>" class="form-label">Phần trăm giảm giá</label>
                                                                                                    <input type="number" class="form-control" id="ratio-<?php echo e($voucherMain->id); ?>"
                                                                                                        name="ratio" step="0.01" placeholder="Phần trăm giảm giá" value="<?php echo e($voucherMain->ratio); ?>" required>
                                                                                                </div>
                                                                                            </div>
                                                            
                                                                                            <div class="col-6">
                                                                                                <div class="mb-3">
                                                                                                    <label for="code-<?php echo e($voucherMain->id); ?>" class="form-label">Mã giảm giá</label>
                                                                                                    <input type="text" class="form-control" id="code-<?php echo e($voucherMain->id); ?>"
                                                                                                        name="code" placeholder="Enter code" value="<?php echo e($voucherMain->code); ?>" required>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="row">
                                                                                            
                                                                                            <div class="col-6">
                                                                                                <div class="mb-3">
                                                                                                    <label for="min-<?php echo e($voucherMain->id); ?>" class="form-label">Đơn hàng tối thiểu</label>
                                                                                                    <input type="min" class="form-control" id="min-<?php echo e($voucherMain->id); ?>"
                                                                                                        name="min_order" placeholder="" value="<?php echo e($voucherMain->min); ?>" required>
                                                                                                </div>
                                                                                            </div>                                                           
                                                                                        </div>
                                                                                        <div class="row">
                                                                                            <div class="col-6">
                                                                                                <div class="mb-3">
                                                                                                    <label for="status-<?php echo e($voucherMain->id); ?>" class="form-label">Trạng thái</label>
                                                                                                    <select style="width: 130px" class="form-control" id="status-<?php echo e($voucherMain->id); ?>"
                                                                                                        name="status" required>
                                                                                                        <option value="" disabled>Chọn trạng thái</option>
                                                                                                        <option value="2" <?php echo e($voucherMain->status == 2 ? 'selected' : ''); ?>>Active</option>
                                                                                                        <option value="0" <?php echo e($voucherMain->status == 0 ? 'selected' : ''); ?>>Inactive</option>
                                                                                                    </select>
                                                                                                </div>
                                                                                            </div>
                                                                
                                                                                            <div class="col-6">
                                                                                                <div class="text-end">
                                                                                                    <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            
                                                                <a href="#" data-bs-toggle="modal" data-bs-target="#detailsModal-<?php echo e($voucherMain->id); ?>">
                                                                    <button type="button" class="btn btn-primary" title="Chi tiết voucher">
                                                                        <i class="ri-eye-line align-middle"></i>
                                                                    </button>
                                                                </a>
                                                            
                                                             <!-- Modal Chi tiết voucher -->
                                                            <div class="modal fade" id="detailsModal-<?php echo e($voucherMain->id); ?>" tabindex="-1" aria-labelledby="detailsModalLabel-<?php echo e($voucherMain->id); ?>" aria-hidden="true">
                                                                <div class="modal-dialog modal-lg">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="detailsModalLabel-<?php echo e($voucherMain->id); ?>">Thông tin voucher chi tiết</h5>
                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <div class="card shadow-sm">
                                                                                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                                                                                    <h5 class="mb-0 text-white">Chi tiết Voucher</h5>
                                                                                    <span class="badge <?php echo e($voucherMain->status == 2 ? 'bg-success' : 'bg-danger'); ?>">
                                                                                        <?php echo e($voucherMain->status == 2 ? 'Hoạt động' : 'Không hoạt động'); ?>

                                                                                    </span>
                                                                                </div>
                                                                                <div class="card-body">
                                                                                    <div class="row">
                                                                                        <!-- Cột trái -->
                                                                                        <div class="col-lg-6">
                                                                                            <div class="mb-3">
                                                                                                <strong>Tiêu đề:</strong>
                                                                                                <span class="text-muted"><?php echo e($voucherMain->title); ?></span>
                                                                                            </div>
                                                                                            <div class="mb-3">
                                                                                                <strong>Mô tả:</strong>
                                                                                                <span class="text-muted"><?php echo e($voucherMain->description); ?></span>
                                                                                            </div>
                                                                                            <div class="mb-3">
                                                                                                <strong>Số lượng:</strong>
                                                                                                <span class="text-muted"><?php echo e($voucherMain->quantity); ?></span>
                                                                                            </div>
                                                                                            <div class="mb-3">
                                                                                                <strong>Tổng giá trị tối thiểu:</strong>
                                                                                                <span class="text-muted"><?php echo e(number_format($voucherMain->limitValue, 0, ',', '.')); ?> VNĐ</span>
                                                                                            </div>
                                                                                            <div class="mb-3">
                                                                                                <strong>Phần trăm giảm giá:</strong>
                                                                                                <span class="text-muted"><?php echo e($voucherMain->ratio); ?>%</span>
                                                                                            </div>
                                                                                        </div>
                                                                                        <!-- Cột phải -->
                                                                                        <div class="col-lg-6">
                                                                                            <div class="mb-3">
                                                                                                <strong>Mã giảm giá:</strong>
                                                                                                <span class="text-muted"><?php echo e($voucherMain->code); ?></span>
                                                                                            </div>
                                                                                            <div class="mb-3">
                                                                                                <strong>Đơn hàng tối thiểu:</strong>
                                                                                                <span class="text-muted"><?php echo e(number_format($voucherMain->min, 0, ',', '.')); ?> VNĐ</span>
                                                                                            </div>
                                                                                            <div class="mb-3">
                                                                                                <strong>Người tạo:</strong>
                                                                                                <span class="text-muted"><?php echo e($voucherMain->user->fullname); ?></span>
                                                                                            </div>
                                                                                            <div class="mb-3">
                                                                                                <strong>Ngày tạo:</strong>
                                                                                                <span class="text-muted"><?php echo e($voucherMain->created_at); ?></span>
                                                                                            </div>
                                                                                            <div class="mb-3">
                                                                                                <strong>Ngày cập nhật:</strong>
                                                                                                <span class="text-muted"><?php echo e($voucherMain->updated_at); ?></span>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="row">
                                                                                        <div class="col-12 text-center">
                                                                                            <div class="mb-3">
                                                                                                <strong>Hình ảnh:</strong>
                                                                                                <div>
                                                                                                    <?php if($voucherMain->image): ?>
                                                                                                        <img src="<?php echo e($voucherMain->image); ?>" alt="Voucher Image" style="width: 200px; height: auto; border-radius: 5px;">
                                                                                                    <?php else: ?>
                                                                                                        <span class="text-muted">Không có hình ảnh</span>
                                                                                                    <?php endif; ?>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
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
                                            </tbody>

                                        </table>


                                    </div>
                                </div>
                                <div class="mt-3">
                                    
                                </div>
                            </div><!-- end card-body -->

                        </div><!-- end card -->
                    </div>
                    <!-- end col -->
                </div>
                <div class="tab-pane fade <?php echo e($tab == 2 ? 'show active' : ''); ?>" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab" tabindex="0">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-header align-items-center d-flex">
                                <h4 class="card-title mb-0 flex-grow-1"> Voucher không hoạt động</h4>
                            </div><!-- end card header -->

                            <div class="card-body">
                                <div class="live-preview">
                                    <div class="table-responsive">
                                        <table class="table align-middle table-nowrap mb-0">
                                            <thead>
                                                <tr>
                                                    <th scope="col">ID</th>
                                                    <th scope="col">tiêu đề</th>
                                                    <th scope="col">Số lượng</th>
                                                    <th scope="col">Giảm giá</th>
                                                    <th scope="col">Mã giảm giá</th>
                                                    <th scope="col">Người tạo</th>
                                                    <th scope="col">Hành động</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php $__currentLoopData = $inactiveVoucher; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $voucherMain): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                      
                                                        <th scope="row"><a href="#"
                                                                class="fw-medium"><?php echo e($voucherMain->id); ?></a></th>
                                                        <td
                                                            style="max-width: 150px; white-space: normal; overflow: hidden; text-overflow: ellipsis;">
                                                            <?php echo e($voucherMain->title); ?></td>
                                                      
                                                        <td
                                                            style="max-width: 150px; white-space: normal; overflow: hidden; text-overflow: ellipsis;">
                                                            <?php echo e($voucherMain->quantity); ?></td>
                                                        
                                                        <td
                                                            style="max-width: 150px; white-space: normal; overflow: hidden; text-overflow: ellipsis;">
                                                            <?php echo e($voucherMain->ratio); ?></td>
                                                        <td
                                                            style="max-width: 150px; white-space: normal; overflow: hidden; text-overflow: ellipsis;">
                                                            <?php echo e($voucherMain->code); ?></td>
                                                        <td
                                                            style="max-width: 150px; white-space: normal; overflow: hidden; text-overflow: ellipsis;">
                                                            <?php echo e($voucherMain->user->fullname); ?></td>
                                                        <td style="display: flex;">
                                                            <a href="#" data-bs-toggle="modal" data-bs-target="#editModal-<?php echo e($voucherMain->id); ?>">
                                                                <button type="button" class="btn btn-primary" title="Chỉnh sửa">
                                                                    <i class="ri-edit-line align-middle"></i>
                                                                </button>
                                                                
                                                            </a>
                                                        
                                                            <!-- Modal Chỉnh sửa -->
                                                            <div class="modal fade" id="editModal-<?php echo e($voucherMain->id); ?>" tabindex="-1"
                                                                aria-labelledby="editModalLabel-<?php echo e($voucherMain->id); ?>" aria-hidden="true">
                                                                <div class="modal-dialog modal-xl">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="editModalLabel-<?php echo e($voucherMain->id); ?>">
                                                                                Chỉnh sửa Voucher</h5>
                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                                aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <form action="<?php echo e(route('voucher_main.update', ['id' => $voucherMain->id,  'token' => auth()->user()->refesh_token])); ?>" method="POST" enctype="multipart/form-data">
                                                                                <?php echo csrf_field(); ?>
                                                                                <?php echo method_field('PUT'); ?>
                                                                                <div class="row">
                                                                                    <div class="col-6">
                                                                                        <div class="mb-3">
                                                                                            <label for="title-<?php echo e($voucherMain->id); ?>" class="form-label">Tiêu đề</label>
                                                                                            <input type="text" class="form-control"
                                                                                                placeholder="Tiêu đề" id="title-<?php echo e($voucherMain->id); ?>" name="title"
                                                                                                value="<?php echo e($voucherMain->title); ?>" required>
                                                                                        </div>
                                                                                    </div>
                                                        
                                                                                    <div class="col-6">
                                                                                        <div class="mb-3">
                                                                                            <label for="description-<?php echo e($voucherMain->id); ?>" class="form-label">Nội dung</label>
                                                                                            <textarea class="form-control" placeholder="Nội dung" id="description-<?php echo e($voucherMain->id); ?>" name="description" rows="2" required><?php echo e($voucherMain->description); ?></textarea>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="row">
                                                                                        
                                                                                        <div class="col-6">
                                                                                            <div class="mb-3">
                                                                                                <label for="quantity-<?php echo e($voucherMain->id); ?>" class="form-label">Số lượng</label>
                                                                                                <input type="number" class="form-control" id="quantity-<?php echo e($voucherMain->id); ?>"
                                                                                                    name="quantity" placeholder="Số lượng" value="<?php echo e($voucherMain->quantity); ?>" required>
                                                                                            </div>
                                                                                        </div>
                                                            
                                                                                        <div class="col-6">
                                                                                            <div class="mb-3">
                                                                                                <label for="limitValue-<?php echo e($voucherMain->id); ?>" class="form-label">Tổng tiền sản phẩm</label>
                                                                                                <input type="number" class="form-control" id="limitValue-<?php echo e($voucherMain->id); ?>"
                                                                                                    name="limitValue" placeholder="Tổng tiền sản phẩm"
                                                                                                    value="<?php echo e($voucherMain->limitValue); ?>" required>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="row">
                                                                                        <div class="col-6">
                                                                                            <div class="mb-3">
                                                                                                <label for="ratio-<?php echo e($voucherMain->id); ?>" class="form-label">Phần trăm giảm giá</label>
                                                                                                <input type="number" class="form-control" id="ratio-<?php echo e($voucherMain->id); ?>"
                                                                                                    name="ratio" step="0.01" placeholder="Phần trăm giảm giá" value="<?php echo e($voucherMain->ratio); ?>" required>
                                                                                            </div>
                                                                                        </div>
                                                        
                                                                                        <div class="col-6">
                                                                                            <div class="mb-3">
                                                                                                <label for="code-<?php echo e($voucherMain->id); ?>" class="form-label">Mã giảm giá</label>
                                                                                                <input type="text" class="form-control" id="code-<?php echo e($voucherMain->id); ?>"
                                                                                                    name="code" placeholder="Enter code" value="<?php echo e($voucherMain->code); ?>" required>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="row">
                                                                                        
                                                                                        <div class="col-6">
                                                                                            <div class="mb-3">
                                                                                                <label for="min-<?php echo e($voucherMain->id); ?>" class="form-label">Đơn hàng tối thiểu</label>
                                                                                                <input type="min" class="form-control" id="min-<?php echo e($voucherMain->id); ?>"
                                                                                                    name="min_order" placeholder="" value="<?php echo e($voucherMain->min); ?>" required>
                                                                                            </div>
                                                                                        </div>                                                           
                                                                                    </div>
                                                                                    <div class="row">
                                                                                        <div class="col-6">
                                                                                            <div class="mb-3">
                                                                                                <label for="status-<?php echo e($voucherMain->id); ?>" class="form-label">Trạng thái</label>
                                                                                                <select style="width: 130px" class="form-control" id="status-<?php echo e($voucherMain->id); ?>"
                                                                                                    name="status" required>
                                                                                                    <option value="" disabled>Chọn trạng thái</option>
                                                                                                    <option value="2" <?php echo e($voucherMain->status == 2 ? 'selected' : ''); ?>>Active</option>
                                                                                                    <option value="0" <?php echo e($voucherMain->status == 0 ? 'selected' : ''); ?>>Inactive</option>
                                                                                                </select>
                                                                                            </div>
                                                                                        </div>
                                                            
                                                                                        <div class="col-6">
                                                                                            <div class="text-end">
                                                                                                <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <a class="ms-2" href="#" data-bs-toggle="modal" data-bs-target="#detailsModal-<?php echo e($voucherMain->id); ?>">
                                                                <button type="button" class="btn btn-primary" title="Chi tiết voucher">
                                                                    <i class="ri-eye-line align-middle"></i>
                                                                </button>
                                                            </a>
                                                        
                                                         <!-- Modal Chi tiết voucher -->
                                                        <div class="modal fade" id="detailsModal-<?php echo e($voucherMain->id); ?>" tabindex="-1" aria-labelledby="detailsModalLabel-<?php echo e($voucherMain->id); ?>" aria-hidden="true">
                                                            <div class="modal-dialog modal-lg">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="detailsModalLabel-<?php echo e($voucherMain->id); ?>">Thông tin voucher chi tiết</h5>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="card shadow-sm">
                                                                            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                                                                                <h5 class="mb-0 text-white">Chi tiết Voucher</h5>
                                                                                <span class="badge <?php echo e($voucherMain->status == 2 ? 'bg-success' : 'bg-danger'); ?>">
                                                                                    <?php echo e($voucherMain->status == 2 ? 'Hoạt động' : 'Không hoạt động'); ?>

                                                                                </span>
                                                                            </div>
                                                                            <div class="card-body">
                                                                                <div class="row">
                                                                                    <!-- Cột trái -->
                                                                                    <div class="col-lg-6">
                                                                                        <div class="mb-3">
                                                                                            <strong>Tiêu đề:</strong>
                                                                                            <span class="text-muted"><?php echo e($voucherMain->title); ?></span>
                                                                                        </div>
                                                                                        <div class="mb-3">
                                                                                            <strong>Mô tả:</strong>
                                                                                            <span class="text-muted"><?php echo e($voucherMain->description); ?></span>
                                                                                        </div>
                                                                                        <div class="mb-3">
                                                                                            <strong>Số lượng:</strong>
                                                                                            <span class="text-muted"><?php echo e($voucherMain->quantity); ?></span>
                                                                                        </div>
                                                                                        <div class="mb-3">
                                                                                            <strong>Tổng giá trị tối thiểu:</strong>
                                                                                            <span class="text-muted"><?php echo e(number_format($voucherMain->limitValue, 0, ',', '.')); ?> VNĐ</span>
                                                                                        </div>
                                                                                        <div class="mb-3">
                                                                                            <strong>Phần trăm giảm giá:</strong>
                                                                                            <span class="text-muted"><?php echo e($voucherMain->ratio); ?>%</span>
                                                                                        </div>
                                                                                    </div>
                                                                                    <!-- Cột phải -->
                                                                                    <div class="col-lg-6">
                                                                                        <div class="mb-3">
                                                                                            <strong>Mã giảm giá:</strong>
                                                                                            <span class="text-muted"><?php echo e($voucherMain->code); ?></span>
                                                                                        </div>
                                                                                        <div class="mb-3">
                                                                                            <strong>Đơn hàng tối thiểu:</strong>
                                                                                            <span class="text-muted"><?php echo e(number_format($voucherMain->min, 0, ',', '.')); ?> VNĐ</span>
                                                                                        </div>
                                                                                        <div class="mb-3">
                                                                                            <strong>Người tạo:</strong>
                                                                                            <span class="text-muted"><?php echo e($voucherMain->user->fullname); ?></span>
                                                                                        </div>
                                                                                        <div class="mb-3">
                                                                                            <strong>Ngày tạo:</strong>
                                                                                            <span class="text-muted"><?php echo e($voucherMain->created_at); ?></span>
                                                                                        </div>
                                                                                        <div class="mb-3">
                                                                                            <strong>Ngày cập nhật:</strong>
                                                                                            <span class="text-muted"><?php echo e($voucherMain->updated_at); ?></span>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-12 text-center">
                                                                                        <div class="mb-3">
                                                                                            <strong>Hình ảnh:</strong>
                                                                                            <div>
                                                                                                <?php if($voucherMain->image): ?>
                                                                                                    <img src="<?php echo e($voucherMain->image); ?>" alt="Voucher Image" style="width: 200px; height: auto; border-radius: 5px;">
                                                                                                <?php else: ?>
                                                                                                    <span class="text-muted">Không có hình ảnh</span>
                                                                                                <?php endif; ?>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                           <div class="ms-2">
                                                            <form
                                                            action="<?php echo e(route('voucher.delete', ['token' => auth()->user()->refesh_token, 'id' => $voucherMain->id, 'tab' => 2])); ?>" method="POST" style="display: inline;"
                                                            >
                                                            <?php echo csrf_field(); ?>
                                                            <?php echo method_field('DELETE'); ?>                                                       
                                                                <button type="submit" class="btn btn-danger" title="Xóa"  onclick="return confirm('Bạn có chắc chắn muốn xóa voucher này?');">
                                                                    <i class="ri-delete-bin-line align-middle"></i>
                                                            </button>
                                                        </form>
                                                           </div>
                                                        </td>
                                                            



                                                    </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tbody>

                                        </table>


                                    </div>
                                </div>
                                <div class="mt-3">
                                    
                                </div>
                            </div><!-- end card-body -->

                        </div><!-- end card -->
                    </div>
                </div>
            </div>

        </div>
    </div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\datn_1\resources\views/voucher/voucher_list.blade.php ENDPATH**/ ?>