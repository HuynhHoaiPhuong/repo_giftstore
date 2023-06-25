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
  <script src="{{asset('admin/js/jquery.scrollTo.js')}}"></script>
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
          
        
      });
      </script>
@endsection
