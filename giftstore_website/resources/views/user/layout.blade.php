<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Gift Store - @yield('title')</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">
    <!-- Favicon -->
    <link href="{{asset('upload/photo/logo-gift-store.png')}}" rel="shortcut icon" type="image/x-icon"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield('header')
</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid">
        <div class="row bg-secondary py-2 px-xl-5">
            <div class="col-lg-6 d-none d-lg-block">
                <div class="d-inline-flex align-items-center">
                    <a class="text-dark" href="">FAQs</a>
                    <span class="text-muted px-2">|</span>
                    <a class="text-dark" href="">Hỗ trợ</a>
                    <span class="text-muted px-2">|</span>
                    <a class="text-dark" href="">Tư vấn</a>
                </div>
            </div>
            {{-- <div class="col-lg-6 text-center text-lg-right">
                <div class="d-inline-flex align-items-center">
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-facebook-f">acebook</i>
                    </a>
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a class="text-dark pl-2" href="">
                        <i class="fab fa-youtube"></i>
                    </a>
                </div>
            </div> --}}
        </div>
        <div class="row align-items-center py-3 px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a href="{{route('/')}}" class="text-decoration-none">
                    <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">E</span>Gift Store</h1>
                </a>
            </div>
            <div class="col-lg-6 col-6 text-left">
                <form action="{{route('search')}}" method="GET">
                    <div class="input-group">
                        <input type="text" name="keyword" class="form-control" placeholder="Tìm sản phẩm">
                        <div class="input-group-append">
                            {{-- <span class="input-group-text bg-transparent text-primary">
                                <i class="fa fa-search"></i>
                            </span> --}}
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-3 col-6 text-right">
                {{-- <a href="" class="btn border">
                    <i class="fas fa-heart text-primary"></i>
                    <span class="badge">0</span>
                </a> --}}
                <a href="{{route('cart')}}" class="btn border">
                    <i class="fas fa-shopping-cart text-primary"></i>
                    @if ($cartCount > 0)
                    <span class="badge">{{$cartCount}}</span>
                    @else
                    <span class="badge">0</span>
                    @endif
                </a>
            </div>
        </div>
    </div>
    <!-- Topbar End -->

    @yield('web_content')

    <!-- Footer Start -->
    <div class="container-fluid bg-secondary text-dark mt-5 pt-5">
        <div class="row px-xl-5 pt-5">
            <div class="col-lg-4 col-md-12 mb-5 pr-3 pr-xl-5">
                <a href="{{route('/')}}" class="text-decoration-none">
                    <h1 class="mb-4 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border border-white px-3 mr-1">E</span>Gift Store</h1>
                </a>
                <p>Website bán quà lưu niệm</p>
                <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i>TP. Hồ Chí Minh</p>
                <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i>ngotuongbao123@gmail.com</p>
                <p class="mb-0"><i class="fa fa-phone-alt text-primary mr-3"></i>0944 146 985 - 0911 636 476</p>
            </div>
            <div class="col-lg-8 col-md-12">
                <div class="row">
                    <style>
                        div.row a {
                            text-decoration: none;
                        }
                    </style>
                    <div class="col-md-4 mb-5">
                        <h5 class="font-weight-bold text-dark mb-4">Về chúng tôi</h5>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-dark mb-2" href="{{route('/')}}"><i class="fa fa-angle-right mr-2"></i>Trang chủ</a>
                            <a class="text-dark mb-2" href="{{route('shop')}}"><i class="fa fa-angle-right mr-2"></i>Cửa hàng của chúng tôi</a>
                            <a class="text-dark mb-2" href="{{route('cart')}}"><i class="fa fa-angle-right mr-2"></i>Giỏ hàng</a>
                            {{-- <a class="text-dark mb-2" href="{{route('checkout')}}"><i class="fa fa-angle-right mr-2"></i>Thanh toán</a> --}}
                            <a class="text-dark" href="{{route('contact')}}"><i class="fa fa-angle-right mr-2"></i>Liên hệ</a>
                        </div>
                    </div>
                    <div class="col-md-4 mb-5">
                        <h5 class="font-weight-bold text-dark mb-4">Lý do chọn chúng tôi</h5>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-dark mb-2">Sản phẩm chất lượng</a>
                            <a class="text-dark mb-2">Miễn phí vận chuyển</a>
                            <a class="text-dark mb-2">Đổi trả trong vòng 14 ngày</a>
                            <a class="text-dark mb-2">Hỗ trợ khách hàng 24/7</a>
                        </div>
                    </div>
                    <div class="col-md-4 mb-5">
                        {{-- <h5 class="font-weight-bold text-dark mb-4">Nhắn tin cho chúng tôi</h5>
                        <form action="">
                            <div class="form-group">
                                <input type="text" class="form-control border-0 py-4" placeholder="Nhập tên của bạn" required="required" />
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control border-0 py-4" placeholder="Nhập Email" required="required" />
                            </div>
                            <div>
                                <button class="btn btn-primary btn-block border-0 py-3" type="submit">Gửi ngay</button>
                            </div>
                        </form> --}}
                        <h5 class="font-weight-bold text-dark mb-4">Bản đồ</h5>
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.212915900664!2d106.71924121088665!3d10.794998458805898!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317527c2f8f30911%3A0x36ac5073f8c91acd!2sT%C3%B2a%20nh%C3%A0%20The%20Landmark%2081!5e0!3m2!1svi!2s!4v1689266314569!5m2!1svi!2s" width="300" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>
        <div class="row border-top border-light mx-xl-5 py-4">
            <div class="col-md-6 px-xl-0">
                <p class="mb-md-0 text-center text-md-left text-dark">
                    &copy; <a class="text-dark font-weight-semi-bold" href="#">Gift Store - </a>Website bán quà lưu niệm
                </p>
            </div>
            {{-- <div class="col-md-6 px-xl-0 text-center text-md-right">
                <img class="img-fluid" src="user/img/payments.png" alt="">
            </div> --}}
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


    @yield('java-script')
</body>
</html>