@extends('admin/admin_layout')

@section('title','Quản lý kho')

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
      Danh sách kho hàng
    </div>
    <div class="row w3-res-tb">
      <div class="col-sm-5 m-b-xs">
        {{--<a href="#" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#addWarehouse"><i class="fa fa-plus" aria-hidden="true"></i><strong>Thêm kho hàng</strong></a>--}}              
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
            <th>Tên</th>
            <th>Địa chỉ</th>
            <th>Trạng thái</th>
            <th>Thao tác</th>
          </tr>
        </thead>
        <tbody>
        @if($warehouses != [])
          @foreach($warehouses as $i => $warehouse)
          <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"></label></td>
            <td>{{ ++$i }}</td>
            <td>{{ $warehouse->name }}</td>
            <td>{{ $warehouse->address }}</td>
            <td>{{ ($warehouse->status == 'enabled') ? 'Đang hoạt động' : 'Ngừng hoạt động'  }}</td>
            <td>
              <a href="{{route('warehouse-detail-management',['id_warehouse'=>$warehouse->id_warehouse])}}" class="active styling-edit" title="Xem chi tiết kho">
                <i class="fa fa-eye text-primary text-active"></i>
              </a>
              <a data-id="{{ $warehouse->id_warehouse }}" data-toggle="modal" data-target="#updateWarehouse" href="#" class="updateWarehouse active styling-edit" title="Chỉnh sửa">
                <i class="fa fa-pencil-square-o text-success text-active"></i>
              </a>
              {{--<a onclick="return confirm('Bạn có chắc chắn muốn xóa không?')" href="" class="active styling-edit" title="Xóa">
                <i class="fa fa-times text-danger text"></i>
              </a>--}}
            </td>
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


<!-- /Modal update Warehouse -->
<div class="modal fade" id="updateWarehouse" tabindex="-1" role="dialog" aria-labelledby="updateWarehouse" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h6 class="modal-title text-white text-uppercase" id="exampleModalPopoversLabel"><strong>Chỉnh sửa thông tin</strong></h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('update-warehouse')}}" method="POST">
                    @csrf
                    <input type="hidden" name="id_warehouse" id="inputUpdateIdWarehouse">
                    <div class="form-group">
                        <label for="inputUpdateNameWarehouse">Tên kho</label>
                        <input type="text" placeholder="Tên kho" name="name"
                            id="inputUpdateNameWarehouse" class="form-control text-sm">
                    </div>
                    <div class="form-group">
                        <label for="inputUpdateAddressWarehouse">Địa chỉ kho</label>
                        <input type="text" placeholder="Địa chỉ kho" name="address"
                            id="inputUpdateAddressWarehouse" class="form-control text-sm">
                    </div>
                    <div class="form-group">
                        <button class="btn_submit_update_warehouse btn btn-primary btn-block mr-10" type="submit">Lưu</button>
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

        // Update Warehouse
      $('.updateWarehouse').on('click', function() {
        $id_warehouse = $(this).attr('data-id');
        $.ajax({
            type: 'GET',
            url: '/api/warehouses/get-warehouse-by-id/' + $id_warehouse,
            success: function(data) {
                $warehouse = data.data;

                $('#updateWarehouse #inputUpdateIdWarehouse').val($warehouse.id_warehouse);

                $('#updateWarehouse #inputUpdateNameWarehouse').val($warehouse.name);

                $('#updateWarehouse #inputUpdateAddressWarehouse').val($warehouse.address);

            },
            error: function() {

            }
        });
      });
    });
</script>
@endsection

