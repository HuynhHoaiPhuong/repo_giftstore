@extends('admin/admin_layout')

@section('title','Quản lý chi tiết hóa đơn')

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
      @if($billDetails != [])
      <span>Chi tiết hóa đơn của - <b style="text-transform: capitalize; ">{{$billDetails[0]->bill->member->user->fullname}}</b></span>
      @endif
    </div>
    <div class="row w3-res-tb">
      <div class="col-sm-5 m-b-xs">
        <a href="{{route('bill-management')}}" class="btn btn-sm btn-info"><i class="fa fa-reply" aria-hidden="true"></i> Quay về</a>
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
                <input type="checkbox">
              </label>
            </th>
            <th>STT</th>
            <th>Mã hóa đơn</th>
            <th>Sản phẩm</th>
            <th>Giảm giá</th>
            <th>Số lượng</th>
            <th>Thành tiền</th>
            <th>Đánh giá</th>
          </tr>
        </thead>
        <tbody>
            @if($billDetails != [])
            <?php $i = 1; ?>
            @foreach($billDetails as $key => $billDetail)
            <tr>
                <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"></label></td>
                <td>{{ $i++ }}</td>
                <td>{{ $billDetail->bill->id_bill }}</td>
                <td>{{ $billDetail->product->name }}</td>
                @if($billDetail->discount == null)
                  <td>0</td>
                @else
                <td>{{ $billDetail->discount->percent_price }}</td>
                @endif
                <td>{{ $billDetail->quantity}}</td>
                <td>{{ number_format($billDetail->total_price, 0, ',', '.') }} đ</td>
                <td>{{ $billDetail->rate_status }}</td>
            </tr>
            @endforeach
            @else
                <tr class="odd"><td valign="top" colspan="12" class="text-center dataTables_empty">Danh sách trống</td></tr>
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

