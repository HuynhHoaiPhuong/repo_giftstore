@extends('admin/admin_layout')

@section('title','Quản lý hình ảnh')

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
    <div class="panel-heading">
      Danh sách hình ảnh
    </div>
    <div class="row w3-res-tb">
      <div class="col-sm-5 m-b-xs">
        {{--<select class="input-sm form-control w-sm inline v-middle">
          <option value="0">Bulk action</option>
          <option value="1">Delete selected</option>
          <option value="2">Bulk edit</option>
          <option value="3">Export</option>
        </select>
        <button class="btn btn-sm btn-success">Apply</button>  
        <a href="" class="btn btn-sm btn-primary">Add</a>--}}
      </div>
      <div class="col-sm-4">
      </div>
      <div class="col-sm-3">
        {{--<div class="input-group">
          <input type="text" class="input-sm form-control" placeholder="Search">
          <span class="input-group-btn">
            <button class="btn btn-sm btn-default" type="button">Go!</button>
          </span>
        </div>--}}
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
            <th>ID</th>
            <th>Tên</th>
            <th>Hình ảnh</th>
            <th>Liên kết</th>
            <th>Loại</th>
            <th>Trạng thái</th>
            <th>Thao tác</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
        @if($photos != [])
          @foreach($photos as $i => $photo)
          <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"></label></td>
            <td>{{ ++$i }}</td>
            <td>{{ $photo->id_photo }}</td>
            <td>{{ $photo->name }}</td>
            <td>{{ $photo->photo }}</td>
            <td>{{ $photo->link }}</td>
            <td>{{ $photo->type }}</td>
            <td>{{ $photo->status }}</td>
            <td>
              <a href="" class="active styling-edit" ui-toggle-class="">
                <i class="fa fa-pencil-square-o text-success text-active"></i>
              </a>
              <a onclick="return confirm('Bạn có chắc chắn muốn xóa không?')" href="" class="active styling-edit" ui-toggle-class="">
                <i class="fa fa-times text-danger text"></i>
              </a>
            </td>
            <td></td>
          </tr>
          @endforeach
          @else
              <tr class="odd "><td valign="top" colspan="12" class="text-center dataTables_empty">Danh sách trống</td></tr>
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
            <li><a href="">2</a></li>
            <li><a href="">3</a></li>
            <li><a href="">4</a></li>
            <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
          </ul>
        </div>
      </div>
    </footer>--}}
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

