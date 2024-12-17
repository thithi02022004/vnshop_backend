<?php $__env->startSection('title', 'List Store'); ?>

<?php $__env->startSection('link'); ?>
<!-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet"> -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" />
<script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
<!-- include summernote css/js -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.js"></script>
<style>
.modal-body img {
max-width: 100%; /* Hình ảnh không vượt quá chiều rộng modal */
height: auto; /* Giữ nguyên tỉ lệ hình ảnh */
display: block; /* Đặt ảnh trên một dòng riêng */
margin: 10px 0; /* Thêm khoảng cách giữa ảnh và nội dung */
}

</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main'); ?>
   <div class="container-fluid">
    <div class="row">
        <nav>   
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
              <button class="nav-link <?php echo e($tab == 1 ? 'active' : ''); ?>" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="<?php echo e($tab == 1 ? 'true' : 'false'); ?>">Tất cả</button>
              <button class="nav-link <?php echo e($tab == 2  ? 'active' : ''); ?>" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="<?php echo e($tab == 2 ? 'true' : 'false'); ?>">Đã xóa</button>
            </div>
          </nav>
          <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade <?php echo e($tab == 1 ? 'show active' : ''); ?>" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header align-items-center d-flex">
                            <h4 class="card-title mb-0 flex-grow-1">Tất cả bài viết</h4>
                             <!-- Toggle Between Modals -->
                             <button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#firstmodal">Thêm bài viết</button>
                             <!-- First modal dialog -->
                             <div class="modal fade" id="firstmodal" aria-hidden="true" aria-labelledby="..." tabindex="-1">
                                 <div class="modal-dialog modal-dialog-centered modal-xl">
                                     <div class="modal-content">
                                         <div class="modal-body text-center p-5">
                                            <form action="<?php echo e(route('posts.store', ['token' => auth()->user()->refesh_token])); ?>" method="POST" enctype="multipart/form-data">
                                                <?php echo csrf_field(); ?> <!-- Thêm CSRF token để bảo mật -->
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="mb-3">
                                                            <label for="title" class="form-label">Tiêu đề</label>
                                                            <input type="text" class="form-control" placeholder="Tiêu đề" id="title" name="title" required>
                                                        </div><!--end mb-3-->
                                                    </div><!--end col-->
                                            
                                                    <div class="col-6">
                                                        <div class="mb-3">
                                                            <label for="blog_id" class="form-label">Chọn Blog</label>
                                                            <select class="form-control" id="blog_id" name="blog_id" required>
                                                                <option value="" disabled selected>Chọn blog</option>
                                                                <?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <option value="<?php echo e($blog->id); ?>"><?php echo e($blog->name); ?></option>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </select>
                                                        </div><!--end mb-3-->
                                                    </div><!--end col-->
                                                    <div class="col-12">
                                                        <div class="mb-3">
                                                            <label for="image" class="form-label">Hình ảnh</label>
                                                            <input type="file" class="form-control" id="image" name="image" accept="image/*">
                                                        </div><!--end mb-3-->
                                                    </div><!--end col-->
                                            
                                            
                                                    <div class="col-12">
                                                        <div class="mb-3">
                                                            <label for="content" class="form-label">Nội dung</label>
                                                            <textarea class="form-control" placeholder="Nội dung bài viết" id="summernote" name="content" rows="4" required></textarea>
                                                        </div><!--end mb-3-->
                                                    </div><!--end col-->
                                            
                                                   
                                                    <div class="col-lg-12">
                                                        <div class="text-end">
                                                            <button type="submit" class="btn btn-primary">Thêm</button>
                                                        </div><!--end text-end-->
                                                    </div><!--end col-->
                                                </div><!--end row-->
                                            </form>
                                             
                                            <script>
                                                $(document).ready(function() {
                                                    $('#summernote').summernote({
                                                    placeholder: 'Nội dung bài viết',
                                                    tabsize: 2,
                                                    height: 100
                                                    });
                                                });
                                            </script>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                        </div><!-- end card header -->
                        
                        <div class="card-body">
                            <div class="live-preview">
                                <div class="table-responsive">
                                    <table id="postalll" class="table align-middle table-nowrap mb-0">
                                        <thead>
                                            <tr>
                                                <th scope="col">ID</th>
                                                <th scope="col">blog</th>
                                                <th scope="col">tiêu đề</th>
                                                <th scope="col">Hình ảnh</th>
                                                <th scope="col">Người tạo</th>
                                                <th scope="col">Hành động</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                        
                                            <?php $__currentLoopData = $Posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <th scope="row"><a href="#" class="fw-medium"><?php echo e($Post->id); ?></a></th>
                                                <td style="max-width: 150px; white-space: normal; overflow: hidden; text-overflow: ellipsis;"><?php echo e($Post->blog->name ?? "Danh mục đã bị xóa"); ?></td>
                                                <td style="max-width: 150px; white-space: normal; overflow: hidden; text-overflow: ellipsis;"><?php echo e($Post->title); ?></td>
                                                <td style="max-width: 100px; height: 90px; white-space: normal; overflow: hidden; text-overflow: ellipsis;">
                                                    <img src="<?php echo e($Post->image); ?>" alt="Post Image" style="max-width: 70%; height: auto;">
                                                </td>
                                                

                                                
                                                
                                                <td style="max-width: 150px; white-space: normal; overflow: hidden; text-overflow: ellipsis;"><?php echo e($Post->user->fullname); ?></td>
                                                <td>
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#editModal-<?php echo e($Post->id); ?>">
                                                        <button type="button" class="btn btn-primary" title="Chỉnh sửa">
                                                            <i class="ri-edit-line align-middle"></i>
                                                        </button>
                                                    </a>
                                                
                                                    <!-- Modal Chỉnh sửa -->
                                                    <div class="modal fade" id="editModal-<?php echo e($Post->id); ?>" tabindex="-1" aria-labelledby="editModalLabel-<?php echo e($Post->id); ?>" aria-hidden="true">
                                                        <div class="modal-dialog modal-xl">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="editModalLabel-<?php echo e($Post->id); ?>">Chỉnh sửa Post</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form action="<?php echo e(route('post.update', ['id' => $Post->id, 'tab' => 1, 'token' => auth()->user()->refesh_token])); ?>" method="POST" enctype="multipart/form-data">
                                                                        <?php echo csrf_field(); ?>
                                                                        <?php echo method_field('PUT'); ?>
                                                                        <div class="mb-3">
                                                                            <label for="blog_id-<?php echo e($Post->id); ?>" class="form-label">Chọn Blog</label>
                                                                            <select name="blog_id" id="blog_id-<?php echo e($Post->id); ?>" class="form-select" required>
                                                                                <option value="<?php echo e($blog->id); ?>"><?php echo e($blog->name); ?></option>
                                                                                <?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                    <option value="<?php echo e($blog->id); ?>" <?php echo e((int)$Post->blog_id === (int)$blog->id ? 'selected' : ''); ?>>
                                                                                        <?php echo e($blog->name); ?>

                                                                                    </option>
                                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                            </select>
                                                                                
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label for="title-<?php echo e($Post->id); ?>" class="form-label">Tiêu đề</label>
                                                                            <input type="text" name="title" id="title-<?php echo e($Post->id); ?>" class="form-control" value="<?php echo e($Post->title); ?>" required>
                                                                        </div>                                             
                                                                        <div class="mb-3">
                                                                            <label class="form-label">Ảnh hiện tại:</label>
                                                                            <div>
                                                                                <img  src="<?php echo e($Post->image); ?>" alt="Ảnh hiện tại" style="max-width: 100px; height: 100px;">
                                                                            </div>
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label for="image-<?php echo e($Post->id); ?>" class="form-label">Cập nhật ảnh mới (tùy chọn)</label>
                                                                            <!-- <input type="file" name="image" id="image-<?php echo e($Post->id); ?>" class="form-control" accept="image/*"> -->
                                                                            <div class="file-upload">
                                                                                <input type="file" name="image" id="image-<?php echo e($Post->id); ?>" class="form-control" accept="image/*" hidden>
                                                                                <label for="image-<?php echo e($Post->id); ?>" class="file-label">Chọn file</label>
                                                                                <span class="file-name">Chưa có file nào</span>
                                                                                <style>
                                                                                    .file-upload {
                                                                                        display: flex;
                                                                                        align-items: center;
                                                                                        gap: 10px;
                                                                                        font-family: Arial, sans-serif;
                                                                                    }

                                                                                    .file-label {
                                                                                        background-color: #007bff;
                                                                                        color: white;
                                                                                        padding: 5px 10px;
                                                                                        border-radius: 5px;
                                                                                        cursor: pointer;
                                                                                        text-align: center;
                                                                                    }

                                                                                    .file-label:hover {
                                                                                        background-color: #0056b3;
                                                                                    }

                                                                                    .file-name {
                                                                                        font-size: 14px;
                                                                                        color: #555;
                                                                                        font-style: italic;
                                                                                    }
                                                                                </style>
                                                                                
                                                                                <script>
                                                                                    document.addEventListener("DOMContentLoaded", () => {
                                                                                        document.querySelectorAll('.file-upload').forEach(uploadDiv => {
                                                                                            const fileInput = uploadDiv.querySelector('input[type="file"]');
                                                                                            const fileName = uploadDiv.querySelector('.file-name');

                                                                                            fileInput.addEventListener("change", () => {
                                                                                                if (fileInput.files.length > 0) {
                                                                                                    // console.log(fileInput.files[0].name);
                                                                                                    
                                                                                                    fileName.textContent = fileInput.files[0].name; // Hiển thị tên file
                                                                                                } else {
                                                                                                    fileName.textContent = "Chưa có file nào"; // Nếu không chọn file
                                                                                                }
                                                                                            });
                                                                                        });
                                                                                    });
                                                                                </script>
                                                                                
                                                                            </div>
                                                                        </div>
                                                
                                                                        <div class="mb-3">
                                                                            <label for="content-<?php echo e($Post->id); ?>" class="form-label">Nội dung:</label>
                                                                            <textarea name="content" id="summernote<?php echo e($Post->id); ?>" class="form-control" rows="4" required><?php echo e($Post->content); ?></textarea>
                                                                        </div>
                                                
                                                
                                                                        <input type="hidden" name="update_by" value="<?php echo e(auth()->user()->id); ?>">
                                                                        <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
                                                                    </form>
                                                                    <script>
                                                                        $(document).ready(function() {
                                                                            $('#summernote<?php echo e($Post->id); ?>').summernote({
                                                                                placeholder: 'Nội dung bài viết',
                                                                                tabsize: 2,
                                                                                height: 100
                                                                            });
                                                                        });
                                                                    </script>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                
                                                    <!-- Delete form -->
                                                    <form action="<?php echo e(route('post.destroy', ['token' => auth()->user()->refesh_token, 'id' => $Post->id, 'tab' => 1])); ?>" method="POST" style="display: inline;">
                                                        <?php echo csrf_field(); ?>
                                                        <?php echo method_field('DELETE'); ?>                                                       
                                                            <button type="submit" class="btn btn-danger" title="Xóa"  onclick="return confirm('Bạn có chắc chắn muốn xóa post này?');">
                                                                <i class="ri-delete-bin-line align-middle"></i>
                                                        </button>
                                                    </form>
                                                    <!-- Button to open blog details modal -->
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#blogDetailsModal-<?php echo e($Post->id); ?>">
                                                        <button type="button" class="btn btn-primary" title="Chi tiết bài viết">
                                                            <i class="ri-eye-line align-middle"></i> 
                                                        </button>
                                                    </a>

                                                    <!-- Modal Chi tiết bài viết -->
                                                    <div class="modal fade" id="blogDetailsModal-<?php echo e($Post->id); ?>" tabindex="-1" aria-labelledby="blogDetailsModalLabel-<?php echo e($Post->id); ?>" aria-hidden="true">
                                                        <div class="modal-dialog modal-xl">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="blogDetailsModalLabel-<?php echo e($Post->id); ?>">Chi tiết Bài viết</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body" style="
                                                                word-wrap: break-word; 
                                                                overflow-wrap: break-word; 
                                                                white-space: pre-wrap; 
                                                                max-height: 900px; 
                                                                overflow-y: auto; 
                                                                text-align: justify;
                                                            ">
                                                                
                                                                <?php echo $Post->content; ?>

                                                            </div>
                                                            
                                                            
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <script>
                                                        $(document).ready(function() {
                                                            $('#summernote2<?php echo e($Post->id); ?>').summernote({
                                                                placeholder: 'Nội dung bài viết',
                                                                tabsize: 2,
                                                                height: 300,
                                                                width:950,
                                                                lineHeights: ['0.8', '1.2', '1.5', '1.8', '2.0', '2.5'] // Dòng tự động xuống hàng
                                                            });
                                                        });
                                                    </script>
                                                    
                                                </td>
                                                
                                                
                                                
                                            </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                        
                                    </table>
                                   
        
                                </div>
                            </div>
                            <div class="mt-3">
                                <script>
                                    new DataTable('#postalll', {
                                        language: {   
                                            lengthMenu: "Hiển thị _MENU_ bài viết",
                                                search: "Tìm kiếm:",
                                                sEmptyTable: "Không có dữ liệu trong bảng",
                                                sProcessing: "Đang xử lý...",
                                                sLengthMenu: "Hiển thị _MENU_ mục",
                                                sZeroRecords: "Không tìm thấy dòng nào phù hợp",
                                                sInfo: "Hiển thị _START_ đến _END_ của _TOTAL_ mục",
                                                sInfoEmpty: "Hiển thị 0 đến 0 của 0 mục",
                                                sInfoFiltered: "(lọc từ _MAX_ mục)",
                                        },
                                       
                                    });
                                </script>
                                
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
                            <h4 class="card-title mb-0 flex-grow-1">Tất cả bài viết</h4>
                        </div><!-- end card header -->
                        
                        <div class="card-body">
                            <div class="live-preview">
                                <div class="table-responsive">
                                    <table id="postallldelete" class="table align-middle table-nowrap mb-0">
                                        <thead>
                                            <tr>
                                                <th scope="col">ID</th>
                                                <th scope="col">blog</th>
                                                <th scope="col">Hình ảnh</th>
                                                <th scope="col">tiêu đề</th>
                                                <th scope="col">nội dung</th>
                                                <th scope="col">Người tạo</th>
                                                <th scope="col">Hành động</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                        
                                            <?php $__currentLoopData = $deletedPost; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                
                                                <th scope="row"><a href="#" class="fw-medium"><?php echo e($Post->id); ?></a></th>
                                                <td style="max-width: 150px; white-space: normal; overflow: hidden; text-overflow: ellipsis;"><?php echo e($Post->blog_id); ?></td>
                                                <td style="max-width: 100px; height: 90px; white-space: normal; overflow: hidden; text-overflow: ellipsis;">
                                                    <img src="<?php echo e($Post->image); ?>" alt="Post Image" style="max-width: 70%; height: auto;">
                                                </td>                                                <td style="max-width: 150px; white-space: normal; overflow: hidden; text-overflow: ellipsis;"><?php echo e($Post->title); ?></td>
                                                <td style="max-width: 200px; white-space: normal; overflow: hidden; text-overflow: ellipsis;">
                                                    <?php echo e(\Illuminate\Support\Str::limit($Post->content, 150, '...')); ?>

                                                </td>
                                                <td style="max-width: 150px; white-space: normal; overflow: hidden; text-overflow: ellipsis;"><?php echo e($Post->user->fullname); ?></td>
                                                <td>
                                                    <form action="<?php echo e(route('post.restore',[
                                                                                                'token' => auth()->user()->refesh_token,
                                                                                                'id' => $Post->id,
                                                                                                'tab'=>2,
                                                                                                ])); ?>" method="POST" style="display: inline;">
                                                        <?php echo csrf_field(); ?>
                                                        <button type="submit" class="btn btn-info"
                                                                    title="Khôi phục"
                                                                    onclick="return confirm('Bạn có chắc chắn muốn khôi phục bài viết này?');">
                                                                    <i class="ri-refresh-line align-middle"></i>
                                                                </button>
                                                    </form>
                                                </td>
                                                
                                                
                                            </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                        
                                    </table>
                                   
        
                                </div>
                            </div>
                            <div class="mt-3">
                                <script>
                                    new DataTable('#postallldelete', {
                                        language: {   
                                            lengthMenu: "Hiển thị _MENU_ Doanh mục bài viết",
                                            search: "Tìm kiếm:"
                                        },
                                       
                                    });
                                </script>
                                </div>
                        </div><!-- end card-body -->
                    </div><!-- end card -->
                </div>
            </div>
          </div>
      
    </div>
   </div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\vnshop.top\resources\views/blogs/posts.blade.php ENDPATH**/ ?>