<?php $__env->startSection('title', 'List Store'); ?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" />
<script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
<?php $__env->startSection('main'); ?>
   <div class="container-fluid">
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Danh sách danh mục</h4>
                    <!-- Toggle Between Modals -->
                    <button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#firstmodal">Thêm danh mục</button>
                    <!-- First modal dialog -->
                    <div class="modal fade" id="firstmodal" aria-hidden="true" aria-labelledby="..." tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-body text-center p-5">
                                    <form id="addBlogForm" action="<?php echo e(route('create_category', ['token' => auth()->user()->refesh_token])); ?>" method="POST" enctype="multipart/form-data">
                                        <?php echo csrf_field(); ?>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="mb-3">
                                                    <label for="title" class="form-label">Tên doanh mục</label>
                                                    <input type="text" class="form-control" placeholder="Enter category title" name="title" required>
                                                </div>
                                            </div>
                                            
                                            <input type="hidden" name="back" value="1">
                                            
                                            <div class="col-6">
                                                <div class="mb-3">
                                                    <label for="index" class="form-label">Vị trí</label>
                                                    <input type="number" class="form-control" value="1" name="index" required>
                                                </div>
                                            </div>
                                    
                                            <div class="col-12">
                                                <div class="mb-3">
                                                    <label for="image" class="form-label">Hình ảnh</label>
                                                    <input type="file" class="form-control" placeholder="Enter image URL" name="image">
                                                </div>
                                            </div>
                                    
                                            <div class="col-6">
                                                <div class="mb-3">
                                                    <label for="status" class="form-label">Trạng thái</label>
                                                    <input type="number" class="form-control" value="1" name="status" required>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="mb-3">
                                                    <label for="parent_id2" class="form-label">Chọn danh mục cha</label>
                                                    <select name="parent_id2" id="parent_id2" class="form-control">
                                                        <option value="0">Không thuộc danh mục nào</option> 
                                                        <option value="0">Danh mục khác (không phân loại rõ ràng)</option>                                                  
                                                        <?php $__currentLoopData = $categoryTree; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                      
                                                            <option value="<?php echo e($category->id); ?>"><?php echo e($category->title); ?></option>
                                                            <?php if($category->children && $category->children->isNotEmpty()): ?>
                                                                <?php $__currentLoopData = $category->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <option value="<?php echo e($child->id); ?>"><?php echo e('-- ' . $child->title); ?></option>
                                                                    <?php if($child->children && $child->children->isNotEmpty()): ?>
                                                                        <?php $__currentLoopData = $child->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $grandchild): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                            <option value="<?php echo e($grandchild->id); ?>"><?php echo e('--- ' . $grandchild->title); ?></option>
                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                    <?php endif; ?>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            <?php endif; ?>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                    
                                                    
                                                    
                                                </div>
                                            </div>
                                    
                                            <div class="col-lg-12 mb-3">
                                                <label for="tax_id" class="form-label">Chọn thuế danh mục</label>
                                                <select name="tax_id" class="form-control js-example-templating">
                                                    <?php $__currentLoopData = $taxes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tax): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($tax->id); ?>"><?php echo e($tax->title); ?> | <?php echo e($tax->rate); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                            
                                            <div class="col-lg-12">
                                                <div class="text-end">
                                                    <button type="submit" class="btn btn-primary">Thêm</button>
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
                            <table id="cateall" class="table align-middle table-nowrap mb-0">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Tên danh mục</th>
                                        <th scope="col">Hình ảnh</th>
                                        <th scope="col">Danh mục con của</th>
                                        <th scope="col">Thuế</th>
                                        <th scope="col">Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                
                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <th scope="row"><a href="#" class="fw-medium"><?php echo e($category->id); ?></a></th>
                                        <td><?php echo e($category->title); ?></td>
                                        <td><img src="<?php echo e($category->image ?? 'assets/images/users/avatar-1.jpg'); ?>" alt="" class="avatar-xs rounded-circle me-2 material-shadow"></td>
                                        <td> 
                                             <?php if($category->parent_id == null || $category->parent_id == 0): ?>
                                                <option value="0" <?php echo e(old('parent_id', $category->parent_id) == 0 ? 'selected' : ''); ?>>Doanh mục cha</option>
                                            <?php else: ?>
                                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if($category->parent_id == $detail->id): ?>
                                                        <option value="<?php echo e($detail->id); ?>"><?php echo e($detail->title); ?></option>
                                                    <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
        
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                        <div class="col-lg-8">
                                            <select name="tax_id" class="form-control js-example-templating">
                                                <option>Danh Mục Chưa Có Thuế</option>
                                                <?php $__currentLoopData = $taxes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tax): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php
                                                        $selected = false;
                                                    ?>
                                                    <?php $__currentLoopData = $tax_category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php if($tc->category_id == $category->id && $tc->tax_id == $tax->id): ?>
                                                            <?php
                                                                $selected = true;
                                                            ?>
                                                        <?php endif; ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($tax->id); ?>" <?php echo e($selected ? 'selected' : ''); ?>><?php echo e($tax->title); ?> | <?php echo e($tax->rate); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                        </td>
                                        <td>
                                            <ul class="list-inline">
                                                <?php if($category->status == 2): ?>
                                                    <li class="list-inline-item">
                                                        <a 
                                                            href="<?php echo e(route('change_category', [
                                                                                                'token' => auth()->user()->refesh_token,
                                                                                                'id' => $category->id,
                                                                                                'status' => 1,
                                                                                                ])); ?>"
                                                        >
                                                            <button type="button" class="btn btn-warning waves-effect waves-light" title="Khóa">
                                                                <i class="ri-lock-line align-middle"></i>
                                                            </button>
                                                        </a>
                                                    </li>
                                                <?php elseif($category->status == 1): ?>
                                                    <li class="list-inline-item">
                                                    <a 
                                                        href="<?php echo e(route('change_category', [
                                                                                            'token' => auth()->user()->refesh_token,
                                                                                            'id' => $category->id,
                                                                                            'status' => 2,
                                                                                            ])); ?>"
                                                    >
                                                    <button type="button" class="btn btn-success" title="Bật">
                                                        <i class="ri-check-line align-middle"></i>
                                                    </button>
                                                       
                                                    </li>
                                                <?php endif; ?>
                                                <li class="list-inline-item">
                                                   <!-- Toggle Between Modals -->
                                                    <button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#firstmodal<?php echo e($category->id); ?>" title="Chỉnh sửa"><i class="ri-edit-line align-middle"></i></button>
                                                    <!-- First modal dialog -->
                                                    <div class="modal fade" id="firstmodal<?php echo e($category->id); ?>" aria-hidden="true" aria-labelledby="..." tabindex="-1">
                                                        <div class="modal-dialog modal-dialog-centered">
                                                            <div class="modal-content">
                                                                <div class="modal-body text-center p-5">
                                                                <form id="addBlogForm"
                                                                                    action="<?php echo e(route('update_category', [
                                                                                        'token' => auth()->user()->refesh_token,
                                                                                    ])); ?>"
                                                                                    method="POST" 
                                                                                    enctype="multipart/form-data">
                                                                    <?php echo csrf_field(); ?>
                                                                    <input type="hidden" name="_method" value="PUT">
                                                                    <input type="hidden" name="id" value="<?php echo e($category->id); ?>"> <!-- Thêm trường để gửi ID của danh mục -->
                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <div class="mb-3">
                                                                                <label for="titleInput" class="form-label">Tên doanh mục</label>
                                                                                <input name="title" type="text" class="form-control" value="<?php echo e($category->title); ?>" id="titleInput" required>
                                                                            </div>
                                                                        </div><!--end col-->            
                                                                        <input type="hidden" name="index" class="form-control" value="<?php echo e($category->index); ?>" id="indexInput" required>
                                                                        <div class="col-12">
                                                                            <div class="mb-3">
                                                                                <label for="imageInput" class="form-label">Hình ảnh</label>
                                                                                <input type="file" name="imageInput" class="form-control" placeholder="Enter image URL" id="imageInput">
                                                                            </div>
                                                                        </div><!--end col-->
                                                                        <input type="hidden" name="status" class="form-control" value="<?php echo e($category->status); ?>" id="statusInput" required>
                                                                        <div class="col-12">
                                                                            <div class="mb-3">
                                                                                <label for="parent_id" class="form-label">Chọn danh mục cha</label>
                                                                                <select name="parent_id" id="parent_id" class="form-control">
                                                                                        <?php if($category->parent_id == null || $category->parent_id == 0): ?>
                                                                                            <option value="0" <?php echo e(old('parent_id', $category->parent_id) == 0 ? 'selected' : ''); ?>>Doanh mục cha</option>
                                                                                        <?php else: ?>
                                                                                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                                <?php if($category->parent_id == $detail->id): ?>
                                                                                                    <option value="<?php echo e($detail->id); ?>"><?php echo e($detail->title); ?></option>
                                                                                                <?php endif; ?>
                                                                                            <!-- <option value="<?php echo e($category->parent_id); ?>">đây là danh mục chưa sửa</option> -->
                                                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                                                                                            
                                                                                        <?php endif; ?>
                                                                                    <?php $__currentLoopData = $categoryTree; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categori): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                        
                                                                                        <option value="<?php echo e($categori->id); ?>" <?php echo e(old('parent_id', $categori->parent_id) == $categori->id ? 'selected' : ''); ?>>
                                                                                            <?php echo e($categori->title); ?>

                                                                                        </option>
                                                                                        <?php if($categori->children && $categori->children->isNotEmpty()): ?>
                                                                                            <?php $__currentLoopData = $categori->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                                <option value="<?php echo e($child->id); ?>" <?php echo e(old('parent_id', $categori->parent_id) == $child->id ? 'selected' : ''); ?>>
                                                                                                    -- <?php echo e($child->title); ?>

                                                                                                </option>
                                                                                                <?php if($child->children && $child->children->isNotEmpty()): ?>
                                                                                                    <?php $__currentLoopData = $child->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $grandchild): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                                        <option value="<?php echo e($grandchild->id); ?>" <?php echo e(old('parent_id', $categori->parent_id) == $grandchild->id ? 'selected' : ''); ?>>
                                                                                                            --- <?php echo e($grandchild->title); ?>

                                                                                                        </option>
                                                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                                                <?php endif; ?>
                                                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                                        <?php endif; ?>
                                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                                </select>
                                                                            </div><!--end col-->
                                                                        </div><!--end row-->
                                                                        
                                                                        <div class="col-lg-12 mb-3">
                                                                            <label for="tax_id" class="form-label">Chọn thuế danh mục</label>
                                                                            <select id="tax_id" name="tax_id" class="form-control js-example-templating">
                                                                                <option>Chọn Thuế Danh Mục</option>
                                                                                <?php $__currentLoopData = $taxes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tax): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                    <?php
                                                                                        $selected = false;
                                                                                    ?>
                                                                                    <?php $__currentLoopData = $tax_category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                        <?php if($tc->category_id == $category->id && $tc->tax_id == $tax->id): ?>
                                                                                            <?php
                                                                                                $selected = true;
                                                                                            ?>
                                                                                        <?php endif; ?>
                                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                                    <option value="<?php echo e($tax->id); ?>" <?php echo e($selected ? 'selected' : ''); ?>><?php echo e($tax->title); ?> | <?php echo e($tax->rate); ?></option>
                                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                            </select>
                                                                        </div>
                                                                       
                                                                        
                                                                        <div class="col-lg-12">
                                                                            <div class="text-end">
                                                                                <button type="submit"  class="btn btn-primary">Cập nhật</button>
                                                                            </div>
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
                                                        href="<?php echo e(route('change_category', [
                                                                                            'token' => auth()->user()->refesh_token,
                                                                                            'id' => $category->id,
                                                                                            'status' => 5,
                                                                                            ])); ?>"
                                                >
                                                    <button type="button" class="btn btn-danger waves-effect waves-light" title="xóa"><i class="ri-delete-bin-line align-middle"></i></button>
                                                </a>
                                                </li>
                                            </ul>
                                        </td>
                                        
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                                
                            </table>
                            <div class="d-flex align-items-center justify-content-between">
                                <div>
                                    <script>
                                        new DataTable('#cateall', {
                                            language: {   
                                                lengthMenu: "Hiển thị _MENU_ Doanh mục bài viết",
                                                search: "Tìm kiếm:"
                                            },
                                           
                                        });
                                    </script>
                                    
                                </div>
                                <a
                                    href="<?php echo e(route('trash_category',['token' => auth()->user()->refesh_token])); ?>"
                                    class="nav-link text-primary"
                                    style="font-weight: bold;"
                                    data-key="t-ecommerce"
                                >
                                    Danh mục đã xóa
                                </a>
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
<?php echo $__env->make('index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\datn_1\resources\views/categories/list_category.blade.php ENDPATH**/ ?>