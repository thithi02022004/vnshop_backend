<?php $__env->startSection('title', 'List Store'); ?>

<?php $__env->startSection('main'); ?>
   <div class="container-fluid">
    <div class="row">
        <div class="col-xl-12">
        <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Danh sách event đang hoạt động</h4>
                          <!-- Toggle Between Modals -->
                     <button type="button" class="btn btn-primary " data-bs-toggle="modal"
                     data-bs-target="#firstmodal">Thêm Sự kiện</button>
                 <!-- First modal dialog -->
                 <div class="modal fade" id="firstmodal" aria-hidden="true" aria-labelledby="..."
                     tabindex="-1">
                     <div class="modal-dialog modal-dialog-centered modal-xl">
                         <div class="modal-content">
                             <div class="modal-body text-center p-5">
                                <form id="addBlogForm" 
                                action="<?php echo e(route('store_events', ['token' => auth()->user()->refesh_token])); ?>" 
                                method="POST" enctype="multipart/form-data">
                              <?php echo csrf_field(); ?>
                              <div class="row g-3">
                                  <div class="col-md-6">
                                      <label for="event_title" class="form-label">Tiêu đề sự kiện</label>
                                      <input type="text" class="form-control" id="event_title" name="event_title" value="<?php echo e(old('event_title')); ?>" required>
                                  </div>
                                  <div class="col-md-2">
                                      <label for="event_day" class="form-label">Ngày</label>
                                      <input type="number" class="form-control" id="event_day" name="event_day" min="1" max="31" value="<?php echo e(old('event_day')); ?>" required>
                                  </div>
                                  <div class="col-md-2">
                                      <label for="event_month" class="form-label">Tháng</label>
                                      <input type="number" class="form-control" id="event_month" name="event_month" min="1" max="12" value="<?php echo e(old('event_month')); ?>" required>
                                  </div>
                                  <div class="col-md-2">
                                      <label for="event_year" class="form-label">Năm</label>
                                      <input type="number" class="form-control" id="event_year" name="event_year" min="1900" max="2100" value="<?php echo e(old('event_year')); ?>" required>
                                  </div>
                                  <div class="col-md-6">
                                      <label for="qualifier" class="form-label">Điều kiện</label>
                                      <input type="text" class="form-control" id="qualifier" name="qualifier" min="1" value="<?php echo e(old('qualifier')); ?>" required title="nhập lớn hơn 0">
                                  </div>
                                  <div class="col-md-6">
                                      <label for="voucher_apply" class="form-label">Tiêu Đề Mã Giảm Giá</label>
                                      <input type="text" class="form-control" id="voucher_apply" name="voucher_apply" value="<?php echo e(old('voucher_apply')); ?>">
                                  </div>
                                  <div class="col-md-4">
                                      <label for="voucher_apply" class="form-label">Mô Tả Cho Giảm Giá</label>
                                      <input type="text" class="form-control" id="voucher_apply" name="voucher_description" value="<?php echo e(old('voucher_apply')); ?>">
                                  </div>
                                  <div class="col-md-2">
                                      <label for="voucher_apply" class="form-label">Số lượng mã giảm giá</label>
                                      <input type="text" class="form-control" id="voucher_apply" min="1" name="voucher_quantity" value="<?php echo e(old('voucher_apply')); ?>" required title="Nhập lớn hơn 0">
                                  </div>
                                  <div class="col-md-2">
                                      <label for="voucher_apply" class="form-label">Số tiền giới hạn</label>
                                      <input type="text" class="form-control" id="voucher_apply" name="voucher_limit" min="1" value="<?php echo e(old('voucher_apply')); ?>"required title="Nhập lớn hơn 0">
                                  </div>
                                  <div class="col-md-2">
                                      <label for="voucher_apply" class="form-label">% Giảm giá</label>
                                      <input type="text" class="form-control" id="voucher_apply" name="voucher_ratio" min="0" value="<?php echo e(old('voucher_apply')); ?>"required title="Nhập lớn hơn 0">
                                  </div>
                                  <div class="col-md-2">
                                      <label for="voucher_apply" class="form-label">Mã Giảm Giá</label>
                                      <input type="text" class="form-control" id="voucher_apply" name="voucher_code" value="<?php echo e(old('voucher_apply')); ?>" required>
                                  </div>
                                  <div class="col-md-3">
                                    <div class="form-check mt-4">
                                        <input type="checkbox" class="form-check-input" id="is_share_facebook" name="is_share_facebook" value="1" <?php echo e(old('is_share_facebook') ? 'checked' : ''); ?>>
                                        <label for="is_share_facebook" class="form-check-label">Chia sẻ Facebook</label>
                                    </div>
                                    <div class="form-check mt-4">
                                      <input type="checkbox" class="form-check-input" id="is_share_zalo" name="is_share_zalo" value="1" <?php echo e(old('is_share_zalo') ? 'checked' : ''); ?>>
                                      <label for="is_share_zalo" class="form-check-label">Chia sẻ Zalo</label>
                                  </div>
                                  <div class="form-check mt-4">
                                      <input type="checkbox" class="form-check-input" id="is_mail" name="is_mail" value="1" <?php echo e(old('is_mail') ? 'checked' : ''); ?>>
                                      <label for="is_mail" class="form-check-label">Gửi email</label>
                                  </div>
                                </div>
                                  <div class="col-md-3">
                                      <label for="point" class="form-label">Áp dụng theo điểm</label>
                                      <input type="number" class="form-control" id="point" name="point" value="<?php echo e(old('point', 0)); ?>" min="0" required title="Nhập lớn hơn 0">
                                  </div>
                                
                                  <div class="col-md-3">
                                      <label for="where_order" class="form-label">Áp dụng theo số lượng đơn đã đặt</label>
                                      <input type="number" class="form-control" id="where_order" name="where_order" value="<?php echo e(old('where_order', 0)); ?>" min="0" required title="Nhập lớn hơn 0">
                                  </div>
                                  <div class="col-md-3">
                                      <label for="where_price" class="form-label">Áp dụng theo tổng tiền đặt hàng</label>
                                      <input type="number" step="0.01" class="form-control" id="where_price" name="where_price" value="<?php echo e(old('where_price', 0)); ?>" min="0" required title="Nhập lớn hơn 0">
                                  </div>

                                  <div class="col-md-3">
                                      <label for="from" class="form-label">Áp Dụng Từ Ngày</label>
                                      <input type="date" class="form-control" id="from" name="from" value="<?php echo e(old('from')); ?>">
                                  </div>
                                  <div class="col-md-3">
                                      <label for="to" class="form-label">Áp Dụng Đến Hết Ngày</label>
                                      <input type="date" class="form-control" id="to" name="to" value="<?php echo e(old('to')); ?>">
                                  </div>
                                  <div class="col-md-6">
                                      <label for="status" class="form-label">Trạng thái</label>
                                      <select style="width: 507px;left: 2rem; margin-top: 1px " style="width: 130px" class="form-control" id="status" name="status" required>
                                          <option value="" disabled selected>Chọn trạng thái</option>
                                          <option value="2">Hoạt động</option>
                                          <option value="3">Không hoạt động</option>
                                      </select>
                                  </div>
                                  <div class="col-md-6">
                                      <label for="description" class="form-label">Mô tả</label>
                                      <textarea class="form-control" id="description" name="description" rows="3"><?php echo e(old('description')); ?></textarea>
                                  </div>
                                  <div class="col-md-6">
                                      <label for="from" class="form-label">Hình ảnh</label>
                                      <input type="file" class="form-control" id="from" name="event_image[]" multiple>
                                  </div>
                                  <!-- <h5>Áp dụng cho sản sản phẩm</h5>
                                  <div class="col-md-2">
                                      <label for="product_view" class="form-label">Chỉ những sản phẩm có lượt xem từ: </label>
                                      <input type="text" class="form-control" id="product_view" name="product_view" value="<?php echo e(old('product_view')); ?>">
                                  </div>
                                  <div class="col-md-2">
                                      <label for="product_sold_count" class="form-label">Chỉ những sản phẩm có lượt bán từ: </label>
                                      <input type="text" class="form-control" id="product_sold_count" name="product_sold_count" value="<?php echo e(old('product_sold_count')); ?>">
                                  </div>
                                  <h5>Áp dụng cho cửa hàng</h5>
                                  <div class="col-md-2">
                                      <label for="shop_where_visits" class="form-label">Áp dụng cửa hàng theo lượt truy cập: </label>
                                      <input type="text" class="form-control" id="shop_where_visits" name="shop_where_visits" value="<?php echo e(old('shop_where_visits')); ?>">
                                  </div>
                                  <div class="col-md-2">
                                      <label for="shop_where_product_sold_count" class="form-label">Áp dụng cửa hàng theo lượt bán (tổng sản phẩm): </label>
                                      <input type="text" class="form-control" id="shop_where_product_sold_count" name="shop_where_product_sold_count" value="<?php echo e(old('shop_where_product_sold_count')); ?>">
                                  </div> -->
                                  <div class="col-md-12 ">
                                      <button type="submit" class="btn btn-primary mt-3">Thêm sự kiện</button>
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
                                            <th scope="col">Tên event</th>
                                            <th scope="col">Đk áp dụng</th>
                                            <th scope="col">Thông tin thêm</th>
                                            <th scope="col">Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if($events->isEmpty()): ?>
                                            <tr>
                                                <td colspan="6" class="text-center">Không có cửa hàng nào chờ duyệt.</td>
                                            </tr>
                                        <?php else: ?>
                                            <?php $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
                                                      <div>
                                                            <?php if($event->status == 1): ?>
                                                                
                                                            <a 
                                                            href="<?php echo e(route('change_status_events', [
                                                                                                'token' => auth()->user()->refesh_token,
                                                                                                'id' => $event->id,
                                                                                                'status' => 2,
                                                                                                ])); ?>"
                                                        >
                                                        <button type="button" class="btn btn-success" title="mở"> <i class="ri-check-line align-middle"></i></button>
                                                            </a>
                                                            <?php elseif($event->status == 2): ?>
                                                                
                                                              
                                                                <a 
                                                                href="<?php echo e(route('change_status_events', [
                                                                                                    'token' => auth()->user()->refesh_token,
                                                                                                    'id' => $event->id,
                                                                                                    'status' => 1,
                                                                                                    ])); ?>"
                                                            >
                                                            <button type="button" class="btn btn-secondary" title="Khóa">
                                                                <i class="ri-lock-line align-middle"></i>
                                                            </button>
                                                            </a>
                                                             
                                                            <?php endif; ?>
                                                            
                                                                <button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#firstmodal<?php echo e($event->id); ?>" title="Chỉnh sửa"><i class="ri-edit-line align-middle"></i></button>
                                                                <!-- First modal dialog -->
                                                                <div class="modal fade" id="firstmodal<?php echo e($event->id); ?>" aria-hidden="true" aria-labelledby="..." tabindex="-1">
                                                                    <div class="modal-dialog modal-dialog-centered" style=" margin-left: 20%;">
                                                                        <div class="modal-content" style="width:1000px">
                                                                            <div class="modal-body text-center p-5" style="width:1000px">
                                                                                <form id="editEventForm" 
                                                                                action="<?php echo e(route('update_events', ['token' => auth()->user()->refesh_token, 'id' => $event->id])); ?>" 
                                                                                method="POST" enctype="multipart/form-data">
                                                                              <?php echo csrf_field(); ?>
                                                                              <?php echo method_field('PUT'); ?>
                                                                              <div class="row g-3">
                                                                                  <div class="col-md-6">
                                                                                      <label for="event_title" class="form-label">Tiêu đề sự kiện</label>
                                                                                      <input type="text" class="form-control" id="event_title" name="event_title" 
                                                                                             value="<?php echo e(old('event_title', $event->event_title)); ?>" required>
                                                                                  </div>
                                                                                  <div class="col-md-2">
                                                                                      <label for="event_day" class="form-label">Ngày</label>
                                                                                      <input type="number" class="form-control" id="event_day" name="event_day" 
                                                                                             min="1" max="31" value="<?php echo e(old('event_day', $event->event_day)); ?>" required>
                                                                                  </div>
                                                                                  <div class="col-md-2">
                                                                                      <label for="event_month" class="form-label">Tháng</label>
                                                                                      <input type="number" class="form-control" id="event_month" name="event_month" 
                                                                                             min="1" max="12" value="<?php echo e(old('event_month', $event->event_month)); ?>" required>
                                                                                  </div>
                                                                                  <div class="col-md-2">
                                                                                      <label for="event_year" class="form-label">Năm</label>
                                                                                      <input type="number" class="form-control" id="event_year" name="event_year" 
                                                                                             min="1900" max="2100" value="<?php echo e(old('event_year', $event->event_year)); ?>" required>
                                                                                  </div>
                                                                                  <div class="col-md-6">
                                                                                    <label for="qualifier" class="form-label">Điều kiện</label>
                                                                                    <input type="text" class="form-control" id="qualifier" name="qualifier" 
                                                                                           value="<?php echo e(old('qualifier', $event->qualifier)); ?>" min="0" required title="Nhập lớn hơn 0">
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <label for="voucher_title" class="form-label">Tiêu Đề Mã Giảm Giá</label>
                                                                                    <input type="text" class="form-control" id="voucher_apply" name="voucher_title" 
                                                                                           value="<?php echo e(old('voucher_title', $event['voucher_apply']['voucher_title'] ?? 'N/A')); ?>">
                                                                                </div>
                                                                                <div class="col-md-4">
                                                                                    <label for="voucher_description" class="form-label">Mô Tả Cho Giảm Giá</label>
                                                                                    <input type="text" class="form-control" id="voucher_description" name="voucher_description" 
                                                                                           value="<?php echo e(old('voucher_description', $event->voucher_apply['voucher_description'] ?? '1')); ?>">
                                                                                </div>
                                                                                <div class="col-md-2">
                                                                                    <label for="voucher_quantity" class="form-label">Số lượng mã giảm giá</label>
                                                                                    <input type="number" class="form-control" id="voucher_quantity" name="voucher_quantity" 
                                                                                           value="<?php echo e(old('voucher_quantity', $event['voucher_apply']['voucher_quantity'] ?? 'N/A')); ?>" min="0" required title="Nhập lớn hơn 0">
                                                                                </div>
                                                                                <div class="col-md-2">
                                                                                    <label for="voucher_limit" class="form-label">Số tiền giới hạn</label>
                                                                                    <input type="number" class="form-control" id="voucher_limit" name="voucher_limit" 
                                                                                           value="<?php echo e(old('voucher_limit', $event['voucher_apply']['voucher_limit'] ?? 'N/A')); ?>" min="0" required title="Nhập lớn hơn 0">
                                                                                </div>
                                                                                <div class="col-md-2">
                                                                                    <label for="voucher_ratio" class="form-label">% Giảm giá</label>
                                                                                    <input type="number" step="0.01" class="form-control" id="voucher_ratio" name="voucher_ratio" 
                                                                                           value="<?php echo e(old('voucher_ratio', $event['voucher_apply']['voucher_ratio'] ?? 'N/A')); ?>" min="0" required title="Nhập lớn hơn 0">
                                                                                </div>
                                                                                <div class="col-md-2">
                                                                                    <label for="voucher_code" class="form-label">Mã Giảm Giá</label>
                                                                                    <input type="text" class="form-control" id="voucher_code" name="voucher_code" 
                                                                                     min="0" value="<?php echo e(old('voucher_code', $event['voucher_apply']['voucher_code'] ?? 'N/A')); ?>" required>
                                                                                </div>
                                                                                
                                                                                  <div class="col-md-3">
                                                                                      <div class="form-check mt-4">
                                                                                          <input type="checkbox" class="form-check-input" id="is_share_facebook" name="is_share_facebook" value="1" 
                                                                                                 <?php echo e(old('is_share_facebook', $event->is_share_facebook) ? 'checked' : ''); ?>>
                                                                                          <label for="is_share_facebook" class="form-check-label">Chia sẻ Facebook</label>
                                                                                      </div>
                                                                                      <div class="form-check mt-4">
                                                                                          <input type="checkbox" class="form-check-input" id="is_share_zalo" name="is_share_zalo" value="1" 
                                                                                                 <?php echo e(old('is_share_zalo', $event->is_share_zalo) ? 'checked' : ''); ?>>
                                                                                          <label for="is_share_zalo" class="form-check-label">Chia sẻ Zalo</label>
                                                                                      </div>
                                                                                      <div class="form-check mt-4">
                                                                                          <input type="checkbox" class="form-check-input" id="is_mail" name="is_mail" value="1" 
                                                                                                 <?php echo e(old('is_mail', $event->is_mail) ? 'checked' : ''); ?>>
                                                                                          <label for="is_mail" class="form-check-label">Gửi email</label>
                                                                                      </div>
                                                                                  </div>
                                                                                  <div class="col-md-3">
                                                                                      <label for="point" class="form-label">Áp dụng theo điểm</label>
                                                                                      <input type="number" class="form-control" id="point" name="point" 
                                                                                             value="<?php echo e(old('point', $event->point)); ?>" min="0" required title="Nhập lớn hơn 0">
                                                                                  </div>
                                                                                  <div class="col-md-3">
                                                                                      <label for="where_order" class="form-label">Áp dụng theo số lượng đơn đã đặt</label>
                                                                                      <input type="number" class="form-control" id="where_order" name="where_order" 
                                                                                             value="<?php echo e(old('where_order', $event->where_order)); ?>" min="0" required title="Nhập lớn hơn 0">
                                                                                  </div>
                                                                                  <div class="col-md-3">
                                                                                      <label for="where_price" class="form-label">Áp dụng theo tổng tiền đặt hàng</label>
                                                                                      <input type="number" step="0.01" class="form-control" id="where_price" name="where_price" 
                                                                                             value="<?php echo e(old('where_price', $event->where_price)); ?>" min="0" required title="Nhập lớn hơn 0">
                                                                                  </div>
                                                                                  <div class="col-md-3">
                                                                                      <label for="from" class="form-label">Áp Dụng Từ Ngày</label>
                                                                                      <input type="date" class="form-control" id="from" name="from" 
                                                                                             value="<?php echo e(old('from', $event->from)); ?>">
                                                                                  </div>
                                                                                  <div class="col-md-3">
                                                                                      <label for="to" class="form-label">Áp Dụng Đến Hết Ngày</label>
                                                                                      <input type="date" class="form-control" id="to" name="to" 
                                                                                             value="<?php echo e(old('to', $event->to)); ?>">
                                                                                  </div>
                                                                                  <div class="col-md-6">
                                                                                      <label for="status" class="form-label">Trạng thái</label>
                                                                                      <select class="form-control" style="width: 450px;left: 2rem; margin-top: 1px "  id="status" name="status" required>
                                                                                          <option value="" disabled <?php echo e(!$event->status ? 'selected' : ''); ?>>Chọn trạng thái</option>
                                                                                          <option value="2" <?php echo e($event->status == 2 ? 'selected' : ''); ?>>Hoạt động</option>
                                                                                          <option value="3" <?php echo e($event->status == 1 ? 'selected' : ''); ?>>Không hoạt động</option>
                                                                                      </select>
                                                                                  </div>
                                                                                  <div class="col-md-6">
                                                                                      <label for="description" class="form-label">Mô tả</label>
                                                                                      <textarea class="form-control" id="description" name="description" rows="3"><?php echo e(old('description', $event->description)); ?></textarea>
                                                                                  </div>
                                                                                  <div class="col-md-6">
                                                                                      <label for="event_image" class="form-label">Hình ảnh</label>
                                                                                      <input type="file" class="form-control" id="event_image" name="event_image[]" multiple>
                                                                                  </div>
                                                                                  <div class="col-md-12 ">
                                                                                      <button type="submit" class="btn btn-primary mt-3">Cập nhật sự kiện</button>
                                                                                  </div>
                                                                              </div>
                                                                          </form>
                                                                          
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                
                                                            </div> 
                                                            <div class="mt-2">
                                                                <a 
                                                                    href="<?php echo e(route('change_status_events', [
                                                                                                        'token' => auth()->user()->refesh_token,
                                                                                                        'id' => $event->id,
                                                                                                        'status' => 5,
                                                                                                        ])); ?>"
                                                                >
                                                                <button type="button" class="btn btn-danger" title="xóa"> <i class=" ri-close-line align-middle"></i></button>
                                        
                                                               
                                                                <a href="#" data-bs-toggle="modal" data-bs-target="#eventDetailsModal-<?php echo e($event->id); ?>">
                                                                    <button type="button" class="btn btn-primary" title="Chi tiết sự kiện">
                                                                        <i class="ri-eye-line align-middle"></i>
                                                                    </button>
                                                                </a>
                                                                <div class="modal fade" id="eventDetailsModal-<?php echo e($event->id); ?>" tabindex="-1" aria-labelledby="eventDetailsModalLabel-<?php echo e($event->id); ?>" aria-hidden="true">
                                                                    <div class="modal-dialog modal-xl">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title" id="eventDetailsModalLabel-<?php echo e($event->id); ?>">Chi tiết Sự kiện</h5>
                                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <div class="row">
                                                                                    <div class="col-md-6">
                                                                                        <h4><strong>Tiêu đề:</strong> <?php echo e($event->event_title); ?></h4>
                                                                                        <p><strong>Ngày:</strong> <?php echo e($event->event_day); ?>/<?php echo e($event->event_month); ?>/<?php echo e($event->event_year); ?></p>
                                                                                        <p><strong>Trạng thái:</strong> <?php echo e($event->status == 1 ? 'Hoạt động' : 'Không hoạt động'); ?></p>
                                                                                        <p><strong>Mô tả:</strong> <?php echo $event->description; ?></p>
                                                                                        <p><strong>Điều kiện:</strong> <?php echo e($event->qualifier); ?></p>
                                                                                        <p><strong>Áp dụng voucher:</strong></p>
                                                                                        <ul>
                                                                                            <li><strong>Tiêu đề:</strong> <?php echo e($event->voucher_apply['voucher_title'] ?? 'Không có'); ?></li>
                                                                                            <li><strong>Mô tả:</strong> <?php echo e($event->voucher_apply['voucher_description'] ?? 'Không có'); ?></li>
                                                                                            <li><strong>Số lượng:</strong> <?php echo e($event->voucher_apply['voucher_quantity'] ?? 'Không có'); ?></li>
                                                                                            <li><strong>Giới hạn:</strong> <?php echo e($event->voucher_apply['voucher_limit'] ?? 'Không có'); ?></li>
                                                                                            <li><strong>Phần trăm giảm:</strong> <?php echo e($event->voucher_apply['voucher_ratio'] ?? 'Không có'); ?></li>
                                                                                            <li><strong>Mã giảm giá:</strong> <?php echo e($event->voucher_apply['voucher_code'] ?? 'Không có'); ?></li>
                                                                                        </ul>
                                                                                        <p><strong>Điểm:</strong> <?php echo e($event->point); ?></p>
                                                                                    </div>
                                                                                    <div class="col-md-6">
                                                                                        <p><strong>Vị trí đơn hàng:</strong> <?php echo e($event->where_order); ?></p>
                                                                                        <p><strong>Giá đơn hàng:</strong> <?php echo e($event->where_price); ?></p>
                                                                                        <p><strong>Ngày:</strong> <?php echo e($event->date ?? 'N/A'); ?></p>
                                                                                        <p><strong>Thời gian bắt đầu:</strong> <?php echo e($event->from ?? 'N/A'); ?></p>
                                                                                        <p><strong>Thời gian kết thúc:</strong> <?php echo e($event->to ?? 'N/A'); ?></p>
                                                                                        <p><strong>Chia sẻ Facebook:</strong> <?php echo e($event->is_share_facebook ? 'Có' : 'Không'); ?></p>
                                                                                        <p><strong>Chia sẻ Zalo:</strong> <?php echo e($event->is_share_zalo ? 'Có' : 'Không'); ?></p>
                                                                                        <p><strong>Gửi email:</strong> <?php echo e($event->is_mail ? 'Có' : 'Không'); ?></p>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
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
    
                        <!-- Pagination Links -->
                        
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="mt-3">
                                    <?php echo e($events->appends(['token' => auth()->user()->refesh_token])->links()); ?>

                                </div>
                                <a
                                    href="<?php echo e(route('trash_events',['token' => auth()->user()->refesh_token])); ?>"
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

<?php echo $__env->make('index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\vnshop.top\resources\views/events/list_event.blade.php ENDPATH**/ ?>