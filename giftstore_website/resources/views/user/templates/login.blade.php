@extends('user/layout')

@section('title','Đăng ký | Đăng nhập')

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
<div class="container login" id="container">
	<div class="form-container sign-up-container">
		<form action="{{route('register-member')}}" method="post">
			@csrf
			<h1>Tạo tài khoản</h1>
			{{-- <div class="social-container">
				<a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
				<a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
				<a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
			</div>
			<span>hoặc đăng nhập với Google</span> --}}
			<input type="text" name="fullname" placeholder="Họ tên" required=""/>
			<input type="text" name="username" placeholder="Tên đăng nhập" required=""/>
			<input type="password" name="password" placeholder="Mật khẩu" required=""/>
			<input type="phone" name="phone" placeholder="Số điện thoại" required=""/>
			<input type="text" name="address" placeholder="Địa chỉ" required=""/>
			<button type="submit" style="margin-top: 0;">Đăng ký</button>
		</form>
	</div>
	<div class="form-container sign-in-container">
		@if(session('error'))
    <div class="error-popup">
        <span class="error-message">{{ session('error') }}</span>
    </div>
		@endif
		<form action="{{route('client-authenticate')}}" method="POST">
			@csrf
			<h1>Đăng nhập</h1>
			<div class="social-container">
				<div>
					<label>Hoặc sử dụng tài khoản Google</label>
				</div>
				<a href="{{route('google')}}" class="social btn-google" style="background-color: #ff2b2b; border-radius: 100px; width: 60px; height: 40px; color:#fff"><i class="fab fa-google-plus-g" style="font-size: 30px"></i></a>
			</div>
			<input type="username" name="username" placeholder="Tên đăng nhập" required="" />
			<input type="password" name="password" placeholder="Mật khẩu" required="" />
			<a href="#">Quên tài khoản?</a>
			<button type="submit">Đăng nhập</button>
		</form>
		<form action="{{route('client-authenticate')}}" method="POST">
			@csrf
			<h1>Đăng nhập</h1>
			<div class="social-container">
				<div>
					<label>Hoặc sử dụng tài khoản Google</label>
				</div>
				<a href="{{ route('google') }}" class="social btn-google" style="background-color: #ff2b2b; border-radius: 100px; width: 60px; height: 40px; color:#fff"><i class="fab fa-google-plus-g" style="font-size: 30px"></i></a>
			</div>
			<input type="username" name="username" placeholder="Tên đăng nhập" required="" />
			<input type="password" name="password" placeholder="Mật khẩu" required="" />
			<a href="#">Quên tài khoản?</a>
			<button type="submit">Đăng nhập</button>
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Chào mừng quay lại!</h1>
				<p style="color: #292424; font-weight:300;">Để giữ kết nối với chúng tôi, vui lòng đăng nhập bằng thông tin cá nhân của bạn</p>
				<button class="ghost" id="signIn">Đăng nhập</button>
			</div>
			<div class="overlay-panel overlay-right">
				<h1>Xin chào</h1>
				<p style="color: #292424; font-weight:300;">Nhập thông tin cá nhân của bạn và bắt đầu cuộc hành trình với chúng tôi</p>
				<button class="ghost" id="signUp">Đăng ký</button>
			</div>
		</div>
	</div>
</div>
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
	<script src="{{ asset('user/js/login.js') }}"></script>
	
	{{-- Popup --}}
	<style>
		.error-popup {
			position: fixed;
			right: 20px;
			bottom: 100px;
			background-color: #ff0000;
			color: #fff;
			padding: 10px 20px;
			border-radius: 5px;
			animation: popupAnimation 0.5s ease-in-out;
	}

	@keyframes popupAnimation {
			0% { opacity: 0; transform: translateY(-20px); }
			100% { opacity: 1; transform: translateY(0); }
	}
	</style>

	<script>
		window.addEventListener('DOMContentLoaded', () => {
			const errorPopup = document.querySelector('.error-popup');
			if (errorPopup) {
				setTimeout(() => {
						errorPopup.style.display = 'none';
				}, 5000);
			}
		});
	</script>
	{{-- Popup --}}
@endsection

