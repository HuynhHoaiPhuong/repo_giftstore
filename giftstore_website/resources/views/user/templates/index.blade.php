@extends('user/layout')

@section('title','Trang Chủ')

@section('header')
    {{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{asset('user/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset('user/css/style.css')}}" rel="stylesheet">

    <!-- Log-in Css -->
    <link rel="stylesheet" href="{{asset('user/css/login.css')}}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

@endsection

@section('web_content')
    <!-- Navbar Start -->
    <div class="container-fluid mb-5">
        <div class="row border-top px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a class="btn shadow-none d-flex align-items-center justify-content-between bg-primary text-white w-100" data-toggle="collapse" href="#navbar-vertical" style="height: 65px; margin-top: -1px; padding: 0 30px;">
                    <h6 class="m-0">Danh mục sản phẩm</h6>
                    <i class="fa fa-angle-down text-dark"></i>
                </a>
                @if($typeCategories != [])
                <nav class="collapse show navbar navbar-vertical navbar-light align-items-start p-0 border border-top-0 border-bottom-0" id="navbar-vertical">
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
                                {{-- <a href="" class="nav-item nav-link">Shop Detail</a> --}}
                                {{-- <div class="nav-item dropdown">
                                    <a href="#" class="nav-link dropdown-toggle active" data-toggle="dropdown">Pages</a>
                                    <div class="dropdown-menu rounded-0 m-0">
                                        <a href="{{route('cart')}}" class="dropdown-item">Shopping Cart</a>
                                        <a href="{{route('checkout')}}" class="dropdown-item">Checkout</a>
                                    </div>
                                </div> --}}
                                <a href="{{route('contact')}}" class="nav-item nav-link">Liên hệ</a>
                            </div>
                            <div class="navbar-nav ml-auto py-0">
                                <a href="" class="nav-item nav-link">{{ session('username') }}</a>
                                <a href="{{route('log-out')}}" class="nav-item nav-link"><i class="fas fa-sign-out-alt"></i></a>
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
                                <a href="{{route('shop')}}" class="nav-item nav-link">Sản phẩm</a>
                                {{-- <a href="" class="nav-item nav-link">Shop Detail</a> --}}
                                {{-- <div class="nav-item dropdown">
                                    <a href="#" class="nav-link dropdown-toggle active" data-toggle="dropdown">Pages</a>
                                    <div class="dropdown-menu rounded-0 m-0">
                                        <a href="{{route('cart')}}" class="dropdown-item">Shopping Cart</a>
                                        <a href="{{route('checkout')}}" class="dropdown-item">Checkout</a>
                                    </div>
                                </div> --}}
                                <a href="{{route('contact')}}" class="nav-item nav-link">Liên hệ</a>
                            </div>
                            <div class="navbar-nav ml-auto py-0">
                                <a href="{{route('log-in')}}" class="nav-item nav-link">Đăng nhập</a>
                                <a href="{{route('log-in')}}" class="nav-item nav-link">Đăng ký</a>
                            </div>
                        </div>
                    </nav>
                @endif

                <div id="header-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active" style="height: 410px;">
                            <img class="img-fluid" src="user/img/slideshow/chuseok_korean_thanksgiving_day_theme_pt_templates_423137.jpg" alt="Image">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 700px;">
                                    {{-- <h4 class="text-light text-uppercase font-weight-medium mb-3">10% Off Your First Order</h4> --}}
                                    <h3 class="display-4 text-white font-weight-semi-bold mb-4">Quà tặng sinh nhật</h3>
                                    <a href="" class="btn btn-light py-2 px-3">Mua ngay</a>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item" style="height: 410px;">
                            <img class="img-fluid" src="user/img/slideshow/korea_new_year_s_day_gift_powerpoint_design_ideas_312209.jpg" alt="Image">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 700px;">
                                    {{-- <h4 class="text-light text-uppercase font-weight-medium mb-3">10% Off Your First Order</h4> --}}
                                    <h3 class="display-4 text-white font-weight-semi-bold mb-4">Lọ thủy tinh trang trí</h3>
                                    <a href="" class="btn btn-light py-2 px-3">Mua ngay</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#header-carousel" data-slide="prev">
                        <div class="btn btn-dark" style="width: 45px; height: 45px;">
                            <span class="carousel-control-prev-icon mb-n2"></span>
                        </div>
                    </a>
                    <a class="carousel-control-next" href="#header-carousel" data-slide="next">
                        <div class="btn btn-dark" style="width: 45px; height: 45px;">
                            <span class="carousel-control-next-icon mb-n2"></span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Navbar End -->

    <!-- Featured Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5 pb-3">
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                    <h1 class="fa fa-check text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">Sản phẩm chất lượng</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                    <h1 class="fa fa-shipping-fast text-primary m-0 mr-2"></h1>
                    <h5 class="font-weight-semi-bold m-0">Miễn phí vận chuyển</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                    <h1 class="fas fa-exchange-alt text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">Đổi trả trong 14 ngày</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                    <h1 class="fa fa-phone-volume text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">Hỗ trợ 24/7</h5>
                </div>
            </div>
        </div>
    </div>
    <!-- Featured End -->

    <!-- Categories Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5 pb-3">
            @foreach($allCategories as $key => $allCategory)
            <div class="col-lg-4 col-md-6 pb-1">
                <div class="cat-item d-flex flex-column border mb-4" style="padding: 30px;">
                    <p class="text-right">15 Products</p>
                    <a href="" class="cat-img position-relative overflow-hidden mb-3">
                        <img width="100%" height="383" class="img-fluid" src="upload/category/{{$allCategory->photo}}" alt="">
                    </a>
                    <h5 class="font-weight-semi-bold m-0">{{$allCategory->name}}</h5>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <!-- Categories End -->

    <!-- Offer Start -->
    <div class="container-fluid offer pt-5">
        <div class="row px-xl-5">
            <div class="col-md-6 pb-4">
                <div class="position-relative bg-secondary text-center text-md-right text-white mb-2 py-5 px-5" style="height: 200px;">
                    <img src="user/img/banner/gau-dau.png" height="200" alt="">
                    <div class="position-relative" style="z-index: 1;">
                        {{-- <h5 class="text-uppercase text-primary mb-3">20% off the all order</h5> --}}
                        <h1 class="mb-4 font-weight-semi-bold">Thú nhồi bông</h1>
                        <a href="" class="btn btn-outline-primary py-md-2 px-md-3">Mua ngay</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 pb-4">
                <div class="position-relative bg-secondary text-center text-md-left text-white mb-2 py-5 px-5" style="height: 200px;">
                    <img src="user/img/banner/globle-snow.png" height="200" alt="">
                    <div class="position-relative" style="z-index: 1;">
                        {{-- <h5 class="text-uppercase text-primary mb-3">20% off the all order</h5> --}}
                        <h1 class="mb-4 font-weight-semi-bold">Quả cầu tuyết</h1>
                        <a href="" class="btn btn-outline-primary py-md-2 px-md-3">Mua ngay</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Offer End -->

    <!-- Products Start -->
    @if($warehouseDetails != [])
    <div class="container-fluid pt-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">Sản phẩm của chúng tôi</span></h2>
        </div>
        <div class="row px-xl-5 pb-3">
            @foreach($warehouseDetails as $key => $warehouseDetail)
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="card product-item border-0 mb-4">
                    <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                        <!-- <img class="img-fluid w-100" src="user/img/product-1.jpg" alt=""> -->
                        @if($warehouseDetail->product->photo != 'noimage.png' && $warehouseDetail->product->photo != '')
                        <img class="img-fluid w-100" width="325" height="325" src="upload/product/{{ $warehouseDetail->product->photo }}" alt="{{$warehouseDetail->product->name}}">
                        @else
                        <img class="img-fluid w-100" width="325" height="325" src="user/img/noimage.png" alt="noimage.png" >
                        @endif
                    </div>
                    <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                        <h6 class="text-truncate mb-3">{{$warehouseDetail->product->name}}</h6>
                        <div class="d-flex justify-content-center">
                            <h6>{{ number_format($warehouseDetail->price_pay, 0, ',', '.') }} đ</h6>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-between bg-light border">
                        <a href="product/{{$warehouseDetail->id_warehouse_detail}}" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>Xem chi tiết</a>
                        <a class="btn btn-sm text-dark p-0 buy-now-btn" data-id="{{$warehouseDetail->product->id_product}}"><i class="fas fa-shopping-cart text-primary mr-1"></i>Thêm vào giỏ hàng</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endif
    <!-- Products End -->

    <!-- Subscribe Start -->
    <div class="container-fluid bg-secondary my-5">
        <div class="row justify-content-md-center py-5 px-xl-5">
            <div class="col-md-6 col-12 py-5">
                <div class="text-center mb-2 pb-2">
                    <h2 class="section-title px-5 mb-3"><span class="bg-secondary px-2">Liên hệ với chúng tôi</span></h2>
                    <p>Chúng tôi sẽ gửi cho bạn những thông báo mới nhất</p>
                </div>
                <form action="">
                    <div class="input-group">
                        <input type="text" class="form-control border-white p-4" placeholder="Nhập Email của bạn">
                        <div class="input-group-append">
                            <button class="btn btn-primary px-4">Gửi</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Subscribe End -->

    <!-- Vendor Start -->
    <div class="container-fluid py-5">
        <div class="row px-xl-5">
            <div class="col">
                <div class="owl-carousel vendor-carousel">
                    <div class="vendor-item border p-4">
                        <img src="user/img/vendor-1.jpg" alt="">
                    </div>
                    <div class="vendor-item border p-4">
                        <img src="user/img/vendor-2.jpg" alt="">
                    </div>
                    <div class="vendor-item border p-4">
                        <img src="user/img/vendor-3.jpg" alt="">
                    </div>
                    <div class="vendor-item border p-4">
                        <img src="user/img/vendor-4.jpg" alt="">
                    </div>
                    <div class="vendor-item border p-4">
                        <img src="user/img/vendor-5.jpg" alt="">
                    </div>
                    <div class="vendor-item border p-4">
                        <img src="user/img/vendor-6.jpg" alt="">
                    </div>
                    <div class="vendor-item border p-4">
                        <img src="user/img/vendor-7.jpg" alt="">
                    </div>
                    <div class="vendor-item border p-4">
                        <img src="user/img/vendor-8.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Vendor End -->
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

    <!-- Login Template Javascript -->
    <!-- <script src="{{ asset('user/js/login.js') }}"></script> -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


    {{-- Add To Cart --}}
    <script>
        toastr.options = {
            positionClass: 'toast-bottom-right'
        };

        var csrfToken = $('meta[name="csrf-token"]').attr('content');   
        // console.log(csrfToken);
        $(document).on('click', '.buy-now-btn', function(e) {
            e.preventDefault();
            $id_product = $(this).data('id');
            $.ajax({
                url: '{{ route('buy-now', ['id' => '']) }}' + '/' + $id_product,
                type: 'POST',
                data: { _token: csrfToken,},
                success: function(response) {
                    if(response.success == true) {
                        toastr.success('Đã thêm');
                    } else {
                        toastr.error('Thêm thất bại!');
                    }
                },
                error: function(xhr) {}
            });
        });

    </script>
        
@endsection