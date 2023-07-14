@extends('admin/admin_layout')

@section('title','Quản lý ưu đãi')

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
    <div class="panel-heading">Danh sách ưu đãi</div>
    <div class="row w3-res-tb">
      <div class="col-sm-5 m-b-xs">
        <a href="#" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#addVoucher"><i class="fa fa-plus" aria-hidden="true"></i><strong>Thêm Mới</strong></a>               
        <a href="{{route('recycle-voucher')}}" class="btn btn-sm btn-warning"><i class="fa fa-recycle" aria-hidden="true"></i> Thùng rác</a>               
      </div>
      <div class="col-sm-4">
      </div>
      <div class="col-sm-3">
        {{--<div class="input-group">
          <input type="text" class="input-sm form-control" placeholder="Search">
          <span class="input-group-btn">
            <button class="btn btn-sm btn-default" type="button">Tìm</button>
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
            <th>Tiêu đề</th>
            <th>Mã</th>
            <th>Phần trăm giảm</th>
            <th>Ngày bắt đầu</th>
            <th>Ngày kết thúc</th>
            <th>Thao tác</th>
          </tr>
        </thead>
        <tbody>
        @if($vouchers != [])
          @foreach($vouchers as $i => $voucher)
          <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"></label></td>
            <td>{{ ++$i }}</td>
            <td>{{ $voucher->name }}</td>
            <td>{{ $voucher->code }}</td>
            <td>{{ $voucher->percent_price }}%</td>
            <td>{{ $voucher->start_day }}</td>
            <td>{{ $voucher->expiration_date }}</td>
            <td>
              <a data-id="{{ $voucher->id_voucher }}" data-toggle="modal" data-target="#updateVoucher" href="#" class="updateVoucher active styling-edit" title="Chỉnh sửa">
                <i class="fa fa-pencil-square-o text-success text-active"></i>
              </a>
              <a id="{{ $voucher->id_voucher }}" data-toggle="modal" data-target="#deleteVoucher" href="#" class="removeVoucher active styling-edit" title="Xóa">
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

<!-- /Modal Add voucher -->
<div class="modal fade" id="addVoucher" tabindex="-1" role="dialog" aria-labelledby="addVoucher" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h5 class="modal-title text-center text-uppercase" id="exampleModalPopoversLabel"><strong>Thêm ưu đãi</strong></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('add-voucher')}}" method="POST">
                    @csrf
                    <div class="row">
                      <div class="form-group col-sm-6">
                          <label for="inputAddNameVoucher">Tiêu đề</label>
                          <input type="text" placeholder="Tiêu đề" name="name"
                              id="inputAddNameVoucher" class="form-control text-sm">
                      </div>
                      <div class="form-group col-sm-6">
                          <label for="inputAddCodeVoucher">Mã giảm giá</label>
                          <input type="text" placeholder="Mã giảm giá" name="code"
                              id="inputAddCodeVoucher" class="form-control text-sm">
                      </div>
                      <div class="form-group col-sm-6">
                          <label for="inputAddNumbVoucher">Số lượt dùng</label>
                          <input type="number" placeholder="Số lượt dùng" name="number_of_uses"
                            id="inputAddNumbVoucher" class="form-control text-sm">
                      </div>
                      <div class="form-group col-sm-6">
                          <label for="inputAddPercentVoucher">Phần trăm giảm(%)</label>
                          <input type="number" placeholder="Phần trăm giảm" name="percent_price"
                              id="inputAddPercentVoucher" class="form-control text-sm">
                      </div>
                      <div class="form-group col-sm-6">
                          <label for="inputAddMinPriceVoucher">Giảm tối thiểu</label>
                          <input type="text" placeholder="Giảm tối thiểu" name="min_price"
                            id="inputAddMinPriceVoucher" class="form-control text-sm">
                      </div>
                      <div class="form-group col-sm-6">
                          <label for="inputAddMaxPriceVoucher">Giảm tối đa</label>
                          <input type="text" placeholder="Giảm tối đa" name="max_price"
                              id="inputAddMaxPriceVoucher" class="form-control text-sm">
                      </div>
                      <div class="form-group col-sm-6">
                            <label for="inputAddDateStartVoucher">Ngày bắt đầu</label>
                            <input type="date" placeholder="Ngày bắt đầu" name="start_day"
                              id="inputAddDateStartVoucher" class="form-control text-sm">
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="inputAddDateEndVoucher">Ngày kết thúc</label>
                            <input type="date" placeholder="Ngày kết thúc" name="expiration_date"
                                id="inputAddDateEndVoucher" class="form-control text-sm">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputAddDescVoucher">Mô tả</label>
                        <textarea rows="4" cols="50" type="text" placeholder="Mô tả" name="description"
                            id="inputAddDescVoucher" class="form-control text-sm"></textarea>
                    </div>
                    <div class="form-group">
                        <button class="btn_submit_add_voucher btn btn-primary btn-block mr-10" type="submit">Lưu</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- /Modal update voucher -->
<div class="modal fade" id="updateVoucher" tabindex="-1" role="dialog" aria-labelledby="updateVoucher" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h6 class="modal-title text-white text-uppercase" id="exampleModalPopoversLabel"><strong>Chỉnh sửa thông tin</strong></h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('update-voucher')}}" method="POST">
                    @csrf
                    <input type="hidden" name="id_voucher" id="inputUpdateIdVoucher">
                    <div class="row">
                      <div class="form-group col-sm-6">
                          <label for="inputUpdateNameVoucher">Tiêu đề</label>
                          <input type="text" placeholder="Tiêu đề" name="name"
                              id="inputUpdateNameVoucher" class="form-control text-sm">
                      </div>
                      <div class="form-group col-sm-6">
                          <label for="inputUpdateCodeVoucher">Mã giảm giá</label>
                          <input type="text" placeholder="Mã giảm giá" name="code"
                              id="inputUpdateCodeVoucher" class="form-control text-sm">
                      </div>
                      <div class="form-group col-sm-6">
                          <label for="inputUpdateNumbVoucher">Số lượt dùng</label>
                          <input type="number" placeholder="Số lượt dùng" name="number_of_uses"
                            id="inputUpdateNumbVoucher" class="form-control text-sm">
                      </div>
                      <div class="form-group col-sm-6">
                          <label for="inputUpdatePercentVoucher">Phần trăm giảm(%)</label>
                          <input type="number" placeholder="Phần trăm giảm" name="percent_price"
                              id="inputUpdatePercentVoucher" class="form-control text-sm">
                      </div>
                      <div class="form-group col-sm-6">
                          <label for="inputUpdateMinPriceVoucher">Giảm tối thiểu</label>
                          <input type="text" placeholder="Giảm tối thiểu" name="min_price"
                            id="inputUpdateMinPriceVoucher" class="form-control text-sm">
                      </div>
                      <div class="form-group col-sm-6">
                          <label for="inputUpdateMaxPriceVoucher">Giảm tối đa</label>
                          <input type="text" placeholder="Giảm tối đa" name="max_price"
                              id="inputUpdateMaxPriceVoucher" class="form-control text-sm">
                      </div>
                      <div class="form-group col-sm-6">
                            <label for="inputUpdateDateStartVoucher">Ngày bắt đầu</label>
                            <input type="datetime-local"  name="start_day"
                              id="inputUpdateDateStartVoucher" class="form-control text-sm">
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="inputUpdateDateEndVoucher">Ngày kết thúc</label>
                            <input type="datetime-local" name="expiration_date"
                                id="inputUpdateDateEndVoucher" class="form-control text-sm">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputUpdateDescVoucher">Mô tả</label>
                        <textarea rows="4" cols="50" type="text" placeholder="Mô tả" name="description"
                            id="inputUpdateDescVoucher" class="form-control text-sm"></textarea>
                    </div>
                    <div class="form-group">
                        <button class="btn_submit_update_voucher btn-primary btn-block mr-10" type="submit">Lưu</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- /Modal Delete Voucher -->
<div class="modal fade" id="deleteVoucher" tabindex="-1" role="dialog" aria-labelledby="deleteVoucher" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteVoucher">Xoá ưu đãi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h5 class="font-weight-normal">Bạn có muốn chuyển ưu đãi này vào thùng rác không?</h5>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Huỷ bỏ</button>
                <button type="button" id="" class="btn_remove_voucher btn btn-primary">Đồng ý</button>
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

       // Remove Voucher
      $('.removeVoucher').on('click', function() {
        $id_voucher = $(this).attr('id');
        $('.btn_remove_voucher').attr('id', $id_voucher);
      });
      $('.btn_remove_voucher').on('click', function() {
          $id_voucher = $(this).attr('id');
          $.ajax({
              type: 'POST',
              url: '/api/vouchers/remove-voucher',
              data: {
                  'id_voucher': $id_voucher,
                  'status': 'disabled',
              },
              success: function(data) {
                  location.reload(false);
              },
              error: function() {

              }
          });
      });

      // Update Voucher
      $('.updateVoucher').on('click', function() {
        $id_voucher = $(this).attr('data-id');
        $.ajax({
            type: 'GET',
            url: '/api/vouchers/get-voucher-by-id/' + $id_voucher,
            success: function(data) {
                $voucher = data.data;

                $('#updateVoucher #inputUpdateIdVoucher').val($voucher.id_voucher);

                $('#updateVoucher #inputUpdateNameVoucher').val($voucher.name);

                $('#updateVoucher #inputUpdateCodeVoucher').val($voucher.code);

                $('#updateVoucher #inputUpdateNumbVoucher').val($voucher.number_of_uses);

                $('#updateVoucher #inputUpdatePercentVoucher').val($voucher.percent_price);

                $('#updateVoucher #inputUpdateMinPriceVoucher').val($voucher.min_price);

                $('#updateVoucher #inputUpdateMaxPriceVoucher').val($voucher.max_price);

                $('#updateVoucher #inputUpdateDateStartVoucher').val($voucher.start_day);

                $('#updateVoucher #inputUpdateDateEndVoucher').val($voucher.expiration_date);

                $('#updateVoucher #inputUpdateDescVoucher').val($voucher.description);

            },
            error: function() {

            }
        });
    });
  });
</script>
@endsection

