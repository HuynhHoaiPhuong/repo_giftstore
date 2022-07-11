{{-- @extends('admin_layout')
@section('admin_content')
 <div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Thêm Hóa Đơn Bán
            </header>
            <div class="panel-body">
                <div class="position-center">
                    <form role="form" action="/admin/save-bill" method="POST">
                        @csrf
                        <div class="form-group">
                            <label >ID Member</label>
                            <select name="id_member" class="form-control input-sm m-bot15">
                            @foreach($member as $key => $mem)
                                <option value="{{$mem->id}}">{{$mem->id}}</option>
                            @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label >Mã giảm giá</label>                            
                            <select  name="code_voucher" class="form-control input-sm m-bot15">
                                <option value="CODE5">CODE5</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label >Tổng số lượng</label>
                            <input type="number" name="total_quantity" class="form-control">
                        </div> 
                        <div class="form-group">
                            <label >Thành tiền</label>
                            <input type="text" name="total_price" class="form-control">
                        </div>
                        <div class="form-group">
                        	<label >PT thanh toán</label>
                            <select  name="payment" class="form-control input-sm m-bot15">
                                <option value="cast">Cast</option>
                                <option value="debitcards">Debit cards</option>
                                <option value="creditcards">Credit cards</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label >Ngày mua</label>
                            <input type="datetime-local" name="date_order" class="form-control">
                        </div>
                        <div class="form-group">
                          <label >Ngày nhận</label>
                          <input type="datetime-local" name="date_confirm" class="form-control">
                        </div>
                        <div class="form-group">
                        	<label >Hiển thị</label>
                            <select  name="status" class="form-control input-sm m-bot15">
                                <option value="an">Ẩn</option>
                                <option value="hienthi">Hiển thị</option>
                                <option value="noibat">Nổi bật</option>
                                <option value="moi">Mới</option>
                            </select>
                        </div>
                        <button type="submit" name="/admin/save-bill" class="btn btn-info">Thêm</button>
                    </form>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection --}}