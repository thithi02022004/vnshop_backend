<?php $__env->startSection('title', 'Danh sách phân quyền'); ?>

<?php $__env->startSection('main'); ?>

<div class="container-fluid">

    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <?php if(session('message')): ?>
                    <div class="alert alert-success">
                        <?php echo e(session('message')); ?>

                    </div>
                    <?php endif; ?>
                    
                    <?php if(session('error')): ?>
                        <div class="alert alert-danger">
                            <?php echo e(session('error')); ?>

                        </div>
                    <?php endif; ?>
                    <h4 class="card-title mb-0 flex-grow-1">Danh sách phân quyền</h4>
                    <!-- Toggle Between Modals -->
                    <button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#firstmodal">Thêm phân quyền</button>
                    <!-- First modal dialog -->
                    <div class="modal fade" id="firstmodal" aria-hidden="true" aria-labelledby="..." tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-body text-center p-5">
                                    <form action="<?php echo e(route('role_store', ['token' => auth()->user()->refesh_token])); ?>" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="mb-3">
                                                    <label for="title" class="form-label">Tên</label>
                                                    <input name="title" type="text" class="form-control" placeholder="Tên Quyền hạn" id="title" required>
                                                </div><!--end mb-3-->
                                            </div><!--end col-->

                                            <div class="col-12">
                                                <div class="mb-3">
                                                    <label for="index" class="form-label">Mô tả</label>
                                                    <input name="description" type="text" class="form-control"placeholder="Thêm mô tả" value="" id="index" required>
                                                </div><!--end mb-3-->
                                            </div><!--end col-->

                                            <div class="col-lg-12">
                                                <div class="text-end">
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                </div><!--end text-end-->
                                            </div><!--end col-->
                                        </div><!--end row-->
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
                                        <th scope="col">Tên phân quyền</th>
                                        <th scope="col">Mô tả</th>
                                        <th scope="col">Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <th scope="row"><a href="#" class="fw-medium"><?php echo e($role->id); ?></a></th>
                                        <td><?php echo e($role->title); ?></td>
                                        <td><?php echo e($role->description ?? "Không có mô tả"); ?></td>
                                        <td>
                                            <ul class="list-inline">                                   
                                                <li class="list-inline-item">
                                                    <a
                                                        href="<?php echo e(route('list_permission', ['token' => auth()->user()->refesh_token,
                                                                                        'id' => $role->id])); ?>">
                                                       <button type="button" class="btn btn-secondary" title="Cấp quyền">
                                                        <i class="ri-shield-user-line align-middle"></i>
                                                    </button>
                                                    
                                                    </a>
                                                </li>

                                                <?php if($role->status == 2): ?>
                                                <li class="list-inline-item">
                                                    <a
                                                        href="<?php echo e(route('change_role', [
                                                                                                'token' => auth()->user()->refesh_token,
                                                                                                'id' => $role->id,
                                                                                                'status' => 3,
                                                                                                ])); ?>">
                                                       <button type="button" class="btn btn-warning" title="Tắt">
                                                        <i class="ri-close-line align-middle"></i>
                                                    </button>
                                                    
                                                    </a>
                                                </li>
                                                <?php elseif($role->status == 3): ?>
                                                <li class="list-inline-item">
                                                    <a
                                                        href="<?php echo e(route('change_role', [
                                                                                            'token' => auth()->user()->refesh_token,
                                                                                            'id' => $role->id,
                                                                                            'status' => 2,
                                                                                            ])); ?>">
                                                        <button type="button" class="btn btn-primary" title="Bật">
                                                            <i class="ri-power-line align-middle"></i>
                                                        </button>
                                                        


                                                </li>
                                                <?php endif; ?>
                                                <li class="list-inline-item">
                                                    <!-- Toggle Between Modals -->
                                                    <button type="button" class="btn btn-primary " data-bs-toggle="modal" title="chỉnh sửa" data-bs-target="#firstmodal<?php echo e($role->id); ?>"><i class="ri-edit-line align-middle"></i></button>
                                                    <!-- First modal dialog -->
                                                    <div class="modal fade" id="firstmodal<?php echo e($role->id); ?>" aria-hidden="true" aria-labelledby="..." tabindex="-1">
                                                        <div class="modal-dialog modal-dialog-centered">
                                                            <div class="modal-content">
                                                                <div class="modal-body text-center p-5">
                                                                <div class="row">
                                                                    <form action="<?php echo e(route('role_update', ['token' => auth()->user()->refesh_token, 'id' => $role->id])); ?>" method="POST">
                                                                        <?php echo csrf_field(); ?>
                                                                        <?php echo method_field('put'); ?>
                                                                            <div class="col-12">
                                                                                <div class="mb-3">
                                                                                    <label for="title" class="form-label">Tên</label>
                                                                                    <input name="title" type="text" class="form-control" placeholder="Tên Quyền hạn" value="<?php echo e($role->title); ?>" id="title" required>
                                                                                </div><!--end mb-3-->
                                                                            </div><!--end col-->

                                                                            <div class="col-12">
                                                                                <div class="mb-3">
                                                                                    <label for="index" class="form-label">Mô tả</label>
                                                                                    <input name="description" type="text" class="form-control"placeholder="Thêm mô tả" value="<?php echo e($role->description); ?>" id="index" required>
                                                                                </div><!--end mb-3-->
                                                                            </div><!--end col-->

                                                                            <div class="col-12">
                                                                                <label for="index" class="form-label">Trạng thái</label>
                                                                                <?php if($role->status == 2): ?>
                                                                                <select name="status" class="form-select mb-3" aria-label="Default select example">
                                                                                    <option selected value="2">Hoạt động </option>
                                                                                    <option value="3">Tạm ngưng</option>
                                                                                </select>
                                                                                <?php elseif($role->status == 3): ?>
                                                                                <select name="status" class="form-select mb-3" aria-label="Default select example">
                                                                                    <option value="2">Hoạt động </option>
                                                                                    <option selected value="3">Tạm ngưng</option>
                                                                                </select>
                                                                                <?php endif; ?>
                                                                            </div>
                                 
                                                                            <div class="col-lg-12">
                                                                                <div class="text-end">
                                                                                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                                                                                </div><!--end text-end-->
                                                                            </div><!--end col-->
                                                                        </div><!--end row-->
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a
                                                        href="<?php echo e(route('role_destroy', ['token' => auth()->user()->refesh_token,
                                                                                            'id' => $role->id,
                                                                                            'status' => 0,
                                                                                            ])); ?>">
                                                         <button type="button" class="btn btn-danger" title="Xóa"  onclick="return confirm('Bạn có chắc chắn muốn xóa quyền này?');">
                                                            <i class="ri-delete-bin-line align-middle"></i>
                                                    </button>
                                                    </a>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>

                            </table>
                            <div class="div mt-2">
                                <?php echo e($roles->appends(['token' => auth()->user()->refesh_token])->links()); ?>

                            </div>
                        </div>
                    </div>
                </div><!-- end card-body -->
            </div><!-- end card -->
        </div>
        <!-- end col -->
        <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">...</div>
        <div class="tab-pane fade" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">...</div>
        <div class="tab-pane fade" id="disabled-tab-pane" role="tabpanel" aria-labelledby="disabled-tab" tabindex="0">...</div>


    </div>
</div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\datn_1\resources\views/roles/list_role.blade.php ENDPATH**/ ?>