@extends('user/layout')

@section('title','Chi tiết sản phẩm')

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

    <!-- Log-in Css -->
    <link rel="stylesheet" href="{{ asset('user/css/login.css') }}">

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
            </div>
        </div>
    </div>
    <!-- Navbar End -->

    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Chi tiết sản phẩm</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="{{route('/')}}">Trang chủ</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Chi tiết sản phẩm</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Shop Detail Start -->
    <div class="container-fluid py-5">
        <div class="row px-xl-5">
            <div class="col-lg-5 pb-5">
                <div id="product-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner border">
                        <div class="carousel-item active">
                            @if($warehouseDetail->product->photo != 'noimage.png' && $warehouseDetail->product->photo != '')
                            <img class="w-100 h-100" src="../upload/product/{{ $warehouseDetail->product->photo }}" alt="{{$warehouseDetail->product->name}}">
                            @else
                            <img class="w-100 h-100" src="../user/img/noimage.png" alt="noimage.png" >
                            @endif
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#product-carousel" data-slide="prev">
                        <i class="fa fa-2x fa-angle-left text-dark"></i>
                    </a>
                    <a class="carousel-control-next" href="#product-carousel" data-slide="next">
                        <i class="fa fa-2x fa-angle-right text-dark"></i>
                    </a>
                </div>
            </div>

            <div class="col-lg-7 pb-5">
                <h3 class="font-weight-semi-bold">{{$warehouseDetail->product->name}}</h3>
                <div class="d-flex mb-3">
                    <div class="text-primary mr-2">
                        <small class="fas fa-star"></small>
                        <small class="fas fa-star"></small>
                        <small class="fas fa-star"></small>
                        <small class="fas fa-star-half-alt"></small>
                        <small class="far fa-star"></small>
                    </div>
                    <small class="pt-1">(50 Reviews)</small>
                </div>
                <h3 class="font-weight-semi-bold mb-4">{{ number_format($warehouseDetail->product->price, 0, ',', '.') }} đ</h3>
                <p class="mb-4">{{$warehouseDetail->product->description}}</p>
                
                <div class="d-flex align-items-center mb-4 pt-2">
                    <div class="input-group quantity mr-3" style="width: 130px;">
                        <div class="input-group-btn">
                            <button class="btn btn-primary btn-minus" >
                            <i class="fa fa-minus"></i>
                            </button>
                        </div>
                        <input type="text" class="form-control bg-secondary text-center" value="1">
                        <div class="input-group-btn">
                            <button class="btn btn-primary btn-plus">
                                <i class="fa fa-plus"></i>
                            </button>
                        </div>
                    </div>
                    <button class="btn btn-primary px-3"><i class="fa fa-shopping-cart mr-1"></i> Thêm vào giỏ hàng</button>
                </div>
                <div class="d-flex pt-2">
                    <p class="text-dark font-weight-medium mb-0 mr-2">Chia sẻ:</p>
                    <div class="d-inline-flex">
                        <a class="text-dark px-2" href="">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a class="text-dark px-2" href="">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a class="text-dark px-2" href="">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a class="text-dark px-2" href="">
                            <i class="fab fa-pinterest"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row px-xl-5">
            <div class="col">
                <div class="nav nav-tabs justify-content-center border-secondary mb-4">
                    <a class="nav-item nav-link active" data-toggle="tab" href="#tab-pane-1">Thông tin chi tiết</a>
                    <a class="nav-item nav-link" data-toggle="tab" href="#tab-pane-2">Đánh giá (0)</a>
                </div>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="tab-pane-1">
                        <h4 class="mb-3">Thông tin thêm</h4>
                        <p>Họ không lorem eirmod diam diam, eos elitr et gubergren diam sea. Hãy xác định rằng họ ghen tị với ai đó hai nỗi đau và hai điều. Họ ghét sự thật của sự thật và nỗi đau của rebum. Anh ấy đau đớn đứng ở nhà, nhưng trong một thời gian anh ấy đã có thể làm như vậy. Takimata kasd Tôi sẽ buộc tội anh ta vì tội buồn, những nỗi đau đó không phải vì vậy mà diam sẽ chấm dứt hai điều chỉ là, hãy để cho diam thần thánh một lúc nào đó eirmod nonumy đổ lỗi cho nỗi đau mà họ ghen tị.</p>
                        <div class="row">
                            <div class="col-md-6">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item px-0">
                                        Hãy để nó là hai lorem, hai trong số họ, v.v.
                                    </li>
                                    <li class="list-group-item px-0">
                                        Amet kasd gubergren be Holy and lorem sadipscing at.
                                    </li>
                                    <li class="list-group-item px-0">
                                        Tôi sẽ buộc tội anh ta hai điều, và anh ta sẽ đứng lên.
                                    </li>
                                    <li class="list-group-item px-0">
                                        Công việc khó khăn của Takimata chỉ là một niềm vui. Nonumy.
                                    </li>
                                </ul> 
                            </div>
                            <div class="col-md-6">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item px-0">
                                        Hãy để nó là hai lorem, hai trong số họ, v.v.
                                    </li>
                                    <li class="list-group-item px-0">
                                        Amet kasd gubergren be Holy and lorem sadipscing at.
                                    </li>
                                    <li class="list-group-item px-0">
                                        Tôi sẽ buộc tội anh ta hai điều, và anh ta sẽ đứng lên.
                                    </li>
                                    <li class="list-group-item px-0">
                                        Công việc khó khăn của Takimata chỉ là một niềm vui. Nonumy.
                                    </li>
                                </ul> 
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tab-pane-2">
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="mb-4">1 đánh giá cho "{{$warehouseDetail->product->name}}"</h4>
                                <div class="media mb-4">
                                    <img src="../user/img/user.jpg" alt="Image" class="img-fluid mr-3 mt-1" style="width: 45px;">
                                    <div class="media-body">
                                        <h6>Michel Jack Son<small> - <i>01 Jan 2023</i></small></h6>
                                        <div class="text-primary mb-2">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star-half-alt"></i>
                                            <i class="far fa-star"></i>
                                        </div>
                                        <p>Con gái của tôi rất vui vì nó đã nhận món quà này trong ngày sinh nhật.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h4 class="mb-4">Để lại đánh giá</h4>
                                <small>Địa chỉ email của bạn sẽ không được công bố. Các trường bắt buộc được đánh dấu *</small>
                                <div class="d-flex my-3">
                                    <p class="mb-0 mr-2">Đánh giá của bạn * :</p>
                                    <div class="text-primary">
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                    </div>
                                </div>
                                <form>
                                    <div class="form-group">
                                        <label for="message">Cảm nhận của bạn về sản phẩm *</label>
                                        <textarea id="message" cols="30" rows="5" class="form-control"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Your Name *</label>
                                        <input type="text" class="form-control" id="name">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Your Email *</label>
                                        <input type="email" class="form-control" id="email">
                                    </div>
                                    <div class="form-group mb-0">
                                        <input type="submit" value="Leave Your Review" class="btn btn-primary px-3">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Shop Detail End -->

    <!-- Products Start -->
    @if($relatedProducts != [])
    <div class="container-fluid py-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">Bạn cũng có thể thích</span></h2>
        </div>
        <div class="row px-xl-5">
            <div class="col">
                <div class="owl-carousel related-carousel">
                    @foreach($relatedProducts as $key => $value)
                    <div class="card product-item border-0">
                        <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                            @if($value->product->photo != 'noimage.png' && $value->product->photo != '')
                            <img class="img-fluid w-100" height="330" src="../upload/product/{{ $value->product->photo }}" alt="{{$warehouseDetail->product->name}}">
                            @else
                            <img class="img-fluid w-100" height="330" src="../user/img/noimage.png" alt="noimage.png" >
                            @endif
                        </div>
                        <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                            <h6 class="text-truncate mb-3">{{$value->product->name}}</h6>
                            <div class="d-flex justify-content-center">
                                <h6>{{ number_format($value->product->price, 0, ',', '.') }} đ</h6>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-between bg-light border">
                            <a href="{{route('product-detail').'/'.$value->id_warehouse_detail}}" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>Xem chi tiết</a>
                            <a href="javascript:" class="btn btn-sm text-dark p-0 buy-now-btn" data-id="{{$value->product->id_product}}"><i class="fas fa-shopping-cart text-primary mr-1"></i>Thêm vào giỏ hàng</a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    @endif
    <!-- Products End -->
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

<Script>
    var csrfToken = $('meta[name="csrf-token"]').attr('content');
    $(document).on('click', '.buy-now-btn', function(e) {
        e.preventDefault();
        $id_product = $(this).data('id');
        $.ajax({
            url: '{{ route('buy-now', ['id' => '']) }}' + '/' + $id_product,
            type: 'POST',
            data: { _token: csrfToken,},
            success: function(response) {
                if(response.success == true) {
                    alert("Thêm giỏ hàng thành công.");
                } else {
                    alert("Thêm vào giỏ hàng không thành công. Vui lòng thử lại sau.");
                }
                return false;
            },
            error: function(xhr) {}
        });
    });
</Script>

@endsection