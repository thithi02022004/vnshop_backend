<?php $__env->startSection('title', 'Danh sách quyền hạn'); ?>

<?php $__env->startSection('main'); ?>

<div class="container-fluid">

<div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Cấp quyền cho vai trò: <?php echo e($role->title); ?></h4>
                </div><!-- end card header -->
                <div class="card-body">
                    <div class="live-preview">
                        <div class="row">
                            <div class="col-md-12">
                                <div>
                                    <p class="text-muted">Cấp quyền truy cập</p>
                                    <!-- Bootstrap Custom Checkboxes color -->
                                    <div>
                                        <form action="<?php echo e(route('grant_access',['token' => auth()->user()->refesh_token])); ?>" method="post">
                                            <?php echo csrf_field(); ?>
                                            <?php
                                                $half = ceil(count($permissions) / 2);
                                            ?>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <?php $__currentLoopData = $permissions->slice(0, $half); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <div class="form-check form-check-success mb-3">
                                                        <input name="permissions[]" value="<?php echo e($permission->id); ?>" class="form-check-input" type="checkbox" id="formCheck<?php echo e($permission->id); ?>" 
                                                        <?php if(in_array($permission->id, $role_premission->pluck('premission_id')->toArray())): ?> checked <?php endif; ?>>
                                                            <label class="form-check-label" for="formCheck<?php echo e($permission->id); ?>">
                                                                <?php echo e($permission->name); ?>

                                                            </label>
                                                        </div>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </div>
                                                <div class="col-md-4">
                                                    <?php $__currentLoopData = $permissions->slice($half); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <div class="form-check form-check-success mb-3">
                                                        <input name="permissions[]" value="<?php echo e($permission->id); ?>" class="form-check-input" type="checkbox" id="formCheck<?php echo e($permission->id); ?>"
                                                        <?php if(in_array($permission->id, $role_premission->pluck('premission_id')->toArray())): ?> checked <?php endif; ?>>
                                                        <label class="form-check-label" for="formCheck<?php echo e($permission->id); ?>">
                                                                <?php echo e($permission->name); ?>

                                                            </label>
                                                        </div>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </div>
                                            </div>
                                            <input type="hidden" name="role_id" value="<?php echo e($role->id); ?>">
                                            <button type="submit" class="btn btn-primary">Cấp quyền</button>
                                            <a type="submit" href="<?php echo e(route('delete_access', ['token' => auth()->user()->refesh_token, 'role_id' => $role->id] )); ?>" class="btn btn-danger">Đặt lại</a>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->
                    </div>
                </div>
            </div>
        </div>
        <!--end col-->
    </div>
</div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\datn_1\resources\views/roles/list_permission.blade.php ENDPATH**/ ?>