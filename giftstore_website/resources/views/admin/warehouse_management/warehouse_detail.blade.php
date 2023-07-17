@extends('admin/admin_layout')

@section('title','Quản lý chi tiết kho')

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

  <!-- Message error css -->
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

  <script src="{{asset('admin/js/jquery2.0.3.min.js')}}"></script>
  <script src="{{asset('admin/js/raphael-min.js')}}"></script>
  <script src="{{asset('admin/js/morris.js')}}"></script>
@endsection

@section('admin_content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      @if($warehouseDetails != [])
      <span>{{$warehouseDetails[0]->warehouse->name}}</span>
      @endif
    </div>
    <div class="row w3-res-tb">
      <div class="col-sm-5 m-b-xs">
        <a href="{{route('warehouse-management')}}" class="btn btn-sm btn-info"><i class="fa fa-reply" aria-hidden="true"></i> Thoát</a>
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
            <th>Kho</th>
            <th>Tên sản phẩm</th>
            <th>Số lượng</th>
            <th>Giá bán</th>
            <th>Tổng giá</th>
            <th>Trạng thái</th>
            <th>Thao tác</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
        @if($warehouseDetails != [])
          @foreach($warehouseDetails as $i => $warehouseDetail)
          <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"></label></td>
            <td>{{ ++$i }}</td>
            <td>{{ $warehouseDetail->warehouse->name }}</td>
            <td>{{ $warehouseDetail->product->name }}</td>
            <td>{{ $warehouseDetail->quantity }}</td>
            <td>{{ number_format($warehouseDetail->price_pay, 0, ',','.')}}đ</td>
            <td>{{ number_format($warehouseDetail->quantity*$warehouseDetail->price_pay, 0, ',','.')}}đ</td>
            <td>{{ ($warehouseDetail->status == 'enabled') ? 'Còn hàng' : 'Hết hàng' }}</td>
            <td>
              <a data-id="{{ $warehouseDetail->id_warehouse_detail }}" data-toggle="modal" data-target="#updateWarehouseDetail" href="#" class="updateWarehouseDetail active styling-edit" title="Chỉnh sửa">
                <i class="fa fa-pencil-square-o text-success text-active"></i>
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
    {{-- <footer class="panel-footer">
      <div class="row">
        <div class="col-sm-5 text-center">
        </div>
        <div class="col-sm-7 text-right text-center-xs">    

          @include('admin.pagination-component')

        </div>
      </div>
    </footer> --}}
  </div>
</div>

<!-- /Modal update WarehouseDetail -->
<div class="modal fade" id="updateWarehouseDetail" tabindex="-1" role="dialog" aria-labelledby="updateWarehouseDetail" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h6 class="modal-title text-white text-uppercase" id="exampleModalPopoversLabel"><strong>Cập nhật giá bán</strong></h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('update-warehouse-detail')}}" method="POST">
                    @csrf
                    <input type="hidden" name="id_warehouse_detail" id="inputUpdateIdWarehouseDetail">
                    <input type="hidden" name="id_warehouse" id="inputUpdateIdWarehouse" >
                    <input type="hidden" name="quantity" id="inputUpdateQuantityWarehouseDetail">
                    <input type="hidden" name="total_price_old" id="inputUpdateTotalPriceOldWarehouseDetail">
                    <input type="hidden" name="price_old" id="inputUpdatePriceOldWarehouseDetail">
                    <div class="form-group">
                        <label for="inputUpdatePricePayWarehouseDetail">Giá bán ra</label>
                        <input type="number" placeholder="Giá bán ra" name="price_pay"
                            id="inputUpdatePricePayWarehouseDetail" class="form-control text-sm">
                    </div>
                    <div class="form-group">
                        <button class="btn_submit_update_warehouse_detail btn btn-primary btn-block mr-10" type="submit">Lưu</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@if(session('error'))
    <div class="error-popup">
        <span class="error-message">{{ session('error') }}</span>
    </div>
@endif

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
      number_format = function(number, decimals, dec_point, thousands_sep) {
        number = number.toFixed(decimals);

        var nstr = number.toString();
        nstr += '';
        x = nstr.split('.');
        x1 = x[0];
        x2 = x.length > 1 ? dec_point + x[1] : '';
        var rgx = /(\d+)(\d{3})/;

        while (rgx.test(x1))
            x1 = x1.replace(rgx, '$1' + thousands_sep + '$2');

        return x1 + x2;
      }
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

      // Update WarehouseDetail
      $('.updateWarehouseDetail').on('click', function() {
        $id_warehouse_detail = $(this).attr('data-id');
        $.ajax({
            type: 'GET',
            url: '/api/warehouse-details/get-warehouse-detail-by-id/' + $id_warehouse_detail,
            success: function(data) {
                $warehouseDetail = data.data;

                $('#updateWarehouseDetail #inputUpdateIdWarehouseDetail').val($warehouseDetail.id_warehouse_detail);

                $('#updateWarehouseDetail #inputUpdateIdWarehouse').val($warehouseDetail.warehouse.id_warehouse);

                $('#updateWarehouseDetail #inputUpdatePricePayWarehouseDetail').val($warehouseDetail.price_pay);

                $('#updateWarehouseDetail #inputUpdatePriceOldWarehouseDetail').val($warehouseDetail.price_pay);

                $('#updateWarehouseDetail #inputUpdateQuantityWarehouseDetail').val($warehouseDetail.quantity);

                $('#updateWarehouseDetail #inputUpdateTotalPriceOldWarehouseDetail').val($warehouseDetail.total_price);

            },
            error: function() {

            }
        });
      });
    });
  </script>
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
@endsection

