@extends('user/layout')

@section('title','Trang cá nhân')

@section('header')
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('user/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('user/css/style.css') }}" rel="stylesheet">

@endsection
@section('web_content')
    <!-- Navbar Start -->
    <div class="container-fluid">
        <div class="row border-top px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a class="btn shadow-none d-flex align-items-center justify-content-between bg-primary text-white w-100" data-toggle="collapse" href="#navbar-vertical" style="height: 65px; margin-top: -1px; padding: 0 30px;">
                    <h6 class="m-0">Danh mục sản phẩm</h6>
                    <i class="fa fa-angle-down text-dark"></i>
                </a>
                @if($typeCategories != [])
                <nav class="collapse position-absolute navbar navbar-vertical navbar-light align-items-start p-0 border border-top-0 border-bottom-0 bg-light" id="navbar-vertical" style="width: calc(100% - 30px); z-index: 1;">
                    <div class="navbar-nav w-100 overflow-hidden" style="height: 410px">
                        @foreach($typeCategories as $key => $typeCategory)
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link" data-toggle="dropdown">{{$typeCategory->name}}<i class="fa fa-angle-down float-right mt-1"></i></a>
                            <div class="dropdown-menu position-absolute bg-secondary border-0 rounded-0 w-100 m-0">
                                @foreach ($categoriesByType[$typeCategory->id_type_category] as $category)
                                <a href="#" class="dropdown-item">{{$category->name}}</a>
                                @endforeach
                            </div>
                        </div>
                        @endforeach
                        @foreach ($getAllTypeCategories as $nonCategory)
                        <a href="" class="nav-item nav-link">{{$nonCategory->name}}</a>
                        @endforeach
                    </div>
                </nav>
                @endif
            </div>
            <div class="col-lg-9">
                @if (Session::has('userLogin') != null)
                <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
                  <a href="{{route('/')}}" class="text-decoration-none d-block d-lg-none">
                      <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">E</span>Gift Store</h1>
                  </a>
                  <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                      <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                      <div class="navbar-nav mr-auto py-0">
                          <a href="{{route('/')}}" class="nav-item nav-link">Trang chủ</a>
                          <a href="{{route('shop')}}" class="nav-item nav-link">Sản phẩm</a>
                          <a href="{{route('contact')}}" class="nav-item nav-link">Liên hệ</a>
                      </div>
                      <div class="navbar-nav ml-auto py-0">
                          <div class="nav-item dropdown">
                              <a class="nav-link" data-toggle="dropdown"><span>Xin chào, {{Auth::user()->fullname}} <i class="fa fa-angle-down"></i></span></a>
                              <div class="dropdown-menu position-absolute border-0 rounded-0 w-100 m-0">
                                  <a href="{{route('profile')}}" class="dropdown-item"><i class="fa fa-user"></i> Trang cá nhân</a>
                                  <a href="{{route('log-out')}}" class="dropdown-item"><i class="fas fa-sign-out-alt"></i> Đăng xuất</a>
                              </div>
                          </div>
                      </div>
                  </div>
                </nav>
                @else
                    <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
                        <a href="{{route('/')}}" class="text-decoration-none d-block d-lg-none">
                            <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">E</span>Gift Store</h1>
                        </a>
                        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                            <div class="navbar-nav mr-auto py-0">
                                <a href="{{route('/')}}" class="nav-item nav-link">Trang chủ</a>
                                <a href="{{route('shop')}}" class="nav-item nav-link">Cửa hàng</a>
                                <a href="{{route('contact')}}" class="nav-item nav-link">Liên hệ</a>
                            </div>
                            <div class="navbar-nav ml-auto py-0">
                                <a href="{{route('log-in')}}" class="nav-item nav-link">Đăng nhập</a>
                                <a href="{{route('log-in')}}" class="nav-item nav-link">Đăng ký</a>
                            </div>
                        </div>
                    </nav>
                @endif
            </div>
        </div>
    </div>
    <!-- Navbar End -->


    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Trang cá nhân</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="{{route('/')}}">Trang chủ</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Trang cá nhân</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Checkout Start -->
    <div class="container-fluid pt-5">
      <div class="row px-xl-5">
        <div class="col-lg-8">

          <div id="PersonalInfo" class="w3-container city w3-animate-opacity card" style="width: 800px; margin: auto;">
            <div style="width: 700px; margin: auto;">
              <hr style="width: 290px; height: 3px; background-color: #ff4d29; margin-left: 10px;">
              <h2 style="margin-left: 10px;">Thông tin cá nhân</h2><br>
              <style>
                #PersonalInfo div input{
                  border-radius: 5px;
                }
                #PersonalInfo div label{
                  padding-top: 10px;
                }
              </style>
              <div class="col-md-10 form-group d-flex">
                  <label class="col-md-3" style="color: #ff4d29;">Họ và tên:</label>
                  <input class="form-control" type="text" value="{{Auth::user()->fullname}}" readonly>
              </div>
              <div class="col-md-10 form-group d-flex justify-content-between">
                  <label class="col-md-3" style="color: #ff4d29;">Số điện thoại:</label>
                  <input class="form-control" type="text" value="{{Auth::user()->phone}}" readonly>
              </div>
              <div class="col-md-10 form-group d-flex justify-content-between">
                  <label class="col-md-3" style="color: #ff4d29;">Giới tính:</label>
                  <input class="form-control" type="text" value="{{Auth::user()->gender}}" readonly>
              </div>
              <div class="col-md-10 form-group d-flex justify-content-between">
                  <label class="col-md-3" style="color: #ff4d29;">Ngày sinh:</label>
                  <input class="form-control" type="text" value="{{Auth::user()->birthday}}" readonly>
              </div>
              <div class="col-md-10 form-group d-flex justify-content-between">
                  <label class="col-md-3" style="color: #ff4d29;">Địa chỉ:</label>
                  <input class="form-control" type="text" value="{{Auth::user()->address}}" readonly>
              </div>

              <div class="col-md-6" style="margin: auto; margin-top: 50px; margin-bottom: 50px;">
                <button class="btn btn-lg btn-block btn-primary font-weight-bold my-3 py-3">Cập nhật</button>
              </div>
            </div>
          </div>

          <div id="OrderHistory" class="w3-container city w3-animate-opacity card" style="display:none;">
            <hr style="width: 275px; height: 3px; background-color: #ff4d29; margin-left: 10px;">
            <h2 style="margin-left: 10px;">Lịch sử đơn hàng</h2>
            <div class="table-responsive">
              <table class="table table-striped b-t b-light">
                <thead>
                  <tr style="font-weight: bold;">
                    <td>Mã đơn hàng</td>
                    <td>Tên khách hàng</td>
                    <td>Mã giảm giá</td>
                    <td>PTTT</td>
                    <td>Tổng tiền</td>
                    <td>Ngày đặt</td>
                    <td>Trạng thái</td>
                    <td>Thao tác<td>
                  </tr>
                </thead>
                <tbody>
                  <td>BILL21316484648</td>
                  <td>Admin</td>
                  <td>0</td>
                  <td>Tiền mặt</td>
                  <td>500.000.000đ</td>
                  <td>12/27/2023</td>
                  <td style="font-weight: bold;">Chờ giao</td>
                  <td><a onclick="return confirm('Bạn có chắc chắn muốn hủy đơn hàng không?')" href="">Hủy đơn</a></td>
                </tbody>
              </table>
            </div>
          </div>

          <div id="ResetPassword" class="w3-container city w3-animate-opacity card" style="display:none; width: 600px; margin: auto;">
            <div style="width: 500px; margin: auto;">
              <hr style="width: 210px; height: 3px; background-color: #ff4d29; margin-left: 10px;">
              <h2 style="margin-left: 10px;">Đổi mật khẩu</h2>

              <div class="col-md-12 form-group d-flex justify-content-between">
                  <label class="col-md-6" style="padding-top: 10px; color: #ff4d29;">Mật khẩu cũ: </label>
                  <input class="form-control" type="password" placeholder="vd: ******" required>
              </div>
              <div class="col-md-12 form-group d-flex justify-content-between">
                    <label class="col-md-6" style="padding-top: 10px; color: #ff4d29;">Mật khẩu mới:</label>
                  <input class="form-control" type="password" placeholder="vd: ******" required>
              </div>
              <div class="col-md-12 form-group d-flex justify-content-between">
                    <label class="col-md-6" style="padding-top: 10px; color: #ff4d29;">Xác nhận mật khẩu mới:</label>
                  <input class="form-control" type="password" placeholder="vd: ******" required>
              </div>
              <div class="col-md-8" style="margin: auto; margin-top: 50px; margin-bottom: 50px;">
                <button class="btn btn-lg btn-block btn-primary font-weight-bold my-3 py-3">Cập nhật</button>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
            <div class="card border-secondary mb-5">
                <div class="card-body">
                  <div class="d-flex justify-content-between mt-2">
                    <a class="tablink" onclick="openLink(event, 'PersonalInfo')" title="Xem thông tin cá nhân">Thông tin cá nhân</a>
                  </div>
                  <div class="d-flex justify-content-between mt-2">
                    <a class="tablink" onclick="openLink(event, 'OrderHistory')" title="Lịch sử đơn hàng">Lịch sử đơn hàng</a>
                  </div>
                  <div class="d-flex justify-content-between mt-2">
                    <a class="tablink" onclick="openLink(event, 'ResetPassword')" title="Đổi mật khẩu">Đổi mật khẩu</a>
                  </div>
                  <div class="d-flex justify-content-between mt-2">
                    <a class="tablink" href="{{route('log-out')}}" title="Đăng xuất">Đăng xuất <i class="fas fa-sign-out-alt"></i></a>
                  </div>
                </div>
            </div>
        </div>
      </div>
    </div>
    <!-- Checkout End -->
@endsection

<!-- JavaScript -->
@section('java-script')
<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('user/lib/easing/easing.min.js') }}"></script>
<script src="{{ asset('user/lib/owlcarousel/owl.carousel.min.js') }}"></script>

<!-- Contact Javascript File -->
<script src="{{ asset('user/mail/jqBootstrapValidation.min.js') }}"></script>
<script src="{{ asset('user/mail/contact.js') }}"></script>

<!-- Template Javascript -->
<script src="{{ asset('user/js/main.js') }}"></script>

<script>
  function openLink(evt, animName) {
    var i, x, tablinks;
    x = document.getElementsByClassName("city");
    for (i = 0; i < x.length; i++) {
      x[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablink");
    for (i = 0; i < x.length; i++) {
      tablinks[i].className = tablinks[i].className.replace(" w3-red", "");
    }
    document.getElementById(animName).style.display = "block";
    evt.currentTarget.className += " w3-red";
  }
  </script>
@endsection