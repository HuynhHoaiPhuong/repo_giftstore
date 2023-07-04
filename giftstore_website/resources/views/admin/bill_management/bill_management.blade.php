@extends('admin/admin_layout')

@section('title','Quản lý hóa đơn bán')

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
      <div class="panel-heading">Danh sách hóa đơn bán</div>
      <div class="row w3-res-tb">
        <div class="col-sm-5 m-b-xs">
          <select class="input-sm form-control w-sm inline v-middle">
            <option value="0">Theo ngày</option>
            <option value="1">Mới nhất</option>
          </select>
          <button class="btn btn-sm btn-success">Apply</button>  
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
              <th>Tên KH</th>
              <th>Mã giảm giá</th>
              <th>PTTT</th>
              <th>Tổng tiền</th>
              <th>Tổng số lượng</th>
              <th>Ngày đặt</th>
              <th>Ngày thanh toán</th>
              <th>Trạng thái</th>
              <th>Xem chi tiết</th>
            </tr>
          </thead>
          <tbody>
            <form action="">
              @csrf
              @if($bills != [])
              <?php $i = 1; ?>
              @foreach($bills as $key => $bill)
              <tr>
                <input type="hidden" value="{{$bill->id_bill}}">
                <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"></label></td>
                <td>{{$i++}}</td>
                <td>{{$bill->member->user->fullname}}</td>
                @if($bill->voucher == null)
                  <td>Không</td>
                @else
                  <td>{{$bill->voucher->name}}</td>
                @endif
                <td>{{$bill->payment->name}}</td>
                <td>{{number_format($bill->total_price, 0, ',', '.')}} đ</td>
                <td>{{$bill->total_quantity}}</td>
                <td>{{$bill->order_date}}</td>
                <td>{{$bill->date_of_payment}}</td>
                <td>
                  <select name="status" class="form-control updateBillStatus" data-id="{{$bill->id_bill}}" style="width: 100px;">
                    <option value="1" {{($bill->status == '1') ? 'selected' : '' }}>Chờ duyệt</option>
                    <option value="2" {{($bill->status == '2') ? 'selected' : '' }}>Đang giao</option>
                    <option value="3" {{($bill->status == '3') ? 'selected' : '' }}>Đã giao</option>
                    <option value="4" {{($bill->status == '4') ? 'selected' : '' }}>Đã hủy</option>
                  </select>
                </td>
                <td>
                  {{-- <a href="{{route('bill-detail-management', $bill->id_bill)}}" class="active styling-edit" title="Xem chi tiết hóa đơn"> --}}
                  <a href="{{route('bill-detail-management', ['id_bill' => $bill->id_bill])}}" class="active styling-edit">
                    <i class="fa fa-eye text-primary text-active"></i>
                  </a>
                </td>
              </tr>
              @endforeach
              @else
                  <tr class="odd"><td valign="top" colspan="6" class="text-center dataTables_empty">Chưa có dữ liệu</td></tr>
              @endif
            </form>
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
              <li><a href="">2</a></li>
              <li><a href="">3</a></li>
              <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
            </ul>
          </div>
        </div>
      </footer>
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

  <script>
    $(document).ready(function(){
      $('.updateBillStatus').on('change',function(){
        $id_bill = $(this).attr('data-id');
        $status = $(this).val();
        $.ajax({
          type: 'POST',
          url: '/api/bills/update-bill/',
          data: {
            id_bill : $id_bill,
            status: $status,
          },  
          success: function(data){
            if(data.data == true)
            alert('Cap nhat thanh cong!');
            else
            return alert('Cap nhat khong thanh cong!');
          }
        })
      });
    })
    
  </script>
@endsection

