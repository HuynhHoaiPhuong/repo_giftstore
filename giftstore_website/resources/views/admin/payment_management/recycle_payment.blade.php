@extends('admin/admin_layout')

@section('title','Thùng rác hình thức thanh toán')

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
      Danh sách các phương thức hỗ trợ
    </div>
    <div class="row w3-res-tb">
      <div class="col-sm-5 m-b-xs">   
        <!-- <a href="#" class="clearPayment btn btn-sm btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i> Xóa tất cả</a>           -->
        <a href="{{route('payment-management')}}" class="btn btn-sm btn-info"><i class="fa fa-reply" aria-hidden="true"></i> Thoát</a>
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
            <th>Hình ảnh</th>
            <th>Tên</th>
            <th>Ngày tạo</th>
            <th>Ngày cập nhật</th>
            <th>Thao tác</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          @if($payments != [])
          @foreach($payments as $i => $payment)
          <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"></label></td>
            <td>{{ ++$i }}</td>
            @if($payment->photo != 'noimage.png' && $payment->photo != '')
            <td><img src="../upload/payment/{{ $payment->photo }}" alt="{{$payment->name}}" width="40"></td>
            @else
            <td><img src="../admin/images/noimage.png" alt="noimage.png" width="40"></td>
            @endif
            <td>{{ $payment->name }}</td>
            <td>{{ $payment->created_at }}</td>
            <td>{{ $payment->updated_at }}</td>
            <td>
              <!-- <a id="{{ $payment->id_payment }}" data-toggle="modal" data-target="#deletePayment" href="#" class="deletePayment active styling-edit">
                <i class="fa fa-times text-danger text"></i>
              </a> -->
              <a id="{{ $payment->id_payment }}" title="Khôi phục" data-toggle="modal" data-target="#restorePayment" href="#" class="restorePayment active styling-edit">
                <i class="fa fa-repeat text-success text"></i>
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
      <div class="row m-b-3">
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

<!-- /Modal Delete Payment -->
<div class="modal fade" id="deletePayment" tabindex="-1" role="dialog" aria-labelledby="deletePayment" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deletePayment">Xoá hình thức thanh toán</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h5 class="font-weight-normal">Bạn có muốn xóa vĩnh viễn hình thức thanh toán này không?</h5>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Huỷ bỏ</button>
                <button type="button" id="" class="btn_delete_payment btn btn-primary">Đồng ý</button>
            </div>
        </div>
    </div>
</div>

<!-- /Modal Restore Payment -->
<div class="modal fade" id="restorePayment" tabindex="-1" role="dialog" aria-labelledby="restorePayment" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="restorePayment">Khôi phục hình thức thanh toán</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h5 class="font-weight-normal">Bạn có muốn khôi phục hình thức thanh toán này không?</h5>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Huỷ bỏ</button>
                <button type="button" id="" class="btn_restore_payment btn btn-primary">Đồng ý</button>
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

      // Remove Payment
      $('.deletePayment').on('click', function() {
        $id_payment = $(this).attr('id');
        $('.btn_delete_payment').attr('id', $id_payment);
      });
      $('.btn_delete_payment').on('click', function() {
          $id_payment = $(this).attr('id');
          $.ajax({
              type: 'POST',
              url: '/api/payments/delete-payment',
              data: {
                  'id_payment': $id_payment,
              },
              success: function(data) {
                  location.reload(false);
              },
              error: function() {

              }
          });
      });

      // Restore Payment
      $('.restorePayment').on('click', function() {
        $id_payment = $(this).attr('id');
        $('.btn_restore_payment').attr('id', $id_payment);
      });
      $('.btn_restore_payment').on('click', function() {
          $id_payment = $(this).attr('id');
          $.ajax({
              type: 'POST',
              url: '/api/payments/remove-payment',
              data: {
                  'id_payment': $id_payment,
                  'status': 'enabled',
              },
              success: function(data) {
                  location.reload(false);
              },
              error: function() {

              }
          });
      });

      // Remove all payment
      $('.clearPayment').on('click', function() {
          $.ajax({
              type: 'POST',
              url: '/api/payments/clear-payment',
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

