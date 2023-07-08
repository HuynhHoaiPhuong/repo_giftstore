@extends('admin/admin_layout')

@section('title','Quản lý hình thức thanh toán')

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
    <div class="panel-heading">Danh sách phương thức thanh toán</div>
    <div class="row w3-res-tb">
      <div class="col-sm-5 m-b-xs">   
        <!-- <a href="#" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#addPayment"><i class="fa fa-plus" aria-hidden="true"></i><strong>Thêm Mới</strong></a>-->
        <!-- <a href="{{route('recycle-payment')}}" class="btn btn-sm btn-warning"><i class="fa fa-recycle" aria-hidden="true"></i> Thùng rác</a> -->
        <a href="{{route('recycle-payment')}}" class="btn btn-sm btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> Thêm mới</a>
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
            <th>Hình ảnh</th>
            <th>Tên</th>
            <th>Ngày tạo</th>
            <th>Ngày cập nhật</th>
            <th>Thao tác</th>
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
              @if($payment->id_payment != '230623030323634')
                <a data-id="{{ $payment->id_payment }}" data-toggle="modal" data-target="#updatePayment" href="#" class="updatePayment active styling-edit" title="Sửa">
                  <i class="fa fa-pencil-square-o text-success text-active"></i>
                </a>
                <a id="{{ $payment->id_payment }}" data-toggle="modal" data-target="#deletePayment" href="#" class="removePayment active styling-edit">
                  <i class="fa fa-times text-danger text"></i>
                </a>
              @endif
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

<!-- /Modal Add payment -->
<div class="modal fade" id="addPayment" tabindex="-1" role="dialog" aria-labelledby="addPayment" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h5 class="modal-title text-white text-uppercase" id="exampleModalPopoversLabel" style="text-align:center;"><strong>Thêm phương thức thanh toán</strong></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('add-payment')}}" id="addPaymentForm" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="inputAddNamePayment">Tên phương thức</label>
                        <input type="text" placeholder="Tên phương thức" name="name" id="inputAddNamePayment" class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="">Hình ảnh</label>
                      <input type="file" placeholder="Thêm tập tin" name="photo" id="inputAddPhotoPayment" class="form-control">
                    </div>
                    <div class="form-group">
                        <button class="btn_submit_add_payment btn-primary btn-block mr-10 btn-add" type="submit" style="width: auto; margin-left: auto; border: none; padding: 5px 15px 5px 15px;">Lưu</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- /Modal update payment -->
<div class="modal fade" id="updatePayment" tabindex="-1" role="dialog" aria-labelledby="updatePayment" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h5 class="modal-title text-white text-uppercase" id="exampleModalPopoversLabel"><strong>Chỉnh sửa thông tin</strong></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('update-payment')}}" id="updatePaymentForm" method="POST">
                    @csrf
                    <input type="hidden" name="id_payment" id="inputUpdatePaymentId">
                    <div class="form-group">
                        <label for="inputUpdatePaymentName">Tên phương thức</label>
                        <input type="text" placeholder="Tên phương thức" name="name" id="inputUpdatePaymentName" class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="inputUpdatePaymentPhoto">Hình ảnh</label>
                      <input type="file" placeholder="Thêm tập tin" name="photo" id="inputUpdatePaymentPhoto" class="form-control">
                    </div>
                    <div class="form-group">
                        <button class="btn_submit_update_payment btn-primary btn-block mr-10" type="submit" style="width: auto; margin-left: auto; border: none; padding: 5px 15px 5px 15px;">Lưu</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- /Modal Delete Payment -->
<div class="modal fade" id="deletePayment" tabindex="-1" role="dialog" aria-labelledby="deletePayment" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deletePayment">Tắt hình thức thanh toán</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h5 class="font-weight-normal">Bạn có muốn tắt hình thức thanh toán này không?</h5>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Huỷ bỏ</button>
                <button type="button" id="" class="btn_remove_payment btn btn-primary">Đồng ý</button>
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
      $('.removePayment').on('click', function() {
        $id_payment = $(this).attr('id');
        $('.btn_remove_payment').attr('id', $id_payment);
      });
      $('.btn_remove_payment').on('click', function() {
          $id_payment = $(this).attr('id');
          $.ajax({
              type: 'POST',
              url: '/api/payments/remove-payment',
              data: {
                  'id_payment': $id_payment,
                  'status': 'disabled',
              },
              success: function(data) {
                  location.reload(false);
              },
              error: function() {

              }
          });
      });

      // Update Payment
      $('.updatePayment').on('click', function() {
        $id_payment = $(this).attr('data-id');
        $.ajax({
            type: 'GET',
            url: '/api/payments/get-payment-by-id/' + $id_payment,
            success: function(data) {
                $payment = data.data;

                $('#updatePayment #inputUpdatePaymentId').val($payment.id_payment);

                $('#updatePayment #inputUpdatePaymentName').val($payment.name);

                $('#updatePayment #inputUpdatePaymentPhoto').val($payment.photo);
            },
        })
      });
  });
</script>
@endsection

