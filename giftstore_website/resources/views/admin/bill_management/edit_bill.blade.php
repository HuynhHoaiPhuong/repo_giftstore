@extends('admin_layout')
@section('admin_content')
 <div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Cập Nhật Hóa Đơn Bán
            </header>
            <div class="panel-body">
              @foreach($edit_bill as $key => $edit)
                <div class="position-center">
                    <form role="form" action="/admin/update-bill/{{$edit->id}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Mã giảm giá</label>                            
                            <select  name="code_voucher" class="form-control input-sm m-bot15">
                                <option value="CODE5">CODE5</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Tổng số lượng</label>
                            <input type="number" name="total_quantity" value="{{$edit->total_quantity}}" class="form-control">
                        </div> 
                        <div class="form-group">
                            <label>Thành tiền</label>
                            <input type="text" name="total_price" value="{{$edit->total_price}}" class="form-control" >
                        </div>
                        <div class="form-group">
                        	<label>PT thanh toán</label>
                            <select  name="payment" value="{{$edit->payment}}" class="form-control input-sm m-bot15">
                                <option value="cast">Cast</option>
                                <option value="debitcards">Debit cards</option>
                                <option value="creditcards">Credit cards</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Ngày mua</label>
                            <input type="datetime-local" name="date_order" value="{{$edit->date_order}}" class="form-control" >
                        </div>
                        <div class="form-group">
                          <label>Ngày xác nhận</label>
                          <input type="datetime-local" name="date_confirm" value="{{$edit->date_confirm}}" class="form-control">
                        </div>
                        <div class="form-group">
                        	<label>Hiển thị</label>
                            <select  name="status" value="{{$edit->status}}" class="form-control input-sm m-bot15">
                                <option value="an">Ẩn</option>
                                <option value="hienthi">Hiển thị</option>
                                <option value="noibat">Nổi bật</option>
                                <option value="moi">Mới</option>
                            </select>
                        </div>
                        <button type="submit" name="" class="btn btn-info">Cập nhật</button>
                    </form>
                </div>
              @endforeach
            </div>
        </section>
    </div>
</div>
@endsection