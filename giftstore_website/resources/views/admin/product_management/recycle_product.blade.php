@extends('admin/admin_layout')

@section('title','Danh sách sản phẩm đã xóa')

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
    <div class="panel-heading">Danh sách sản phẩm đã xóa</div>
    <div class="row w3-res-tb">
      <div class="col-sm-5 m-b-xs">
        <a href="#" class="clearProduct btn btn-sm btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i> Xóa tất cả</a>          
        <a href="{{route('product-management')}}" class="btn btn-sm btn-info"><i class="fa fa-reply" aria-hidden="true"></i> Thoát</a>        
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
                <input type="checkbox">
              </label>
            </th>
            <th>STT</th>
            <th>Hình ảnh</th>
            <th>Tên</th>
            <th>Nhà sản xuất</th>
            <th>Danh mục</th>
            <th>Giá</th>
            <th>Thao tác</th>
          </tr>
        </thead>
        <tbody>
          @if($products != [])
          <?php $i = 1; ?>
          @foreach($products as $key => $product)
          <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"></label></td>
            <td>{{$i++}}</td>
            @if($product->photo != 'noimage.png' && $product->photo != '')
            <td><img src="../upload/product/{{ $product->photo }}" alt="{{$product->name}}" width="40"></td>
            @else
            <td><img src="../admin/images/noimage.png" alt="noimage.png" width="40"></td>
            @endif
            <td>{{$product->name}}</td>
            <td>{{$product->provider->name}}</td>
            <td>{{$product->category->name}}</td>
            <td>{{$product->price}}</td>
            <td>
              <a id="{{ $product->id_product }}" data-toggle="modal" data-target="#deleteProduct" href="#" class="deleteProduct active styling-edit">
                <i class="fa fa-times text-danger text"></i>
              </a>
              <a id="{{ $product->id_product }}" data-toggle="modal" data-target="#restoreProduct" href="#" class="restoreProduct active styling-edit">
                <i class="fa fa-repeat text-success text"></i>
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
    <footer class="panel-footer">
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
    </footer>
  </div>
</div>

<!-- /Modal Delete Product -->
<div class="modal fade" id="deleteProduct" tabindex="-1" role="dialog" aria-labelledby="deleteProduct" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteProduct">Xoá sản phẩm</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h5 class="font-weight-normal">Bạn có muốn xóa vĩnh viễn sản phẩm này không?</h5>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Huỷ bỏ</button>
                <button type="button" id="" class="btn_delete_product btn btn-primary">Đồng ý</button>
            </div>
        </div>
    </div>
</div>

<!-- /Modal Restore Product -->
<div class="modal fade" id="restoreProduct" tabindex="-1" role="dialog" aria-labelledby="restoreProduct" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="restoreProduct">Khôi phục sản phẩm</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h5 class="font-weight-normal">Bạn có muốn khôi phục sản phẩm này không?</h5>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Huỷ bỏ</button>
                <button type="button" id="" class="btn_restore_product btn btn-primary">Đồng ý</button>
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

        // Remove Product
      $('.deleteProduct').on('click', function() {
        $id_product = $(this).attr('id');
        $('.btn_delete_product').attr('id', $id_product);
      });
      $('.btn_delete_product').on('click', function() {
        $id_product = $(this).attr('id');
        $.ajax({
          type: 'POST',
          url: '/api/products/delete-product',
          data: {
              'id_product': $id_product,
          },
          success: function(data) {
              location.reload(false);
          },
          error: function() {

          }
        });
      });

      // Restore Product
      $('.restoreProduct').on('click', function() {
        $id_product = $(this).attr('id');
        $('.btn_restore_product').attr('id', $id_product);
      });
      $('.btn_restore_product').on('click', function() {
        $id_product = $(this).attr('id');
        $.ajax({
          type: 'POST',
          url: '/api/products/remove-product',
          data: {
              'id_product': $id_product,
              'status': 'enabled',
          },
          success: function(data) {
              location.reload(false);
          },
          error: function() {

          }
        });
      });

      // Remove all Product
      $('.clearProduct').on('click', function() {
        $.ajax({
            type: 'POST',
            url: '/api/products/clear-product',
            data: {
            },
            success: function(data) {
                location.reload(false);
            },
            error: function() {
            }
        });
      });
    });
  </script>
@endsection

