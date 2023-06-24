@extends('admin/admin_layout')

@section('title','Thêm sản phẩm')

@section('header')
  <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
  <!-- bootstrap-css -->
  <link rel="stylesheet" href="{{asset('admin/css/bootstrap.min.css')}}" >

  <!-- Custom CSS -->
  <link href="{{asset('admin/css/style.css')}}" rel='stylesheet' type='text/css' />
  <link href="{{asset('admin/css/style-responsive.css')}}" rel="stylesheet"/>

  <!-- Font-Awesome-->
  <link rel="stylesheet" href="{{asset('admin/css/font.css')}}" type="text/css"/>
  <link href="{{asset('admin/css/font-awesome.css')}}" rel="stylesheet"> 

  <link rel="stylesheet" href="{{asset('admin/css/morris.css')}}" type="text/css"/>
  <link rel="stylesheet" href="{{asset('admin/css/monthly.css')}}">

  <!-- Fonts -->
  <link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

  <script src="{{asset('admin/js/jquery2.0.3.min.js')}}"></script>
  <script src="{{asset('admin/js/raphael-min.js')}}"></script>
  <script src="{{asset('admin/js/morris.js')}}"></script>
@endsection

@section('admin_content')
 <div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">Thêm sản phẩm</header>
            <div class="panel-body">
                <div class="position-center">
                    <form action="{{route('add-product')}}" id="addProductForm" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="addPhotoProduct">Hình ảnh</label>
                            <input type="file" name="photo" class="form-control" id="addPhotoProduct">
                        </div>
                        <div class="form-group">
                            <label for="addSlugProduct">Đường dẫn</label>
                            <input type="text" name="slug" class="form-control" id="addSlugProduct" placeholder="Đường dẫn">
                        </div>
                        <div class="form-group">
                            <label for="addNameProduct">Tên</label>
                            <input type="text" name="name" class="form-control" id="addNameProduct" placeholder="Tên sản phẩm">
                        </div>
                        
                        <div class="form-group">
                            <label for="addIdProviderProduct">Nhà cung cấp</label>
                            <select id="addIdProviderProduct" name="id_provider" class="form-control">
                                @foreach($providers as $key => $pvd)
                                    <option value="{{$pvd->id_provider}}">{{$pvd->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="addCategoryProduct">Danh mục sản phẩm</label>
                            <select  id="addCategoryProduct" name="id_category" class="form-control">
                                @foreach($categories as $key => $category)
                                    <option value="{{$category->id_category}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                          <label for="addPriceProduct">Giá</label>
                          <input type="number" name="price" class="form-control" id="addPriceProduct">
                        </div>
                        <div class="form-group">
                            <label for="addDescProduct">Mô tả</label>
                            <textarea style="resize: none;" rows="5" name="description" class="form-control" id="addDescProduct" placeholder="Mô tả sản phẩm"></textarea> 
                        </div>
                        <button type="submit" class="btn btn-info" {{($categories != [] && $providers != []) ? '' : 'disabled' }}>Lưu</button>
                    </form>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection

<!-- JavaScript -->
@section('java-script')
  <script src="{{asset('admin/js/bootstrap.js')}}"></script>
  <script src="{{asset('admin/js/jquery.dcjqaccordion.2.7.js')}}"></script>
  <script src="{{asset('admin/js/scripts.js')}}"></script>
  <script src="{{asset('admin/js/jquery.slimscroll.js')}}"></script>
  <script src="{{asset('admin/js/jquery.nicescroll.js')}}"></script>
  <!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
  <script src="{{asset('js/jquery.scrollTo.js')}}"></script>
  <!-- morris JavaScript -->  
  <script>
      $(document).ready(function() {
          //BOX BUTTON SHOW AND CLOSE
        jQuery('.small-graph-box').hover(function() {
            jQuery(this).find('.box-button').fadeIn('fast');
        }, function() {
            jQuery(this).find('.box-button').fadeOut('fast');
        });
        jQuery('.small-graph-box .box-close').click(function() {
            jQuery(this).closest('.small-graph-box').fadeOut(200);
            return false;
        });
        
          //CHARTS
          function gd(year, day, month) {
              return new Date(year, month - 1, day).getTime();
          }
          
          graphArea2 = Morris.Area({
              element: 'hero-area',
              padding: 10,
          behaveLikeLine: true,
          gridEnabled: false,
          gridLineColor: '#dddddd',
          axes: true,
          resize: true,
          smooth:true,
          pointSize: 0,
          lineWidth: 0,
          fillOpacity:0.85,
              data: [
                  {period: '2015 Q1', iphone: 2668, ipad: null, itouch: 2649},
                  {period: '2015 Q2', iphone: 15780, ipad: 13799, itouch: 12051},
                  {period: '2015 Q3', iphone: 12920, ipad: 10975, itouch: 9910},
                  {period: '2015 Q4', iphone: 8770, ipad: 6600, itouch: 6695},
                  {period: '2016 Q1', iphone: 10820, ipad: 10924, itouch: 12300},
                  {period: '2016 Q2', iphone: 9680, ipad: 9010, itouch: 7891},
                  {period: '2016 Q3', iphone: 4830, ipad: 3805, itouch: 1598},
                  {period: '2016 Q4', iphone: 15083, ipad: 8977, itouch: 5185},
                  {period: '2017 Q1', iphone: 10697, ipad: 4470, itouch: 2038},
              
              ],
              lineColors:['#eb6f6f','#926383','#eb6f6f'],
              xkey: 'period',
              redraw: true,
              ykeys: ['iphone', 'ipad', 'itouch'],
              labels: ['All Visitors', 'Returning Visitors', 'Unique Visitors'],
              pointSize: 2,
              hideHover: 'auto',
              resize: true
          });
          
        
      });
      </script>
  <!-- calendar -->
    <script type="text/javascript" src="{{asset('admin/js/monthly.js')}}"></script>
    <script type="text/javascript">
        $(window).load( function() {

            $('#mycalendar').monthly({
                mode: 'event',
                
            });

            $('#mycalendar2').monthly({
                mode: 'picker',
                target: '#mytarget',
                setWidth: '250px',
                startHidden: true,
                showTrigger: '#mytarget',
                stylePast: true,
                disablePast: true
            });

        switch(window.location.protocol) {
        case 'http:':
        case 'https:':
        // running on a server, should be good.
        break;
        case 'file:':
        alert('Just a heads-up, events will not work when run locally.');
        }

        });
    </script>
    <!-- //calendar -->
@endsection
