<!DOCTYPE html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Gift Store - @yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @yield('header')
</head>
<body>
    <section id="container">
        <!--header start-->
        <header class="header fixed-top clearfix">
        <!--logo start-->
        <div class="brand">
            <a href="" class="logo"> Gift Store</a>
            <div class="sidebar-toggle-box">
                <div class="fa fa-bars"></div>
            </div>
        </div>
        <!--logo end-->
        <div class="nav notify-row" id="top_menu">
            <!--  notification start -->
            <ul class="nav top-menu">
                <!-- settings start -->
                {{-- <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <i class="fa fa-tasks"></i>
                        <span class="badge bg-success">8</span>
                    </a>
                    <ul class="dropdown-menu extended tasks-bar">
                        <li>
                            <p class="">You have 8 pending tasks</p>
                        </li>
                        <li>
                            <a href="#">
                                <div class="task-info clearfix">
                                    <div class="desc pull-left">
                                        <h5>Target Sell</h5>
                                        <p>25% , Deadline  12 June’13</p>
                                    </div>
                                            <span class="notification-pie-chart pull-right" data-percent="45">
                                    <span class="percent"></span>
                                    </span>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div class="task-info clearfix">
                                    <div class="desc pull-left">
                                        <h5>Product Delivery</h5>
                                        <p>45% , Deadline  12 June’13</p>
                                    </div>
                                            <span class="notification-pie-chart pull-right" data-percent="78">
                                    <span class="percent"></span>
                                    </span>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div class="task-info clearfix">
                                    <div class="desc pull-left">
                                        <h5>Payment collection</h5>
                                        <p>87% , Deadline  12 June’13</p>
                                    </div>
                                            <span class="notification-pie-chart pull-right" data-percent="60">
                                    <span class="percent"></span>
                                    </span>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div class="task-info clearfix">
                                    <div class="desc pull-left">
                                        <h5>Target Sell</h5>
                                        <p>33% , Deadline  12 June’13</p>
                                    </div>
                                            <span class="notification-pie-chart pull-right" data-percent="90">
                                    <span class="percent"></span>
                                    </span>
                                </div>
                            </a>
                        </li>

                        <li class="external">
                            <a href="#">See All Tasks</a>
                        </li>
                    </ul>
                </li> --}}
                <!-- settings end -->
                <!-- inbox dropdown start-->
                {{-- <li id="header_inbox_bar" class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <i class="fa fa-envelope-o"></i>
                        <span class="badge bg-important">4</span>
                    </a>
                    <ul class="dropdown-menu extended inbox">
                        <li>
                            <p class="red">You have 4 Mails</p>
                        </li>
                        <li>
                            <a href="#">
                                <span class="photo"><img alt="avatar" src="{{asset('admin/images/3.png')}}"></span>
                                <span class="subject">
                                <span class="from">Jonathan Smith</span>
                                <span class="time">Just now</span>
                                </span>
                                <span class="message">
                                    Hello, this is an example msg.
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="photo"><img alt="avatar" src="{{asset('admin/images/1.png')}}"></span>
                                <span class="subject">
                                <span class="from">Jane Doe</span>
                                <span class="time">2 min ago</span>
                                </span>
                                <span class="message">
                                    Nice admin template
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="photo"><img alt="avatar" src="{{asset('admin/images/3.png')}}"></span>
                                <span class="subject">
                                <span class="from">Tasi sam</span>
                                <span class="time">2 days ago</span>
                                </span>
                                <span class="message">
                                    This is an example msg.
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="photo"><img alt="avatar" src="{{asset('admin/images/2.png')}}"></span>
                                <span class="subject">
                                <span class="from">Mr. Perfect</span>
                                <span class="time">2 hour ago</span>
                                </span>
                                <span class="message">
                                    Hi there, its a test
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="#">See all messages</a>
                        </li>
                    </ul>
                </li> --}}
                <!-- inbox dropdown end -->
                <!-- notification dropdown start-->
                <li id="header_notification_bar" class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">

                        <i class="fa fa-bell-o"></i>
                        <span class="badge bg-warning">3</span>
                    </a>
                    <ul class="dropdown-menu extended notification">
                        <li><p>Thông báo</p></li>
                        <li>
                            <div class="alert alert-info clearfix">
                                <span class="alert-icon"><i class="fa fa-bolt"></i></span>
                                <div class="noti-info">
                                    <a href="#"> Bạn có đơn hàng mới</a>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="alert alert-danger clearfix" style="display: flex;">
                                <span class="alert-icon"><i class="fa fa-bolt"></i></span>
                                <div class="noti-info" >
                                    <a href="#">Đơn hàng #B230708040115768 bị hủy </a>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="alert alert-success clearfix">
                                <span class="alert-icon"><i class="fa fa-bolt"></i></span>
                                <div class="noti-info">
                                    <a href="#"> Bạn có tin nhắn từ liên hệ mới</a>
                                </div>
                            </div>
                        </li>

                    </ul>
                </li>
                <!-- notification dropdown end -->
            </ul>
            <!--  notification end -->
        </div>
        <div class="top-nav clearfix">
            <!--search & user info start-->
            <ul class="nav pull-right top-menu">
                <li>
                    <a target="_blank" href="{{url('/')}}" class="form-control reply"><i class="fa fa-reply"></i></a>
                </li>
                <li>
                    <a href="{{route('logout')}}" class="form-control logout"><i class="fa fa-sign-out"></i></a>
                </li>
                <!-- user login dropdown start-->
                <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <img alt="" src="{{asset('admin/images/2.png')}}">
                        <span class="username">{{Auth::user()->fullname}}</span>
                        <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu extended logout">
                        <li><a href="#"><i class=" fa fa-suitcase"></i>Cá nhân</a></li>
                        <li><a href="#"><i class="fa fa-cog"></i> Cài đặt</a></li>
                    </ul>
                </li>
                <!-- user login dropdown end -->
               
            </ul>
            <!--search & user info end-->
        </div>
        </header>
        <!--header end-->
        <!--sidebar start-->
        <aside>
            <div id="sidebar" class="nav-collapse">
                <!-- sidebar menu start-->
                <div class="leftside-navigation">
                    <ul class="sidebar-menu" id="nav-accordion">
                        <li>
                            <a class="active" href="{{route('index')}}">
                                <i class="fa fa-dashboard"></i>
                                <span>Tổng quan</span>
                            </a>
                        </li>
                        {{-- <li class="sub-menu">
                            <a href="{{route('topic-management')}}">
                                <i class="fa fa-pencil-square-o"></i>
                                <span>Quản lý chủ đề</span>
                            </a>
                        </li> --}}
                        {{-- <li class="sub-menu">
                            <a href="{{route('photo-management')}}">
                                <i class="fa fa-picture-o"></i>
                                <span>Quản lý hình ảnh</span>
                            </a>
                        </li> --}}
                        <li class="sub-menu">
                            <a href="javascript:;">
                                <i class="fa fa-users"></i>
                                <span>Quản lý tài khoản</span>
                            </a>
                            <ul class="sub">
                                <li><a href="{{route('role-management')}}">Nhóm quyền</a></li>
                                {{-- <li><a href="#">Tài khoản admin</a></li> --}}
                                <li><a href="{{route('member-management')}}">Tài khoản thành viên</a></li>
                            </ul>
                        </li>
                        <li class="sub-menu">
                            <a href="javascript:;">
                                <i class="fa fa-trophy"></i>
                                <span>Quản lý xếp hạng</span>
                            </a>
                            <ul class="sub">
                                <li><a href="{{route('rank-management')}}">Xếp hạng thành viên</a></li>
                                {{--<li><a href="{{route('discount-management')}}">Giảm giá theo thể loại</a></li>--}}
                            </ul>
                        </li>
                        <li class="sub-menu">
                            <a href="javascript:;">
                                <i class="fa fa-dropbox"></i>
                                <span>Group sản phẩm</span>
                            </a>
                            <ul class="sub">
                                <li><a href="{{route('provider-management')}}">Quản lý nhà cung cấp</a></li>
                                <li><a href="{{route('type-category-management')}}">Quản lý loại danh mục</a></li>
                                <li><a href="{{route('category-management')}}">Quản lý danh mục sản phẩm</a></li>
                                <li><a href="{{route('product-management')}}">Quản lý sản phẩm</a></li>
                            </ul>
                        </li>
                        <li class="sub-menu">
                            <a href="{{route('payment-management')}}">
                                <i class="fa fa-credit-card"></i>
                                <span>Quản lý phương thức thanh toán</span>
                            </a>
                        </li>

                        <li class="sub-menu">
                            <a href="{{route('voucher-management')}}">
                                <i class="fa fa-ticket"></i>
                                <span>Quản lý ưu đãi</span>
                            </a>
                        </li>
                        <li class="sub-menu">
                            <a href="{{route('bill-management')}}">
                                <i class="fa fa-file-text-o"></i>
                                <span>Quản lý hóa đơn bán</span>
                            </a>
                        </li>
                        <li class="sub-menu">
                            <a href="javascript:;">
                                <i class="fa fa-object-group"></i>
                                <span>Quản lý nhập hàng</span>
                            </a>
                            <ul class="sub">
                                <li><a href="{{route('add-bill-order-management')}}">Nhập hàng</a></li>
                                <li><a href="{{route('bill-order-management')}}">Hóa đơn nhập</a></li>
                            </ul>
                        </li>
                        <li class="sub-menu">
                            <a href="{{route('warehouse-management')}}">
                                <i class="fa fa-archive"></i>
                                <span>Quản lý kho</span>
                            </a>
                        </li>
                        <li class="sub-menu">
                            <a href="{{route('setting-management')}}">
                                <i class="fa fa-cog"></i>
                                <span>Cài đặt</span>
                            </a>
                        </li>
                    </ul>            
                </div>
                <!-- sidebar menu end-->
            </div>
        </aside>
        <!--sidebar end-->

        <section id="main-content">
            <section class="wrapper">
                @yield('admin_content')
            </section>
            <!-- footer -->
            <div class="footer">
                <div class="wthree-copyright">
                    <p>© 2023 Copyright Gift Store. Designed by B17P19</p>
                </div>
            </div>
            <!-- / footer -->
        </section>
        <!--main content end-->
    </section>
    @yield('java-script')
</body>
</html>