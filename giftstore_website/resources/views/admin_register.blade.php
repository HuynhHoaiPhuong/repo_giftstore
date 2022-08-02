<!DOCTYPE html>
<head>
	<title>Trang quản lý Admin Web</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
	Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<!-- bootstrap-css -->
	<link rel="stylesheet" href="{{asset('admin/css/bootstrap.min.css')}}" >
	<!-- //bootstrap-css -->
	<!-- Custom CSS -->
	<link href="{{asset('admin/css/style.css')}}" rel='stylesheet' type='text/css' />
	<link href="{{asset('admin/css/style-responsive.css')}}" rel="stylesheet"/>
	<!-- font CSS -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
	<!-- font-awesome icons -->
	<link rel="stylesheet" href="{{asset('admin/css/font.css')}}" type="text/css"/>
	<link href="{{asset('admin/css/font-awesome.css')}}" rel="stylesheet"> 
	<!-- //font-awesome icons -->
	<script src="{{asset('js/jquery2.0.3.min.js')}}"></script>
</head>
<body>
	<div class="log-w3">
	<div class="w3layouts-main">
		<h2>Register</h2>
		@if(session('error'))
			<div class="alert alert-danger">
					{{session('success')}}
			</div>
		@endif
			<form action="{{route('save')}}" method="post">
				@csrf
				<input type="hidden" class="ggg" name="id_role" value="2">
				<input type="text" class="ggg" name="username" placeholder="Please Enter Username">
				<input type="password" class="ggg" name="password" placeholder="Please Enter Password" required="">
				<input type="password" class="ggg" name="confirm" placeholder="Please Confirm Password" required="">
				<input type="hidden" class="ggg" name="user_token">
				<input type="hidden" class="ggg" name="photo" >
        <input type="text" class="ggg" name="fullname" placeholder="Please Enter Fullname" required="">
        <input type="text" class="ggg" name="phone" placeholder="Please Enter Phone" required="">
        <input type="text" class="ggg" name="address" placeholder="Please Enter Address" required="">
        <input type="text" class="ggg" name="gender" placeholder="Please Enter Gender" required="">
        <input type="datetime-local" class="ggg" name="birthday" placeholder="Please Enter Birthday" required="">
        <div class="clearfix"></div>
        <input type="submit" value="Register" >
			</form>
			<p><a href="{{url('/admin/login')}}">Back to Login</a></p>
	</div>
	</div>
	<script src="{{asset('admin/js/bootstrap.js')}}"></script>
	<script src="{{asset('admin/js/jquery.dcjqaccordion.2.7.js')}}"></script>
	<script src="{{asset('admin/js/scripts.js')}}"></script>
	<script src="{{asset('admin/js/jquery.slimscroll.js')}}"></script>
	<script src="{{asset('admin/js/jquery.nicescroll.js')}}"></script>
	<script src="{{asset('admin/js/jquery.scrollTo.js')}}"></script>
	<script src="https://www.google.com/recaptcha/api.js" async defer></script>
</body>
</html>
