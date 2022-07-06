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
                    <form role="form" action="" enctype="multipart/form-data" method="">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Mã giảm giá</label>
                            <input type="text" name="" class="form-control" id="exampleInputEmail1" placeholder="nhập mã giảm giá">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Số lượng</label>
                            <input type="number" name="" class="form-control" id="exampleInputEmail1">
                        </div> 
                        <div class="form-group">
                            <label for="exampleInputPassword1">Thành tiền</label>
                            <input type="number" class="form-control" id="exampleInputPassword1">
                        </div>
                        <div class="form-group">
                        	<label for="exampleInputPassword1">PT thanh toán</label>
                            <select  name="" class="form-control input-sm m-bot15">
                                <option value="0">Tiền mặt</option>
                                <option value="1">Thẻ tín dụng</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Ngày mua</label>
                            <input type="datetime-local" style="resize: none;" class="form-control" id="exampleInputPassword1">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Ngày xác nhận</label>
                          <input type="datetime-local" style="resize: none;" class="form-control" id="exampleInputPassword1">
                        </div>
                        <div class="form-group">
                        	<label for="exampleInputPassword1">Hiển thị</label>
                            <select  name="" class="form-control input-sm m-bot15">
                                <option value="0">Ẩn</option>
                                <option value="1">Hiển thị</option>
                            </select>
                        </div>
                        <button type="submit" name="" class="btn btn-info">Thêm hóa đơn bán</button>
                    </form>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection