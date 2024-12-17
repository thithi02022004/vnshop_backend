<?php $__env->startSection('title', 'List Store'); ?>

<?php $__env->startSection('main'); ?>
   <div class="container-fluid">
    <div class="row">
        <div class="col-xl-12">
        <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Danh sách event đã xóa</h4>
                        <a
                        href="<?php echo e(route('events',['token' => auth()->user()->refesh_token])); ?>"
                        class="nav-link text-primary"
                        style="font-weight: bold;"
                        data-key="t-ecommerce"
                    >
                        Danh sách events
                    </a>
                    </div><!-- end card header -->
                   
                    <div class="card-body">
                        <div class="live-preview">
                            <div class="table-responsive">
                                <table class="table align-middle table-nowrap mb-0">
                                    <thead>
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Tên event</th>
                                            <th scope="col">Đk áp dụng</th>
                                            <th scope="col">Thông tin thêm</th>
                                            <th scope="col">Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if($trash_events->isEmpty()): ?>
                                            <tr>
                                                <td colspan="6" class="text-center">Không có cửa hàng nào chờ duyệt.</td>
                                            </tr>
                                        <?php else: ?>
                                            <?php $__currentLoopData = $trash_events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <th scope="row"><a href="#" class="fw-medium"><?php echo e($event->id); ?></a></th>
                                                    <td style="word-wrap: break-word; white-space: normal; max-width: 200px;">
                                                        <?php echo e($event->event_title ?? "Chưa đặt tên"); ?>

                                                    </td>
                                                    <td style="word-wrap: break-word; white-space: normal;">
                                                     Chỉ áp dụng chon những đơn trên <?php echo e($event->where_price ?? "???"); ?>

                                                    </td>
                                                    <td>
                                                        
                                                        <ul>
                                                            <li>Mô tả:<?php echo e($event->event_title ?? "Chưa nhập"); ?></li>
                                                            <li>Từ ngày <?php echo e($event->from); ?> 
                                                                đến ngày <?php echo e($event->to); ?></li>
                                                        </ul>
                                                    </td>
                                                    
                                                    <td>
                                                      
                                                          
                                                           
                                                                <button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#firstmodal<?php echo e($event->id); ?>" title="Chỉnh sửa"><i class="ri-edit-line align-middle"></i></button>
                                                                <!-- First modal dialog -->
                                                                <div class="modal fade" id="firstmodal<?php echo e($event->id); ?>" aria-hidden="true" aria-labelledby="..." tabindex="-1">
                                                                    <div class="modal-dialog modal-dialog-centered" style=" margin-left: 20%;">
                                                                        <div class="modal-content" style="width:1000px">
                                                                            <div class="modal-body text-center p-5" style="width:1000px">
                                                                            <form id="addBlogForm"
                                                                                                action="<?php echo e(route('update_events', [
                                                                                                    'token' => auth()->user()->refesh_token,'id'=>$event->id
                                                                                                ])); ?>"
                                                                                                method="POST" >
                                                                                <?php echo csrf_field(); ?>
                                                                                <input type="hidden" name="_method" value="PUT">
                                                                                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">

                                                                                <div class="row g-3">
                                                                                    <div class="col-md-6">
                                                                                        <label for="event_title" class="form-label">Tiêu đề</label>
                                                                                        <input type="text" class="form-control" id="event_title" name="event_title" value="<?php echo e(old('event_title', $event->event_title ?? '')); ?>" required>
                                                                                    </div>
                                                                                    <div class="col-md-6">
                                                                                        <label for="event_day" class="form-label">Ngày</label>
                                                                                        <input type="number" class="form-control" id="event_day" name="event_day" min="1" max="31" value="<?php echo e(old('event_day', $event->event_day ?? '')); ?>" required>
                                                                                    </div>
                                                                                    <div class="col-md-6">
                                                                                        <label for="event_month" class="form-label">Tháng</label>
                                                                                        <input type="number" class="form-control" id="event_month" name="event_month" min="1" max="12" value="<?php echo e(old('event_month', $event->event_month ?? '')); ?>" required>
                                                                                    </div>
                                                                                    <div class="col-md-6">
                                                                                        <label for="event_year" class="form-label">Năm</label>
                                                                                        <input type="number" class="form-control" id="event_year" name="event_year" min="1900" max="2100" value="<?php echo e(old('event_year', $event->event_year ?? '')); ?>" required>
                                                                                    </div>
                                                                                    <div class="col-md-6">
                                                                                        <label for="qualifier" class="form-label">Điều kiện</label>
                                                                                        <input type="text" class="form-control" id="qualifier" name="qualifier" value="<?php echo e(old('qualifier', $event->qualifier ?? '')); ?>">
                                                                                    </div>
                                                                                    <div class="col-md-6">
                                                                                        <label for="voucher_apply" class="form-label">Áp dụng voucher</label>
                                                                                        <input type="text" class="form-control" id="voucher_apply" name="voucher_apply" value="<?php echo e(old('voucher_apply', $event->voucher_apply ?? '')); ?>">
                                                                                    </div>
                                                                                
                                                                                    <div class="col-md-6">
                                                                                        <div class="form-check mt-4">
                                                                                            <input type="checkbox" class="form-check-input" id="is_share_facebook" name="is_share_facebook" value="1" <?php echo e(old('is_share_facebook', $event->is_share_facebook ?? 0) ? 'checked' : ''); ?>>
                                                                                            <label for="is_share_facebook" class="form-check-label">Chia sẻ Facebook</label>
                                                                                        </div>
                                                                                        <div class="form-check mt-4">
                                                                                            <input type="checkbox" class="form-check-input" id="is_share_zalo" name="is_share_zalo" value="1" <?php echo e(old('is_share_zalo', $event->is_share_zalo ?? 0) ? 'checked' : ''); ?>>
                                                                                            <label for="is_share_zalo" class="form-check-label">Chia sẻ Zalo</label>
                                                                                        </div>
                                                                                        <div class="form-check mt-4">
                                                                                            <input type="checkbox" class="form-check-input" id="is_mail" name="is_mail" value="1" <?php echo e(old('is_mail', $event->is_mail ?? 0) ? 'checked' : ''); ?>>
                                                                                            <label for="is_mail" class="form-check-label">Gửi email</label>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-6">
                                                                                        <label for="point" class="form-label">Điểm</label>
                                                                                        <input type="number" class="form-control" id="point" name="point" value="<?php echo e(old('point', $event->point ?? 0)); ?>">
                                                                                    </div>
                                                                                    
                
                                                                                    <div class="col-md-6">
                                                                                        <label for="where_order" class="form-label">Vị trí đơn hàng</label>
                                                                                        <input type="number" class="form-control" id="where_order" name="where_order" value="<?php echo e(old('where_order', $event->where_order ?? 0)); ?>">
                                                                                    </div>
                                                                                    <div class="col-md-6">
                                                                                        <label for="where_price" class="form-label">Giá đơn hàng</label>
                                                                                        <input type="number" step="0.01" class="form-control" id="where_price" name="where_price" value="<?php echo e(old('where_price', $event->where_price ?? 0)); ?>">
                                                                                    </div>
                                                                                    <div class="col-md-6">
                                                                                        <label for="date" class="form-label">Ngày</label>
                                                                                        <input type="date" class="form-control" id="date" name="date" value="<?php echo e(old('date', $event->date ?? '')); ?>">
                                                                                    </div>
                                                                                    <div class="col-md-6">
                                                                                        <label for="from" class="form-label">Thời gian bắt đầu</label>
                                                                                        <input type="datetime-local" class="form-control" id="from" name="from" value="<?php echo e(old('from', $event->from ?? '')); ?>">
                                                                                    </div>
                                                                                    <div class="col-md-6">
                                                                                        <label for="to" class="form-label">Thời gian kết thúc</label>
                                                                                        <input type="datetime-local" class="form-control" id="to" name="to" value="<?php echo e(old('to', $event->to ?? '')); ?>">
                                                                                    </div>

                                                                                    <div class="col-md-6">
                                                                                        <label for="status" class="form-label">Trạng thái</label>
                                                                                        <select 
                                                                                            style="margin-top: 2px; margin-left: -30px; width: 50%;" 
                                                                                            class="form-select" 
                                                                                            id="status" 
                                                                                            name="status"
                                                                                        >
                                                                                            <option value="1" <?php echo e($event->status == 1 ? 'selected' : ''); ?>>Hoạt động</option>
                                                                                            <option value="2" <?php echo e($event->status == 2 ? 'selected' : ''); ?>>Không hoạt động</option>
                                                                                        </select>
                                                                                    </div>
                                                                                    
                                                                                    <div class="col-md-12">
                                                                                        <label for="description" class="form-label">Mô tả</label>
                                                                                        <textarea class="form-control" id="description" name="description" rows="3"><?php echo e(old('description', $event->description ?? '')); ?></textarea>
                                                                                    </div>

                                                                                    <div class="col-md-12 text-center">
                                                                                        <button type="submit" class="btn btn-primary mt-3">Cập nhật</button>
                                                                                    </div>
                                                                                </div>
                                                                                
                                                                            </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                          
                                                             
                                                          
                                                               
                                                                <li class="list-inline-item">
                                                                    <a 
                                                                        href="<?php echo e(route('change_status_events', [
                                                                                                            'token' => auth()->user()->refesh_token,
                                                                                                            'id' => $event->id,
                                                                                                            'status' => 2,
                                                                                                            ])); ?>"
                                                                    >
                                                                    <button type="button" class="btn btn-info"
                                                                    title="Khôi phục"
                                                                    onclick="return confirm('Bạn có chắc chắn muốn khôi phục event này?');">
                                                                    <i class="ri-refresh-line align-middle"></i>
                                                                </button>
                                                                </li>  
                                                               
                                                          
                                                       
                                                       
                                                        
                                                    </td>
                                                    
                                                    
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
    
                        <!-- Pagination Links -->
                        
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="mt-3">
                                    <?php echo e($trash_events->appends(['token' => auth()->user()->refesh_token])->links()); ?>

                                </div>
                                <a
                                    href="<?php echo e(route('trash_stores',['token' => auth()->user()->refesh_token])); ?>"
                                    class="nav-link text-primary"
                                    style="font-weight: bold;"
                                    data-key="t-ecommerce"
                                >
                                    events đã xóa
                                </a>
                            </div>
                    </div><!-- end card-body -->
                </div><!-- end card -->
            
        </div> 


    </div>
   </div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\datn_1\resources\views/events/trash_event.blade.php ENDPATH**/ ?>