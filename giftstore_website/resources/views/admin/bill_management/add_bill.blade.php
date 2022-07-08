@extends('admin_layout')
@section('admin_content')
 <div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Thêm Hóa Đơn Bán
            </header>
            <div class="panel-body">
                <div class="position-center">
                    <form role="form" action="/admin/save-bill" enctype="multipart/form-data" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">ID</label>
                            <input type="number" name="id" class="form-control" id="exampleInputEmail1">
                        </div> 
                        <div class="form-group">
                            <label for="exampleInputEmail1">ID Member</label>
                            <select name="id_member" class="form-control input-sm m-bot15">
                            @foreach($member as $key => $mem)
                                <option value="{{$mem->id}}">{{$mem->id}}</option>
                            @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Mã giảm giá</label>                            
                            <select  name="code_voucher" class="form-control input-sm m-bot15">
                                <option value="CODE5">CODE5</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tổng số lượng</label>
                            <input type="number" name="total_quantity" class="form-control" id="exampleInputEmail1">
                        </div> 
                        <div class="form-group">
                            <label for="exampleInputPassword1">Thành tiền</label>
                            <input type="text" name="total_price" class="form-control" id="exampleInputPassword1">
                        </div>
                        <div class="form-group">
                        	<label for="exampleInputPassword1">PT thanh toán</label>
                            <select  name="payment" class="form-control input-sm m-bot15">
                                <option value="Cast">Cast</option>
                                <option value="Debiy cards">Debit cards</option>
                                <option value="Credit cards">Credit cards</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Ngày mua</label>
                            <input type="datetime-local"class="form-control" id="exampleInputPassword1" name="date_order">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Ngày xác nhận</label>
                          <input type="datetime-local" name="date_confirm" class="form-control" id="exampleInputPassword1" >
                        </div>
                        <div class="form-group">
                        	<label for="exampleInputPassword1">Hiển thị</label>
                            <select  name="status" class="form-control input-sm m-bot15">
                                <option value="0">Ẩn</option>
                                <option value="1">Hiển thị</option>
                            </select>
                        </div>
                        <button type="submit" name="admin/save-bill" class="btn btn-info">Thêm hóa đơn bán</button>
                    </form>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection