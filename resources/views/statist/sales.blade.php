@extends('index')
@section('title', 'Tổng quan')
@section('link')
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" />
  
  <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
@endsection
@section('main')


<div class="container-fluid">
    <div class="row">
        <h5>Thống kê lượt bán ra và lượt trả hàng trong Tháng {{ \Carbon\Carbon::now()->format('m') }}</h5>
        <div class="col">
            <div class="h-100">
                <div class="row">
                    <div class="col-xl-3 col-md-6">
                        <!-- card -->
                        <div class="card card-animate">
                            <div class="card-body">
                                <div
                                    class="d-flex align-items-center"
                                >
                                    <div
                                        class="flex-grow-1 overflow-hidden"
                                    >
                                        <p
                                            class="text-uppercase fw-medium text-muted text-truncate mb-0"
                                        >
                                            Số đơn hàng bán ra trong tháng
                                        </p>
                                    </div>
                                </div>
                                <div
                                    class="d-flex align-items-end justify-content-between mt-4"
                                >
                                    <div>
                                        <h4
                                            class="fs-22 fw-semibold ff-secondary mb-4"
                                        >
                                            <span
                                                class="counter-value"
                                                data-target="{{$TongSoLuongBanRa ?? 0}}"
                                                >0</span
                                            >
                                        </h4>
                                        <a
                                            href="#"
                                            class="text-decoration-underline"
                                            >Số đơn hàng bán ra</a
                                        >
                                    </div>
                                    <div
                                        class="avatar-sm flex-shrink-0"
                                    >
                                        <span
                                            class="avatar-title bg-success-subtle rounded fs-3"
                                        >
                                            <i
                                                class="ri-store-2-line"
                                            ></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <!-- end card body -->
                        </div>
                        <!-- end card -->
                    </div>
                    <!-- end col -->
                    <div class="col-xl-3 col-md-6">
                        <!-- card -->
                        <div class="card card-animate">
                            <div class="card-body">
                                <div
                                    class="d-flex align-items-center"
                                >
                                    <div
                                        class="flex-grow-1 overflow-hidden"
                                    >
                                        <p
                                            class="text-uppercase fw-medium text-muted text-truncate mb-0"
                                        >
                                            Số đơn hàng đang được giao
                                        </p>
                                    </div>
                                </div>
                                <div
                                    class="d-flex align-items-end justify-content-between mt-4"
                                >
                                    <div>
                                        <h4
                                            class="fs-22 fw-semibold ff-secondary mb-4"
                                        >
                                            <span
                                                class="counter-value"
                                                data-target="{{$DangGiao ?? 0}}"
                                                >0</span
                                            >
                                        </h4>
                                        <a
                                            href="#"
                                            class="text-decoration-underline"
                                            >Số đơn hàng đang được giao</a
                                        >
                                    </div>
                                    <div
                                        class="avatar-sm flex-shrink-0"
                                    >
                                        <span
                                            class="avatar-title bg-info-subtle rounded fs-3"
                                        >
                                            <i
                                                class="ri-archive-fill"
                                            ></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <!-- end card body -->
                        </div>
                        <!-- end card -->
                    </div>
                    <!-- end col -->
                    <div class="col-xl-3 col-md-6">
                        <!-- card -->
                        <div class="card card-animate">
                            <div class="card-body">
                                <div
                                    class="d-flex align-items-center"
                                >
                                    <div
                                        class="flex-grow-1 overflow-hidden"
                                    >
                                        <p
                                            class="text-uppercase fw-medium text-muted text-truncate mb-0"
                                        >
                                        Số đơn hàng đổi trả
                                        </p>
                                    </div>
                                </div>
                                <div
                                    class="d-flex align-items-end justify-content-between mt-4"
                                >
                                    <div>
                                        <h4
                                            class="fs-22 fw-semibold ff-secondary mb-4"
                                        >
                                        <span >
                                        {{ $DoiTra ?? 0}}
                                        </span>
                                        </h4>
                                        <a
                                            href="#"
                                            class="text-decoration-underline"
                                            >Số đơn hàng đổi trả</a
                                        >
                                    </div>
                                    <div
                                        class="avatar-sm flex-shrink-0"
                                    >
                                        <span
                                            class="avatar-title bg-secondary-subtle rounded fs-3"
                                        >
                                            <i
                                                class="ri-refund-2-fill"
                                            ></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <!-- end card body -->
                        </div>
                        <!-- end card -->
                    </div>
                    <!-- end col -->
                    <div class="col-xl-3 col-md-6">
                        <!-- card -->
                        <div class="card card-animate">
                            <div class="card-body">
                                <div
                                    class="d-flex align-items-center"
                                >
                                    <div
                                        class="flex-grow-1 overflow-hidden"
                                    >
                                        <p
                                            class="text-uppercase fw-medium text-muted text-truncate mb-0"
                                        >
                                        Số đơn hàng bị hủy
                                        </p>
                                    </div> 
                                </div>
                                <div
                                    class="d-flex align-items-end justify-content-between mt-4"
                                >
                                    <div>
                                        <h4
                                            class="fs-22 fw-semibold ff-secondary mb-4"
                                        >
                                        <span >
                                        {{$Huy ?? 0}}
                                        </span>
                                        </h4>
                                        <a
                                            href="#"
                                            class="text-decoration-underline"
                                            >Số đơn hàng bị hủy</a
                                        >
                                    </div>
                                    <div
                                        class="avatar-sm flex-shrink-0"
                                    >
                                        <span
                                            class="avatar-title bg-secondary-subtle rounded fs-3"
                                        >
                                            <i
                                                class="ri-refund-2-fill"
                                            ></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <!-- end card body -->
                        </div>
                        <!-- end card -->
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row-->
                <div class="row">
                    <div class="col-xl-3 col-md-6">
                        <!-- card -->
                        <div class="card card-animate">
                            <div class="card-body">
                                <div
                                    class="d-flex align-items-center"
                                >
                                    <div
                                        class="flex-grow-1 overflow-hidden"
                                    >
                                        <p
                                            class="text-uppercase fw-medium text-muted text-truncate mb-0"
                                        >
                                            Số đơn hàng đã hoàn thành
                                        </p>
                                    </div>
                                </div>
                                <div
                                    class="d-flex align-items-end justify-content-between mt-4"
                                >
                                    <div>
                                        <h4
                                            class="fs-22 fw-semibold ff-secondary mb-4"
                                        >
                                            <span
                                                class="counter-value"
                                                data-target="{{$HoanThanh ?? 0}}"
                                                >0</span
                                            >
                                        </h4>
                                        <a
                                            href="#"
                                            class="text-decoration-underline"
                                            >Đơn hàng đã giao hoàn thành</a
                                        >
                                    </div>
                                    <div
                                        class="avatar-sm flex-shrink-0"
                                    >
                                        <span
                                            class="avatar-title bg-success-subtle rounded fs-3"
                                        >
                                            <i
                                                class="ri-store-2-line"
                                            ></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <!-- end card body -->
                        </div>
                        <!-- end card -->
                    </div>
                    <!-- end col -->
                    <div class="col-xl-3 col-md-6">
                        <!-- card -->
                        <div class="card card-animate">
                            <div class="card-body">
                                <div
                                    class="d-flex align-items-center"
                                >
                                    <div
                                        class="flex-grow-1 overflow-hidden"
                                    >
                                        <p
                                            class="text-uppercase fw-medium text-muted text-truncate mb-0"
                                        >
                                            Số đơn giao thất bại
                                        </p>
                                    </div> 
                                </div>
                                <div
                                    class="d-flex align-items-end justify-content-between mt-4"
                                >
                                    <div>
                                        <h4
                                            class="fs-22 fw-semibold ff-secondary mb-4"
                                        >
                                            <span
                                                class="counter-value"
                                                data-target="{{$ThatBai ?? 0}}"
                                                >0</span
                                            >
                                        </h4>
                                        <a
                                            href="#"
                                            class="text-decoration-underline"
                                            >Số đơn giao thất bại</a
                                        >
                                    </div>
                                    <div
                                        class="avatar-sm flex-shrink-0"
                                    >
                                        <span
                                            class="avatar-title bg-info-subtle rounded fs-3"
                                        >
                                            <i
                                                class="ri-archive-fill"
                                            ></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <!-- end card body -->
                        </div>
                        <!-- end card -->
                    </div>
                    <!-- end col -->
                    <div class="col-xl-3 col-md-6">
                        <!-- card -->
                        <div class="card card-animate">
                            <div class="card-body">
                                <div
                                    class="d-flex align-items-center"
                                >
                                    <div
                                        class="flex-grow-1 overflow-hidden"
                                    >
                                        <p
                                            class="text-uppercase fw-medium text-muted text-truncate mb-0"
                                        >
                                        Số đơn hàng đang chờ duyệt
                                        </p>
                                    </div> 
                                </div>
                                <div
                                    class="d-flex align-items-end justify-content-between mt-4"
                                >
                                    <div>
                                        <h4
                                            class="fs-22 fw-semibold ff-secondary mb-4"
                                        >
                                        <span >
                                        {{ $ChoDuyet ?? 0}}
                                        </span>
                                        </h4>
                                        <a
                                            href="#"
                                            class="text-decoration-underline"
                                            >Số đơn hàng đang chờ duyệt</a
                                        >
                                    </div>
                                    <div
                                        class="avatar-sm flex-shrink-0"
                                    >
                                        <span
                                            class="avatar-title bg-secondary-subtle rounded fs-3"
                                        >
                                            <i
                                                class="ri-refund-2-fill"
                                            ></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <!-- end card body -->
                        </div>
                        <!-- end card -->
                    </div>
                    <!-- end col -->
                    <div class="col-xl-3 col-md-6">
                        <!-- card -->
                        <div class="card card-animate">
                            <div class="card-body">
                                <div
                                    class="d-flex align-items-center"
                                >
                                    <div
                                        class="flex-grow-1 overflow-hidden"
                                    >
                                        <p
                                            class="text-uppercase fw-medium text-muted text-truncate mb-0"
                                        >
                                        Số đơn hàng chưa thanh toán
                                        </p>
                                    </div> 
                                </div>
                                <div
                                    class="d-flex align-items-end justify-content-between mt-4"
                                >
                                    <div>
                                        <h4
                                            class="fs-22 fw-semibold ff-secondary mb-4"
                                        >
                                        <span >
                                        {{ $ChuaThanhToan ?? 0}}
                                        </span>
                                        </h4>
                                        <a
                                            href="#"
                                            class="text-decoration-underline"
                                            >Số đơn hàng chưa thanh toán</a
                                        >
                                    </div>
                                    <div
                                        class="avatar-sm flex-shrink-0"
                                    >
                                        <span
                                            class="avatar-title bg-secondary-subtle rounded fs-3"
                                        >
                                            <i
                                                class="ri-refund-2-fill"
                                            ></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <!-- end card body -->
                        </div>
                        <!-- end card -->
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row-->
            </div>
            <!-- end .h-100-->
        </div>
        <!-- end col -->
    </div>
    <div class="row">  
        <div class="col-xl-9">
            <div class="card">
            <h5 class="m-3">Thống kê lượt bán </h5>
                <div class="card-body">
                <div class="row"  style="float: right;">
                    <div class="dropdown card-header-dropdown">
                        <a class="text-reset dropdown-btn" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="text-muted" id="dropdownDisplay">
                                Tháng {{ \Carbon\Carbon::now()->format('m') }}
                                <i class="mdi mdi-chevron-down ms-1"></i>
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a class="dropdown-item" href="#" onclick="updateDropdown('Tháng', {{ \Carbon\Carbon::now()->format('m') }})">
                                Tháng {{ \Carbon\Carbon::now()->format('m') }}
                            </a>
                            <a class="dropdown-item" href="#" onclick="updateDropdown('Năm', {{ \Carbon\Carbon::now()->format('Y') }})">
                                Năm {{ \Carbon\Carbon::now()->format('Y') }}
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
                                    mychart.data.datasets[0].data = @json($luongtrahangJson ?? []);
                                    mychart.data.datasets[1].data = @json($luotmuaJson ?? []);
                                    mychart.data.datasets[2].data = @json($bihuyJson ?? []);
                                    mychart.data.datasets[3].data = @json($loiJson ?? []);
                                    mychart.update();
                                    break;
                                case 'Năm':
                                    let xValues3 = Array.from({ length: 12 }, (_, i) => i + 1);
                                    mychart.data.labels = xValues3;
                                    mychart.data.datasets[0].data = @json($luongtrahangThangJson ?? []);
                                    mychart.data.datasets[1].data = @json($luotmuaThangJson ?? []);
                                    mychart.data.datasets[2].data = @json($bihuyThangJson ?? []);
                                    mychart.data.datasets[3].data = @json($loiThangJson ?? []);
                                    mychart.update();
                                    break;
                                default:
                                    // Mảng rỗng cho trường hợp không xác định
                                    const currentYear = new Date().getFullYear();

                                    // Tạo mảng các năm gần đây (bao gồm năm hiện tại)
                                    let xValues4 = Array.from({ length: 5 }, (_, i) => currentYear - (4 - i));
                                    // xValues1 = ['2020', '2021', '2022', '2023', year];
                                    mychart.data.labels = xValues4;
                                    mychart.data.datasets[0].data = @json($luongtrahangCacNamJson ?? []);
                                    mychart.data.datasets[1].data = @json($luotmuaCacNamJson ?? []);
                                    mychart.data.datasets[2].data = @json($bihuyCacNamJson ?? []);
                                    mychart.data.datasets[3].data = @json($loiCacNamJson ?? []);
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
      
                        <li style="margin-right: 10px;">
                            <span style="display: inline-block; background-color: green; height: 10px; width: 10px;"></span>
                            Lượt mua
                        </li>
                        <li style="margin-right: 10px;">
                            <span style="display: inline-block; background-color: blue; height: 10px; width: 10px;"></span>
                            Lượt trả hàng
                        </li>
                        <li style="margin-right: 10px;">
                            <span style="display: inline-block; background-color: red; height: 10px; width: 10px;"></span>
                            Đơn bị hủy
                        </li>
                        <li style="margin-right: 10px;">
                            <span style="display: inline-block; background-color: yellow; height: 10px; width: 10px;"></span>
                            Đơn bị lỗi khi gửi
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
                        <th>Số lượn đơn</th>
                    </tr>
                </thead>
                <tbody>
                    
                    @if(isset($listShop))
                        @foreach($listShop as $shop)
                            <tr>
                                <td>{{$shop->shop_name}}</td>
                                <td>{{number_format($shop->luotban)}} đơn</td> 
                            </tr>
                        @endforeach
                    @endif 
                </tbody>
            </table>
            </table>
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Thống kê đơn hàng theo cửa hàng (Tất cả)</h4>
                    <div class="flex-shrink-0">
                        <div class="dropdown card-header-dropdown">
                            <a class="text-reset dropdown-btn" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="text-muted">Tháng {{ \Carbon\Carbon::now()->format('m') }}<i class="mdi mdi-chevron-down ms-1"></i></span>
                            </a>
                            <!-- <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="#">Today</a>
                                <a class="dropdown-item" href="#">Last Week</a>
                                <a class="dropdown-item" href="#">Last Month</a>
                                <a class="dropdown-item" href="#">Current Year</a>
                            </div> -->
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
                                @foreach($listShop as $shop)
                                <tr>
                                    <td>{{$shop->shop_name}}</td>
                                    <td>{{$shop->pick_up_address}} <br> {{$shop->ward}} <br> {{$shop->district}} <br> {{$shop->province}}</td>
                                    <td><img src="{{$shop->user[0]->avatar ?? 'assets/images/users/avatar-1.jpg'}}" alt="" class="avatar-xs rounded-circle me-2 material-shadow">
                                        <a href="#javascript: void(0);" class="text-body fw-medium">{{$shop->user[0]->fullname ?? null}}</a>
                                    </td>
                                    <td><span class="badge bg-success-subtle text-success p-2">Cửa hàng nổi bật</span></td>
                                    <td>
                                        <div class="text-nowrap">{{number_format($shop->luotban)}} đơn</div>
                                    </td>
                                </tr>
                                @endforeach
                                
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
    var red_data = @json($luongtrahangJson);
    var green_data = @json($luotmuaJson);
    var blue_data = @json($bihuyJson);
    var yellow_data = @json($loiJson);

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
      },
      { 
        data: yellow_data,
        borderColor: "yellow",
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
const xValues2 = @json($listCategoryJson ?? []);
const yValues =  @json($listCategorydoanhthu ?? []);
const barColors = @json($listCategoryColors ?? []);
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



@endsection





