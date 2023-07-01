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
                <nav class="collapse position-absolute navbar navbar-vertical navbar-light align-items-start p-0 border border-top-0 border-bottom-0 bg-light" id="navbar-vertical" style="width: calc(100% - 30px); z-index: 1;">
                    <div class="navbar-nav w-100 overflow-hidden" style="height: 410px">
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link" data-toggle="dropdown">Dresses <i class="fa fa-angle-down float-right mt-1"></i></a>
                            <div class="dropdown-menu position-absolute bg-secondary border-0 rounded-0 w-100 m-0">
                                <a href="" class="dropdown-item">Men's Dresses</a>
                                <a href="" class="dropdown-item">Women's Dresses</a>
                                <a href="" class="dropdown-item">Baby's Dresses</a>
                            </div>
                        </div>
                        <a href="" class="nav-item nav-link">Shirts</a>
                        <a href="" class="nav-item nav-link">Jeans</a>
                        <a href="" class="nav-item nav-link">Swimwear</a>
                        <a href="" class="nav-item nav-link">Sleepwear</a>
                        <a href="" class="nav-item nav-link">Sportswear</a>
                        <a href="" class="nav-item nav-link">Jumpsuits</a>
                        <a href="" class="nav-item nav-link">Blazers</a>
                        <a href="" class="nav-item nav-link">Jackets</a>
                        <a href="" class="nav-item nav-link">Shoes</a>
                    </div>
                </nav>
            </div>
            <div class="col-lg-9">
                <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
                    <a href="{{route('/')}}" class="text-decoration-none d-block d-lg-none">
                        <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">E</span>Shopper</h1>
                    </a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0">
                            <a href="{{route('/')}}" class="nav-item nav-link">Trang chủ</a>
                            <a href="{{route('shop')}}" class="nav-item nav-link">Cửa hàng</a>
                            {{-- <a href="" class="nav-item nav-link">Shop Detail</a> --}}
                            {{-- <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle active" data-toggle="dropdown">Pages</a>
                                <div class="dropdown-menu rounded-0 m-0">
                                    <a href="{{route('cart')}}" class="dropdown-item">Giỏ hàng</a>
                                    <a href="{{route('checkout')}}" class="dropdown-item">Thanh toán</a>
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
    {{-- <form action=""> --}}
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
                            {{-- <tr>
                                <td class="align-middle"><img src="upload/product/{{$cart->product->photo}}" alt="image" style="width: 50px;"></td>
                                <td class="align-middle"><input type="hidden" id="idProduct" name="dataProduct[{{$key}}][id_product]" value="{{$cart->product->id_product}}">{{$cart->product->name}}</td>
                                <td class="align-middle"><input type="hidden" id="priceProduct" name="dataProduct[{{$key}}][price]" value="{{$cart->product->price}}">{{number_format($cart->product->price, 0, ',', '.')}} VNĐ</td>
                                <td class="align-middle">
                                    <div class="input-group quantity mx-auto" style="width: 100px;">
                                        <div class="input-group-btn">
                                            <button class="btn btn-sm btn-primary btn-minus" ><i class="fa fa-minus"></i></button>
                                        </div>
                                        <input type="text" id="quantityProduct" name="dataProduct[{{$key}}][quantity]" class="form-control form-control-sm bg-secondary text-center" value="1">
                                        <div class="input-group-btn">
                                            <button class="btn btn-sm btn-primary btn-plus"><i class="fa fa-plus"></i></button>
                                        </div>
                                    </div>
                                </td>
                                <td class="align-middle">{{ number_format($cart->product->price*$cart->quantity, 0, ',', '.') }} VNĐ</td>
                                <td class="align-middle"><button class="btn btn-sm btn-primary"><i class="fa fa-times"></i></button></td>
                                <span class="d-none">{{($tempPrice += $cart->product->price*$cart->quantity)}}</span>
                            </tr> --}}


                            {{-- ---------------demo-------------- --}}
                            <tr>
                                <td class="align-middle"><img src="upload/product/{{$cart->product->photo}}" alt="image" style="width: 50px;"></td>
                                <td class="align-middle"><input type="hidden" id="idProduct" name="dataProduct[{{$key}}][id_product]" value="{{$cart->product->id_product}}">{{$cart->product->name}}</td>
                                <td class="align-middle"><input type="hidden" id="priceProduct" name="dataProduct[{{$key}}][price]" value="{{$cart->product->price}}">{{number_format($cart->product->price, 0, ',', '.')}} VNĐ</td>
                                <td class="align-middle">
                                    <div class="input-group quantity mx-auto" style="width: 100px;">
                                        <div class="input-group-btn">
                                            <a class="btn btn-sm btn-primary btn-minus decrease" data-product-id="{{$cart->id_product}}"><i class="fa fa-minus"></i></a>
                                        </div>
                                        {{-- <input type="text" id="quantityProduct" name="quantity" class="form-control form-control-sm bg-secondary text-center" value="{{$cart->quantity}}"> --}}
                                        <input type="text" id="quantityProduct" name="dataProduct[{{$key}}][quantity]" class="form-control form-control-sm bg-secondary text-center" value="{{$cart->quantity}}" min="1">
                                        <div class="input-group-btn">
                                            <a class="btn btn-sm btn-primary btn-plus increase" data-product-id="{{$cart->id_product}}"><i class="fa fa-plus"></i></a>
                                        </div>
                                    </div>
                                </td>
                                <td class="align-middle">{{ number_format($cart->product->price*$cart->quantity, 0, ',', '.') }} VNĐ</td>
                                <td class="align-middle"><a class="btn btn-sm btn-primary delete-item-btn" data-product-id="{{$cart->id_product}}"><i class="fa fa-times"></i></a></td>
                                <span class="d-none">{{($tempPrice += $cart->product->price*$cart->quantity)}}</span>
                            </tr>
                            @endforeach
                        </tbody>
                        @endif
                    </table>
                    {{-- <button class="btn btn-sm btn-primary">Cập nhật số lượng</button> --}}
                </div>
                <div class="col-lg-4">
                    {{--<div class="input-group">
                            <input type="text" class="form-control p-4" placeholder="Coupon Code">
                            <div class="input-group-append">
                                <button class="btn btn-primary">Apply Coupon</button>
                            </div>
                        </div>--}}
                        
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
                            <div class="card-header bg-secondary border-0">
                                <h4 class="font-weight-semi-bold m-0">Hóa đơn</h4>
                            </div>
                            <div class="card-body">
                                <div class="d-flex justify-content-between mb-3 pt-1">
                                    <h6 class="font-weight-medium">Tạm tính</h6>
                                    <h6 class="font-weight-medium">{{ number_format($tempPrice, 0, ',', '.') }} VNĐ</h6>
                                </div>
                                {{--<div class="d-flex justify-content-between">
                                    <h6 class="font-weight-medium">Phí vận chuyển</h6>
                                    <h6 class="font-weight-medium">$10</h6>
                                </div>--}}
                                <div class="d-flex justify-content-between">
                                    <h6 class="font-weight-medium">Tổng tiền</h6>
                                    <h6 class="font-weight-medium">{{ number_format($tempPrice, 0, ',', '.') }} VNĐ</h6>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-block btn-primary my-3 py-3">Thanh toán</button>
                        </div>
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

    <script>
        $(document).ready(function () {
            $('.idPaymentRadio').on('click',function(){
                $('.idPaymentRadio input').prop('disabled', true);
                $('.idPaymentRadio input').prop('checked', false);
                $(this).find('input').prop('disabled', false);
                $(this).find('input').prop('checked', true);
            });
        });
    </script>    

    <!-- Login Template Javascript -->
    <script src="{{ asset('user/js/login.js') }}"></script>

    <script>
        var csrfToken = $('meta[name="csrf-token"]').attr('content');
        $(document).ready(function() {
            $('.increase').click(function() {
                var productId = $(this).data('product-id');
                var input = $(this).closest('.quantity').find('input');
                var currentValue = parseInt(input.val()); 
                var updatedValue = currentValue + 1;
                $.ajax({
                    url: '{{ route('update-quantity', ['id' => '']) }}'+ '/' + productId,
                    method: 'POST', 
                    data: {
                        _token: csrfToken,
                        quantity: updatedValue,
                    },
                    success: function(response) {
                        input.val(updatedValue);
                    },
                    error: function(xhr) {
                    }
                });
            });

            $('.decrease').click(function() {
                var productId = $(this).data('product-id');
                var input = $(this).closest('.quantity').find('input'); 
                var currentValue = parseInt(input.val());

                if (currentValue > 1) {
                    var updatedValue = currentValue - 1;

                    $.ajax({
                        url: '{{ route('update-quantity', ['id' => '']) }}'+ '/' + productId,
                        method: 'POST',
                        data: {
                            _token: csrfToken,
                            quantity: updatedValue,
                        },
                        success: function(response) {
                            input.val(updatedValue);
                        },
                        error: function(xhr) {
                        }
                    });
                }
            });

            $('.delete-item-btn').click(function() {
            var productId = $(this).data('product-id');
            $.ajax({
                url: '{{ route('remove-item', ['id' => '']) }}'+ '/' + productId,
                type: 'POST',
                data: {
                    _token: csrfToken,
                },
                success: function(response) {
                    // Handle the success response (if needed)
                },
                error: function(xhr, status, error) {
                    // Handle the error response (if needed)
                }
            });
        });
        });
        
        
    </script>
    
@endsection