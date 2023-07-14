@extends('user/layout')

@section('title','Danh mục sản phẩm')

@section('header')

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{asset('user/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">


    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('user/css/style.css') }}" rel="stylesheet">

    <!-- Log-in Css -->
    <link rel="stylesheet" href="{{ asset('user/css/login.css') }}">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">


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
                        @foreach($typeCategories as $typeCategory)
                            @if(isset($categoriesByType[$typeCategory->id_type_category]) && count($categoriesByType[$typeCategory->id_type_category]) > 0)
                                <div class="nav-item dropdown">
                                    <a href="{{route('type-category', $typeCategory->id_type_category)}}" class="nav-link" data-toggle="dropdown">{{$typeCategory->name}}<i class="fa fa-angle-down float-right mt-1"></i></a>
                                    <div class="dropdown-menu position-absolute bg-secondary border-0 rounded-0 w-100 m-0">
                                        @foreach ($categoriesByType[$typeCategory->id_type_category] as $category)
                                            <a href="{{route('type-category', $category->id_category)}}" class="dropdown-item">{{$category->name}}</a>
                                        @endforeach
                                    </div>
                                </div>
                            @else
                                <a href="{{route('type-category', $typeCategory->id_type_category)}}" class="nav-item nav-link">{{$typeCategory->name}}</a>
                            @endif
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
                            {{-- <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle active" data-toggle="dropdown">Trang</a>
                                <div class="dropdown-menu rounded-0 m-0">
                                    <a href="{{route('cart')}}" class="dropdown-item">Giỏ hàng</a>
                                    <a href="{{route('profile')}}" class="dropdown-item">Trang cá nhân</a>
                                </div>
                            </div> --}}
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
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Cửa hàng của chúng tôi</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="{{route('/')}}">Trang chủ</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Cửa hàng</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Shop Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <!-- Shop Sidebar Start -->
            <div class="col-lg-3 col-md-12">
                <!-- Price Start -->
                <div class="border-bottom mb-4 pb-4">
                    <h5 class="font-weight-semi-bold mb-4">Lọc theo giá</h5>
                    <form>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" checked id="price-all">
                            <label class="custom-control-label" for="price-all">Tất cả</label>
                            {{-- <span class="badge border font-weight-normal">1000</span> --}}
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="price-1">
                            <label class="custom-control-label" for="price-1">0 - 100.000đ</label>
                            {{-- <span class="badge border font-weight-normal">150</span> --}}
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="price-2">
                            <label class="custom-control-label" for="price-2">100.000đ - 500.000đ</label>
                            {{-- <span class="badge border font-weight-normal">295</span> --}}
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="price-3">
                            <label class="custom-control-label" for="price-3">500.000đ - 1 triệu</label>
                            {{-- <span class="badge border font-weight-normal">246</span> --}}
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="price-4">
                            <label class="custom-control-label" for="price-4">1 triệu - 3 triệu</label>
                            {{-- <span class="badge border font-weight-normal">145</span> --}}
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between">
                            <input type="checkbox" class="custom-control-input" id="price-5">
                            <label class="custom-control-label" for="price-5">3 triệu - 5 triệu</label>
                            {{-- <span class="badge border font-weight-normal">168</span> --}}
                        </div>
                    </form>
                </div>
                <!-- Price End -->

                <!-- Category Start -->
                <div class="border-bottom mb-4 pb-4">
                    <h5 class="font-weight-semi-bold mb-4">Danh mục sản phẩm</h5>
                    <form>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" checked id="price-all">
                            <label class="custom-control-label" for="price-all">Tất cả</label>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="price-1">
                            <label class="custom-control-label" for="price-1">Bóng tuyết</label>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="price-2">
                            <label class="custom-control-label" for="price-2">Gấu bông to</label>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="price-3">
                            <label class="custom-control-label" for="price-3">Cầu pha lê</label>
                        </div>
                    </form>
                </div>
                <!-- Category End -->
                
                <!-- Color Start -->
                {{-- <div class="border-bottom mb-4 pb-4">
                    <h5 class="font-weight-semi-bold mb-4">Filter by color</h5>
                    <form>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" checked id="color-all">
                            <label class="custom-control-label" for="price-all">All Color</label>
                            <span class="badge border font-weight-normal">1000</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="color-1">
                            <label class="custom-control-label" for="color-1">Black</label>
                            <span class="badge border font-weight-normal">150</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="color-2">
                            <label class="custom-control-label" for="color-2">White</label>
                            <span class="badge border font-weight-normal">295</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="color-3">
                            <label class="custom-control-label" for="color-3">Red</label>
                            <span class="badge border font-weight-normal">246</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="color-4">
                            <label class="custom-control-label" for="color-4">Blue</label>
                            <span class="badge border font-weight-normal">145</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between">
                            <input type="checkbox" class="custom-control-input" id="color-5">
                            <label class="custom-control-label" for="color-5">Green</label>
                            <span class="badge border font-weight-normal">168</span>
                        </div>
                    </form>
                </div> --}}
                <!-- Color End -->

                <!-- Size Start -->
                {{-- <div class="mb-5">
                    <h5 class="font-weight-semi-bold mb-4">Filter by size</h5>
                    <form>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" checked id="size-all">
                            <label class="custom-control-label" for="size-all">All Size</label>
                            <span class="badge border font-weight-normal">1000</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="size-1">
                            <label class="custom-control-label" for="size-1">XS</label>
                            <span class="badge border font-weight-normal">150</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="size-2">
                            <label class="custom-control-label" for="size-2">S</label>
                            <span class="badge border font-weight-normal">295</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="size-3">
                            <label class="custom-control-label" for="size-3">M</label>
                            <span class="badge border font-weight-normal">246</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="size-4">
                            <label class="custom-control-label" for="size-4">L</label>
                            <span class="badge border font-weight-normal">145</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between">
                            <input type="checkbox" class="custom-control-input" id="size-5">
                            <label class="custom-control-label" for="size-5">XL</label>
                            <span class="badge border font-weight-normal">168</span>
                        </div>
                    </form>
                </div> --}}
                <!-- Size End -->
            </div>
            <!-- Shop Sidebar End -->


            <!-- Shop Product Start -->
            <div class="col-lg-9 col-md-12">
                <div class="row pb-3">
                    <div class="col-12 pb-1">
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            {{-- <form action="">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Tìm kiếm">
                                    <div class="input-group-append">
                                        <span class="input-group-text bg-transparent text-primary">
                                            <i class="fa fa-search"></i>
                                        </span>
                                    </div>
                                </div>
                            </form> --}}
                            {{-- <div class="dropdown ml-4"> --}}
                                <button class="btn border dropdown-toggle" type="button" id="triggerId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Sắp xếp theo</button>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="triggerId">
                                    <a class="dropdown-item" href="#">Mặc định</a>
                                    <a class="dropdown-item" href="#">Giá tăng dần</a>
                                    <a class="dropdown-item" href="#">Giá giảm dần</a>
                                </div>
                            {{-- </div> --}}
                        </div>
                    </div>
                    @if(isset($lists))
                        @if (count($lists) > 0)
                            @foreach($lists as $key => $list)
                            <div class="col-lg-4 col-md-6 col-sm-12 pb-1">
                                <div class="card product-item border-0 mb-4">
                                    <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                        @if($list->product->photo != 'noimage.png' && $list->product->photo != '')
                                            <img class="img-fluid w-100" width="325" height="325" src="../upload/product/{{ $list->product->photo }}" alt="{{$list->name}}">
                                        @else
                                            <img class="img-fluid w-100" width="325" height="325" src="../user/img/noimage.png" alt="noimage.png" >
                                        @endif                            
                                    </div>
                                    <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                        <h6 class="text-truncate mb-3">{{$list->product->name}}</h6>
                                        <div class="d-flex justify-content-center">
                                            <h6>{{ number_format($list->price_pay, 0, ',', '.') }} đ</h6>
                                        </div>
                                    </div>
                                    <div class="card-footer d-flex justify-content-between bg-light border">
                                        <a href="product/{{$list->id_warehouse_detail}}" class="btn btn-sm text-dark p-0">
                                            <i class="fas fa-eye text-primary mr-1"></i>Xem chi tiết
                                        </a>
                                        <a class="btn btn-sm text-dark p-0 buy-now-btn" data-id="{{$list->product->id_product}}" data-price="{{$list->price_pay}}">
                                            <i class="fas fa-shopping-cart text-primary mr-1"></i>Thêm vào giỏ hàng
                                        </a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            {{-- Pagination --}}
                            <div class="col-12 pb-1">
                                <nav aria-label="Page navigation">
                                    <ul class="pagination justify-content-center mb-3">
                                        @if ($lists->currentPage() > 1)
                                        <li class="page-item"><a class="page-link" href="{{$lists->url(1)}}">Trang đầu</a></li>
                                        @endif

                                        @if ($lists->currentPage() > 1)
                                        <li class="page-item">
                                            <a href="{{$lists->previousPageUrl()}}" class="page-link" aria-label="Previous">
                                                <span aria-hidden="true">&laquo;</span>
                                                <span class="sr-only">Previous</span>
                                            </a>
                                        </li>
                                        @endif
                                
                                        @foreach ($lists->getUrlRange(max($lists->currentPage() - 2, 1), min($lists->currentPage() + 2, $lists->lastPage())) as $page => $url)
                                            @if ($page == $lists->currentPage())
                                            <li class="page-item active"><a class="page-link">{{$page}}</a></li>
                                            @else
                                            <li class="page-item"><a class="page-link" href="{{$url}}">{{$page}}</a></li>
                                            @endif
                                        @endforeach
                                
                                        @if ($lists->currentPage() < $lists->lastPage())
                                        <li class="page-item">
                                            <a class="page-link" href="{{$lists->nextPageUrl()}}" aria-label="Next">
                                                <span aria-hidden="true">&raquo;</span>
                                                <span class="sr-only">Next</span>                                        
                                            </a>
                                        </li>
                                        @endif

                                        @if ($lists->currentPage() < $lists->lastPage())
                                        <li class="page-item"><a class="page-link" href="{{$lists->url($lists->lastPage())}}">Trang cuối</a></li>
                                        @endif
                                    </ul>
                                </nav>
                            </div>
                        @else
                            <div class="col-lg-4 col-md-6 col-sm-12 pb-1">
                                <div class="card product-item border-0 mb-4">
                                    <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                        <h6 class="">Không tìm thấy sản phẩm</h6>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @elseif(isset($types))
                        @if (count($types) > 0)
                        @foreach($types as $key => $type)
                            <div class="col-lg-4 col-md-6 col-sm-12 pb-1">
                                <div class="card product-item border-0 mb-4">
                                    <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                        @if($type->product->photo != 'noimage.png' && $type->product->photo != '')
                                            <img class="img-fluid w-100" width="325" height="325" src="../upload/product/{{ $type->product->photo }}" alt="{{$type->name}}">
                                        @else
                                            <img class="img-fluid w-100" width="325" height="325" src="../user/img/noimage.png" alt="noimage.png" >
                                        @endif                            
                                    </div>
                                    <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                        <h6 class="text-truncate mb-3">{{$type->product->name}}</h6>
                                        <div class="d-flex justify-content-center">
                                            <h6>{{ number_format($type->price_pay, 0, ',', '.') }} đ</h6>
                                        </div>
                                    </div>
                                    <div class="card-footer d-flex justify-content-between bg-light border">
                                        <a href="product/{{$type->id_warehouse_detail}}" class="btn btn-sm text-dark p-0">
                                            <i class="fas fa-eye text-primary mr-1"></i>Xem chi tiết
                                        </a>
                                        <a class="btn btn-sm text-dark p-0 buy-now-btn" data-id="{{$type->product->id_product}}" data-price="{{$type->price_pay}}">
                                            <i class="fas fa-shopping-cart text-primary mr-1"></i>Thêm vào giỏ hàng
                                        </a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            {{-- Pagination --}}
                            <div class="col-12 pb-1">
                                <nav aria-label="Page navigation">
                                    <ul class="pagination justify-content-center mb-3">
                                        @if ($lists->currentPage() > 1)
                                        <li class="page-item"><a class="page-link" href="{{$lists->url(1)}}">Trang đầu</a></li>
                                        @endif

                                        @if ($lists->currentPage() > 1)
                                        <li class="page-item">
                                            <a href="{{$lists->previousPageUrl()}}" class="page-link" aria-label="Previous">
                                                <span aria-hidden="true">&laquo;</span>
                                                <span class="sr-only">Previous</span>
                                            </a>
                                        </li>
                                        @endif
                                
                                        @foreach ($lists->getUrlRange(max($lists->currentPage() - 2, 1), min($lists->currentPage() + 2, $lists->lastPage())) as $page => $url)
                                            @if ($page == $lists->currentPage())
                                            <li class="page-item active"><a class="page-link">{{$page}}</a></li>
                                            @else
                                            <li class="page-item"><a class="page-link" href="{{$url}}">{{$page}}</a></li>
                                            @endif
                                        @endforeach
                                
                                        @if ($lists->currentPage() < $lists->lastPage())
                                        <li class="page-item">
                                            <a class="page-link" href="{{$lists->nextPageUrl()}}" aria-label="Next">
                                                <span aria-hidden="true">&raquo;</span>
                                                <span class="sr-only">Next</span>                                        
                                            </a>
                                        </li>
                                        @endif

                                        @if ($lists->currentPage() < $lists->lastPage())
                                        <li class="page-item"><a class="page-link" href="{{$lists->url($lists->lastPage())}}">Trang cuối</a></li>
                                        @endif
                                    </ul>
                                </nav>
                            </div>
                        @else
                            <div class="col-lg-4 col-md-6 col-sm-12 pb-1">
                                <div class="card product-item border-0 mb-4">
                                    <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                        <h6 class="">Không tìm thấy sản phẩm</h6>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endif

                </div>
            </div>
            <!-- Shop Product End -->
        </div>
    </div>
    <!-- Shop End -->
    
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    {{-- Add To Cart --}}
    <script>
        toastr.options = {positionClass: 'toast-bottom-right'};
        var csrfToken = $('meta[name="csrf-token"]').attr('content');   

        $(document).ready(function() {
            $('.buy-now-btn').on('click', function(e) {
                e.preventDefault();
                @if(!Auth::check())
                    Swal.fire({
                        title: 'Thông báo',
                        text: 'Hãy đăng nhập để thêm sản phẩm này vào giỏ hàng!',
                        icon: 'warning',
                        showCancelButton: true,
                        cancelButtonText: 'Hủy',
                        confirmButtonText: 'Đăng nhập',
                        reverseButtons: true,
                    }).then((result) => {
                        if (result.isConfirmed) {window.location.href = "{{ route('log-in') }}";}
                    });
                @else
                    $id_product = $(this).data('id');
                    $price_pay = $(this).data('price');
                    $.ajax({
                        url: '{{ route('buy-now') }}',
                        type: 'POST',
                        data: { 
                            _token: csrfToken,
                            id_product: $id_product,
                            price_pay: $price_pay
                        },
                        success: function(response) {
                            if(response.success == true) {
                                toastr.success('Đã thêm');
                            } else {
                                toastr.error('Thêm thất bại!');
                            }
                        },
                        error: function(xhr) {}
                    });
                @endif
            });
        });
    </script>
@endsection