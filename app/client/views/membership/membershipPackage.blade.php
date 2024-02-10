@extends('layout.main')
@section('content')
<section class="bg-600">
    <div class="container">
      <div class="row">
        <div class="col">
          <h6 class="font-sans-serif text-primary fw-bold">Kế hoạch</h6>
          <h1 class="mb-6">Nhận ngay mức giá ưu đãi</h1>
        </div>
        <div class="col">
          <div class="d-flex justify-content-end">
            <label class="form-check-label me-2" for="customSwitch1">Monthly</label>
            <div class="form-check form-switch">
              <input class="form-check-input" id="customSwitch1" type="checkbox" checked="checked" />
              <label class="form-check-label align-top" for="customSwitch1">Yearly</label>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
          <div class="card mb-5 mb-md-0 h-100">
            <div class="text-center mb-5"><span class="badge bg-black fw-normal text-uppercase bg-secondary">vip member</span></div>
            <div class="card-body px-4 py-6 py-md-5 py-lg-6">
              <div class="d-flex justify-content-start text-secondary"><span class="display-3 fw-medium">200.000</span><span class="display-4 fw-medium">VNĐ</span></div>
              <p class="text-muted mb-2 my-md-3">Giới hạn tư nhân là phổ biến nhất</p>
              <hr class="border border-1" />
              <ul class="list-unstyled">
                <li class="mb-3"><i class="fas fa-check text-info me-2"></i>Tham gia miễn phí tối đa 10 khóa học mỗi tháng</li>
                <li class="mb-3"><i class="fas fa-check text-info me-2"></i>Thảo luận về khóa học</li>
                <li class="mb-3"><i class="fas fa-check text-info me-2"></i>Xem ngoại tuyến</li>
                <li class="mb-3"><i class="fas fa-check text-info me-2"></i>Chứng chỉ sau khi hoàn thành</li>
              </ul>
              <div class="d-grid"> <a class="btn btn-lg btn-primary" href="#!">Mua ngay</a></div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card mb-5 mb-md-0 h-100">
            <div class="text-center mb-5"><span class="badge bg-black fw-normal text-uppercase bg-info">gold member</span></div>
            <div class="card-body px-4 py-6 py-md-5 py-lg-6">
              <div class="d-flex justify-content-start text-secondary"><span class="display-3 fw-medium">500.000</span><span class="display-4 fw-medium">VNĐ</span></div>
              <p class="text-muted mb-2 my-md-3">Giới hạn tư nhân là phổ biến nhất</p>
              <hr class="border border-1" />
              <ul class="list-unstyled">
                <li class="mb-3"><i class="fas fa-check text-info me-2"></i>Tham gia miễn phí 25 khóa học mỗi tháng</li>
                <li class="mb-3"><i class="fas fa-check text-info me-2"></i>Thảo luận về khóa học</li>
                <li class="mb-3"><i class="fas fa-check text-info me-2"></i>Chứng chỉ sau khi hoàn thành</li>
                <li class="mb-3"><i class="fas fa-check text-info me-2"></i>Xem ngoại tuyến</li>
                <li class="mb-3"><i class="fas fa-check text-info me-2"></i> Phiên riêng tư</li>
              </ul>
              <div class="d-grid"><a class="btn btn-lg btn-secondary" href="#!">Mua ngay</a></div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card mb-5 mb-md-0 h-100">
            <div class="text-center mb-5"><span class="badge bg-black fw-normal text-uppercase bg-danger">unlimited member</span></div>
            <div class="card-body px-4 py-6 py-md-5 py-lg-6">
              <div class="d-flex justify-content-start text-secondary"><span class="display-3 fw-medium">2.500.000</span><span class="display-4 fw-medium">VNĐ</span></div>
              <p class="text-muted mb-2 my-md-3">Giới hạn tư nhân là phổ biến nhất</p>
              <hr class="border border-1" />
              <ul class="list-unstyled">
                <li class="mb-3"><i class="fas fa-check text-info me-2"></i>Tham gia không giới hạn số lượng khóa học</li>
                <li class="mb-3"><i class="fas fa-check text-info me-2"></i>Thảo luận về khóa học</li>
                <li class="mb-3"><i class="fas fa-check text-info me-2"></i>Chứng chỉ sau khi hoàn thành</li>
                <li class="mb-3"><i class="fas fa-check text-info me-2"></i> Hỗ trợ từ giảng viên trong trình học</li>
                <li class="mb-3"><i class="fas fa-check text-info me-2"></i>Truy cập vào nội dung đặc biệt</li>
                <li class="mb-3"><i class="fas fa-check text-info me-2"></i>Xem ngoại tuyến</li>
                <li class="mb-3"><i class="fas fa-check text-info me-2"></i> Phiên riêng tư</li>
                <li class="mb-3"><i class="fas fa-check text-info me-2"></i>Ưu đãi khi sử dụng DUONGCOURSES</li>
              </ul>
              <div class="d-grid"> <a class="btn btn-lg btn-primary" href="#!">Mua ngay</a></div>
            </div>
          </div>
        </div>
      </div>
    </div><!-- end of .container-->
  </section>

  @endsection