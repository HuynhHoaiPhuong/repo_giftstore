@extends('user.layout')

@section('title','Giỏ hàng')

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
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Giỏ hàng</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="{{route('/')}}">Trang chủ</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Giỏ hàng</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Cart Start -->
    <form action="{{route('pay-bill')}}" id="formBillPay" method="POST">
        @csrf
        <div class="container-fluid pt-5">
            <div class="row px-xl-5">
                <div class="col-lg-8 table-responsive mb-5">
                    <table class="table table-bordered text-center mb-0">
                        <thead class="bg-secondary text-dark">
                            <tr>
                                <th>Hình ảnh</th>
                                <th>Sản phảm</th>
                                <th>Giá</th>
                                <th>Số lượng</th>
                                <th>Tổng tiền</th>
                                <th>Xóa</th>
                            </tr>
                        </thead>
                        @if($carts != [])
                        <tbody class="align-middle">
                            @foreach($carts as $key => $cart)
                            <tr>
                                <td class="align-middle"><img src="upload/product/{{$cart->product->photo}}" alt="image" style="width: 50px;"></td>
                                <td class="align-middle"><input type="hidden" id="idProduct" name="dataProduct[{{$key}}][id_product]" value="{{$cart->product->id_product}}">{{$cart->product->name}}</td>
                                <td class="align-middle"><input type="hidden" id="priceProduct" name="dataProduct[{{$key}}][price]" value="{{$cart->price_pay}}">{{number_format($cart->price_pay, 0, ',', '.')}}đ</td>
                                <td class="align-middle">
                                    <div class="input-group quantity mx-auto" style="width: 100px;">
                                        <div class="input-group-btn">
                                            <a class="btn btn-sm btn-primary btn-minus decrease" data-product-id="{{$cart->id_product}}"><i class="fa fa-minus"></i></a>
                                        </div>
                                        <input type="text" id="quantityProduct" name="dataProduct[{{$key}}][quantity]" class="form-control form-control-sm bg-secondary text-center" value="{{$cart->quantity}}" min="1" readonly>
                                        <div class="input-group-btn">
                                            <a class="btn btn-sm btn-primary btn-plus increase" data-product-id="{{$cart->id_product}}"><i class="fa fa-plus"></i></a>
                                        </div>
                                    </div>
                                </td>
                                <td class="align-middle">{{ number_format($cart->price_pay*$cart->quantity, 0, ',', '.') }}đ</td>
                                <td class="align-middle"><a class="btn btn-sm btn-primary delete-item-btn" data-product-id="{{$cart->id_product}}"><i class="fa fa-times"></i></a></td>
                                <span class="d-none">{{($tempPrice += $cart->price_pay*$cart->quantity)}}</span>
                            </tr>
                            @endforeach
                        </tbody>
                        @endif
                    </table>
                    {{-- <div id="cart-container"></div> --}}
                </div>
                <div class="col-lg-4">
                    {{-- <div class="card border-secondary mb-5">
                        <div class="card-header bg-secondary border-0"><h4 class="font-weight-semi-bold m-0">Mã giảm giá</h4></div>
                        <div class="input-group">
                            <input type="text" class="form-control p-4" placeholder="Nhập mã giảm giá">
                            <div class="input-group-append">
                                <button class="btn btn-primary">Áp dụng</button>
                            </div>
                        </div>
                    </div> --}}
                    
                    @if($payments != [])
                    <div class="card border-secondary mb-5">
                        <div class="card-header bg-secondary border-0">
                            <h4 class="font-weight-semi-bold m-0">Phương thức thanh toán</h4>
                        </div>
                        <div class="card-body parentIdPaymentRadio">
                            @foreach($payments as $key => $payment)
                            <div class="form-group">
                                <div class="custom-control custom-radio idPaymentRadio">
                                    <input type="radio" name="id_payment" id="idPayment" value="{{$payment->id_payment}}">
                                    <label for="name">{{$payment->name}}</label>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endif

                    <div class="card border-secondary mb-5">
                        <div class="card-header bg-secondary border-0"><h4 class="font-weight-semi-bold m-0">Hóa đơn</h4></div>
                        <div class="card-body">
                            <div class="d-flex justify-content-between mb-3 pt-1">
                                <h6 class="font-weight-medium">Tạm tính</h6>
                                <h6 class="font-weight-medium">{{ number_format($tempPrice, 0, ',', '.') }}đ</h6>
                            </div>
                            {{--<div class="d-flex justify-content-between">
                                <h6 class="font-weight-medium">Phí vận chuyển</h6>
                                <h6 class="font-weight-medium">$10</h6>
                            </div>--}}
                            <div class="d-flex justify-content-between">
                                <h6 class="font-weight-medium">Tổng tiền</h6>
                                <h6 class="font-weight-medium">{{ number_format($tempPrice, 0, ',', '.') }}đ</h6>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-block btn-primary my-3 py-3" {{ count($carts) === 0 ? 'disabled' : '' }}>Thanh toán</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- Cart End -->
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

    
    <script>
        $(document).ready(function () {
            $('.idPaymentRadio').on('click',function(){
                $('.idPaymentRadio input').prop('disabled', true);
                $('.idPaymentRadio input').prop('checked', false);
                $(this).find('input').prop('disabled', false);
                $(this).find('input').prop('checked', true);
            });
        });

        toastr.options = {positionClass: 'toast-bottom-right'};
        var csrfToken = $('meta[name="csrf-token"]').attr('content');

        $(document).ready(function() {
            $('.increase').click(function() {
                var id_product = $(this).data('product-id');
                var input = $(this).closest('.quantity').find('input');
                var currentValue = parseInt(input.val()); 
                var updatedValue = currentValue + 1;
                
                $.ajax({
                    url: '{{ route('update-quantity') }}',
                    method: 'POST', 
                    data: {
                        _token: csrfToken,
                        id_product : id_product,
                        quantity: updatedValue,
                    },
                    success: function(response) {
                        input.val(updatedValue);
                        location.reload();
                    },
                    error: function(xhr) {
                        
                    }
                });
            });
            
            $('.decrease').click(function() {
                var id_product = $(this).data('product-id');
                var input = $(this).closest('.quantity').find('input'); 
                var currentValue = parseInt(input.val());

                if (currentValue > 1) {
                    var updatedValue = currentValue - 1;
                    
                    $.ajax({
                        url: '{{ route('update-quantity') }}',
                        method: 'POST',
                        data: {
                            _token: csrfToken,
                            id_product : id_product,
                            quantity: updatedValue,
                        },
                        success: function(response) {
                            input.val(updatedValue);
                            location.reload();
                        },
                        error: function(xhr) {
                            
                        }
                    });
                }
            });
            
            $('.delete-item-btn').click(function() {
                var id_product = $(this).data('product-id');
                var cartContainer = $('#cart-container');
                $.ajax({
                    url: '{{ route('remove-item') }}',
                    type: 'POST',
                    data: {
                        _token: csrfToken,
                        id_product : id_product,
                    },
                    success: function(response) {
                        if(response){
                            toastr.success('Đã xóa!');
                            // loadCart(cartContainer);
                        }
                        else
                        toastr.error('Xóa thất bại!');
                    },
                    error: function(xhr, status, error) {
                        
                    }
                });
            });

            // function loadCart() {
            //     $.ajax({
            //         url: '{{ route('cart') }}',
            //         type: 'GET',
            //         data: {_token: csrfToken},
            //         success: function (response) {
            //             $('#cart-container').html(response);
            //         },
            //         error: function (xhr, status, error) {
                
            //         },
            //     });
            // }

            $('#formBillPay').submit(function(e) {
                e.preventDefault();

                $.ajax({
                    url: $(this).attr('action'),
                    method: $(this).attr('method'),
                    data: $(this).serialize(),
                    success: function(response) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Thanh toán thành công',
                            showConfirmButton: false,
                            timer: 2000
                        }).then(function() {
                            window.location.href = "{{ route('/') }}";
                        });
                    },
                    error: function(xhr, status, error) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Có lỗi xảy ra',
                            text: 'Vui lòng kiểm tra lại phương thức thanh toán!'
                        });
                    }
                });
            });
        });
    </script>
@endsection