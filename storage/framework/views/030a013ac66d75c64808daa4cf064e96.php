<?php $__env->startSection('title', 'Tổng quan'); ?>
<?php $__env->startSection('link'); ?>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" />
  
  <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main'); ?>


<div class="container-fluid">

    <div class="row">
    <div style="display: flex; justify-content: space-between;">
        <h5>Quản lý doanh thu </h5>
        <h5 class="me-4">Top 10 cửa hàng theo doanh thu</h5>
    </div>   
        <div class="col-xl-9">
            <div class="card">
                <div class="card-body">
                <div class="row"  style="float: right;">
                    <div class="dropdown card-header-dropdown">
                        <a class="text-reset dropdown-btn" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="text-muted" id="dropdownDisplay">
                                Tháng <?php echo e(\Carbon\Carbon::now()->format('m')); ?>

                                <i class="mdi mdi-chevron-down ms-1"></i>
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a class="dropdown-item" href="#" onclick="updateDropdown('Tháng', <?php echo e(\Carbon\Carbon::now()->format('m')); ?>)">
                                Tháng <?php echo e(\Carbon\Carbon::now()->format('m')); ?>

                            </a>
                            <a class="dropdown-item" href="#" onclick="updateDropdown('Năm', <?php echo e(\Carbon\Carbon::now()->format('Y')); ?>)">
                                Năm <?php echo e(\Carbon\Carbon::now()->format('Y')); ?>

                            </a>
                            <a class="dropdown-item" href="#" onclick="updateDropdown('Các năm gần đây', '')">
                                Các năm gần đây
                            </a>
                        </div>
                    </div>

                    <script>
                        // Hàm để cập nhật nội dung hiển thị của dropdown
                        function updateDropdown(type, value) {
                            const displayElement = document.getElementById('dropdownDisplay');
                            displayElement.innerHTML = `${type} ${value || ''} <i class="mdi mdi-chevron-down ms-1"></i>`; 

                            const now = new Date();
                            const year = now.getFullYear(); // Năm hiện tại
                            const month = now.getMonth() + 1; // Tháng hiện tại (getMonth trả về giá trị từ 0-11)

                            // Hàm để lấy số ngày trong tháng
                            function getDaysInMonth(year, month) {
                                return new Date(year, month, 0).getDate(); // Lấy ngày cuối cùng của tháng
                            }
                            
                            switch (type) {
                                case 'Tháng': 
                                    // Lấy số ngày trong tháng hiện tại
                                    let end = getDaysInMonth(year, month)
                                    let xValues2 = Array.from({ length: end }, (_, i) => i + 1);
                                    mychart.data.labels = xValues2;
                                    mychart.data.datasets[2].data = <?php echo json_encode($doanhthuJson ?? [], 15, 512) ?>;
                                    mychart.update();
                                    break;
                                case 'Năm':
                                    // Lấy các tháng trong năm (1-12)
                                    let xValues3 = Array.from({ length: 12 }, (_, i) => i + 1);
                                    // xValues1 = []
                                    // for (let index = 0; index < 12; index++) {
                                    //     const element = array[index];
                                        
                                    // }
                                    mychart.data.labels = xValues3;
                                    mychart.data.datasets[2].data = <?php echo json_encode($doanhthunamJson ?? [], 15, 512) ?>;// Dataset 3
                                    mychart.update();
                                    break;
                                default:
                                    // Mảng rỗng cho trường hợp không xác định
                                    const currentYear = new Date().getFullYear();

                                    // Tạo mảng các năm gần đây (bao gồm năm hiện tại)
                                    let xValues4 = Array.from({ length: 5 }, (_, i) => currentYear - (4 - i));
                                    // xValues1 = ['2020', '2021', '2022', '2023', year];
                                    mychart.data.labels = xValues4;
                                    mychart.data.datasets[2].data =<?php echo json_encode($doanhthucacnamJson1 ?? [], 15, 512) ?>;// Dataset 3
                                    mychart.update();
                                    break;
                            }

                            // Log ra mảng xValues1 để kiểm tra
                            console.log('xValues1:', xValues1);
                        }
                    </script>

                </div>
                    <canvas id="myChart"   style="height: 100px !important";></canvas>
                </div><!-- end card-body -->
                <div class="card-footer">
                    <ul style="display: flex; list-style-type: none; padding: 0; margin: 0;">
                        <li>
                            <span style="display: inline-block; background-color: blue; height: 10px; width: 10px;"></span>
                            Doanh thu
                        </li>
                    </ul>
                </div>

            </div><!-- end card -->
        </div>
        <div class="col-xl-3">
       
            <table class="table table-striped table-hover">
                <thead class="table-success">
                    <tr>
                        <th>Cửa hàng</th>
                        <th>Doanh thu</th>
                    </tr>
                </thead>
                <tbody>
                    
                    <?php if(isset($listShop)): ?>
                        <?php $__currentLoopData = $listShop; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $shop): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($shop->shop_name); ?></td>
                                <td><?php echo e(number_format($shop->doanhthu)); ?> đ</td> 
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?> 
                </tbody>
            </table>
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Thống kê doanh thu theo cửa hàng (Tất cả)</h4>
                    <div class="flex-shrink-0">
                        <div class="dropdown card-header-dropdown">
                            <a class="text-reset dropdown-btn" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="text-muted">Tháng <?php echo e(\Carbon\Carbon::now()->format('m')); ?><i class="mdi mdi-chevron-down ms-1"></i></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="#">Today</a>
                                <a class="dropdown-item" href="#">Last Week</a>
                                <a class="dropdown-item" href="#">Last Month</a>
                                <a class="dropdown-item" href="#">Current Year</a>
                            </div>
                        </div>
                    </div>
                </div><!-- end card header -->

                <div class="card-body">
                    <div class="table-responsive table-card">
                    <table id="shop" class="display" style="width:100%">
                    <thead class="table-light">
                                <tr class="text-muted">
                                    <th scope="col">Tên cửa hàng</th>
                                    <th scope="col" style="width: 20%;">Địa chỉ</th>
                                    <th scope="col">Chủ cửa hàng</th>
                                    <th scope="col" style="width: 16%;">Trạng thái</th>
                                    <th scope="col" style="width: 12%;">Doanh thu</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $__currentLoopData = $listShop; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $shop): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($shop->shop_name); ?></td>
                                    <td><?php echo e($shop->pick_up_address); ?> <br> <?php echo e($shop->ward); ?> <br> <?php echo e($shop->district); ?> <br> <?php echo e($shop->province); ?></td>
                                    <td><img src="<?php echo e($shop->user[0]->avatar ?? 'assets/images/users/avatar-1.jpg'); ?>" alt="" class="avatar-xs rounded-circle me-2 material-shadow">
                                        <a href="#javascript: void(0);" class="text-body fw-medium"><?php echo e($shop->user[0]->fullname ?? null); ?></a>
                                    </td>
                                    <td><span class="badge bg-success-subtle text-success p-2">Cửa hàng nổi bật</span></td>
                                    <td>
                                        <div class="text-nowrap"><?php echo e(number_format($shop->doanhthu)); ?>vnđ</div>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                
                            </tbody><!-- end tbody -->
                    </table>
                    <script>
                        new DataTable('#shop');
                    </script>
                    </div><!-- end table responsive -->
                </div><!-- end card body -->
            </div><!-- end card -->
        </div><!-- end col -->

    </div><!-- end row -->
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>

<script>
    // Lấy số ngày trong tháng hiện tại
    const now = new Date();
    const year = now.getFullYear(); // Năm hiện tại
    const month = now.getMonth() + 1; // Tháng hiện tại (getMonth trả về giá trị từ 0-11)
    // Hàm để lấy số ngày trong tháng
    function getDaysInMonth(year, month) {
        return new Date(year, month, 0).getDate(); // Lấy ngày cuối cùng của tháng
    }
    const xValues1 = Array.from({ length: getDaysInMonth(year, month) }, (_, i) => i + 1);


    // Lấy dữ liệu từ PHP cho biểu đồ màu xanh
    var red_data = <?php echo json_encode($luongtrahangJson ?? [], 15, 512) ?>;
    var green_data = <?php echo json_encode($luotmuaJson ?? [], 15, 512) ?>;
    var blue_data = <?php echo json_encode($doanhthuJson ?? [], 15, 512) ?>;

    var mychart = new Chart("myChart", {
    type: "line",
    data: {
        labels: xValues1,
        datasets: [
        { 
            data: red_data,
            borderColor: "red",
            fill: false
        }, 
        { 
            data: green_data,
            borderColor: "green",
            fill: false
        },
        { 
            data: blue_data,
            borderColor: "blue",
            fill: false
        }
        ]
    },
    options: {
        legend: { display: false }
    }
    });
</script>

<script>
const xValues2 = <?php echo json_encode($listCategoryJson ?? [], 15, 512) ?>;
const yValues =  <?php echo json_encode($listCategorydoanhthu ?? [], 15, 512) ?>;
const barColors = <?php echo json_encode($listCategoryColors ?? [], 15, 512) ?>;
console.log( barColors);


new Chart("chart", {
  type: "pie",
  data: {
    labels: xValues2,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  }

});
</script>



<?php $__env->stopSection(); ?>






<?php echo $__env->make('index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\datn_1\resources\views/statist/revenue.blade.php ENDPATH**/ ?>