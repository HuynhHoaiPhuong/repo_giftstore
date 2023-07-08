@extends('admin/admin_layout')

@section('title','Quản lý nhà cung cấp')

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
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">Danh sách nhà cung cấp</div>
    <div class="row w3-res-tb">
      <div class="col-sm-5 m-b-xs">
        <a href="#" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#addProvider"><i class="fa fa-plus" aria-hidden="true"></i><strong>Thêm Mới</strong></a>           
      </div>
      <div class="col-sm-4">
      </div>
      <div class="col-sm-3">
        <div class="input-group">
          <input type="text" class="input-sm form-control" placeholder="Search">
          <span class="input-group-btn">
            <button class="btn btn-sm btn-default" type="button">Go!</button>
          </span>
        </div>
      </div>
    </div>
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th style="width:20px;">
              <label class="i-checks m-b-none">
                <input type="checkbox"><i></i>
              </label>
            </th>
            <th>STT</th>
            <th>Nhà cung cấp</th>
            <th>Địa chỉ</th>
            <th>Số điện thoại</th>
            <th>Email</th>
            <th>Thao tác</th>
          </tr>
        </thead>
        <tbody>
          @if($providers != [])
          <?php $i = 1; ?>
          @foreach($providers as $key => $provider)
          <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"></label></td>
            <td>{{$i++}}</td>
            <td>{{$provider->name}}</td>
            <td>{{$provider->address}}</td>
            <td>{{$provider->phone}}</td>
            <td>{{$provider->email}}</td>
            <td>
              <a href="" class="active styling-edit" ui-toggle-class="">
                <i class="fa fa-pencil-square-o text-success text-active"></i>
              </a>
              <a href="" onclick="return confirm('Bạn có chắc chắn muốn xóa không?')" class="active styling-edit" ui-toggle-class="">
                <i class="fa fa-times text-danger text"></i>
              </a>
            </td>
          </tr>
          @endforeach
          @else
              <tr class="odd "><td valign="top" colspan="6" class="text-center dataTables_empty">Chưa có dữ liệu</td></tr>
          @endif
        </tbody>
      </table>
    </div>
    {{--<footer class="panel-footer">
      <div class="row">
        <div class="col-sm-5 text-center">
          <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
        </div>
        <div class="col-sm-7 text-right text-center-xs">                
          <ul class="pagination pagination-sm m-t-none m-b-none">
            <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
            <li><a href="">1</a></li>
            <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
          </ul>
        </div>
      </div>
    </footer>--}}
  </div>
</div>

<!-- /Modal Add Provider -->
<div class="modal fade" id="addProvider" tabindex="-1" role="dialog" aria-labelledby="addProvider" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h5 class="modal-title text-white text-uppercase" id="exampleModalPopoversLabel" style="text-align:center;"><strong>Thêm nhà cung cấp</strong></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('add-provider')}}" id="addProviderForm" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="inputAddNameProvider">Tên</label>
                        <input type="text" placeholder="Tên nhà cung cấp" name="name" id="inputAddNameProvider" class="form-control" require>
                    </div>
                    <div class="form-group">
                        <label for="inputAddAddressProvider">Địa chỉ</label>
                        <input type="text" placeholder="Địa chỉ" name="address" id="inputAddAddressProvider" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="inputAddPhoneProvider">Số điện thoại</label>
                        <input type="phone" placeholder="Số điện thoại" name="phone" id="inputAddPhoneProvider" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="inputAddEmailProvider">Email</label>
                        <input type="email" placeholder="Email" name="email" id="inputAddEmailProvider" class="form-control">
                    </div>
                    <div class="form-group">
                        <button class="btn_submit_add_provider btn btn-primary btn-block mr-10" type="submit" >Lưu</button>
                    </div>
                </form>
            </div>
        </div>
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
