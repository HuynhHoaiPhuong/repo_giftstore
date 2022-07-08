@extends('admin_layout')
@section('admin_content')
 <div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Thêm Hóa Đơn Nhập
            </header>
            <div class="panel-body">
                <div class="position-center">
                    <form role="form" action="/admin/save-bill-order" enctype="multipart/form-data" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">ID</label>
                            <input type="number" name="id" class="form-control" id="exampleInputEmail1">
                        </div> 
                        <div class="form-group">
                            <label for="exampleInputEmail1">ID Producer</label>
                            <select name="id_producer" class="form-control input-sm m-bot15">
                            @foreach($producer as $key => $prod)
                                <option value="{{$prod->id}}">{{$prod->id}}</option>
                            @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">ID User</label>
                            <select name="id_user" class="form-control input-sm m-bot15">
                            @foreach($user as $key => $us)
                                <option value="{{$us->id}}">{{$us->id}}</option>
                            @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">ID Stock</label>
                            <select name="id_stock" class="form-control input-sm m-bot15">
                            @foreach($stock as $key => $st)
                                <option value="{{$st->id}}">{{$st->id}}</option>
                            @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Số lượng</label>
                            <input type="number" name="quantity" class="form-control" id="exampleInputEmail1">
                        </div> 
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tổng tiền</label>
                            <input type="text" name="total_price" class="form-control" id="exampleInputPassword1">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Ngày mua</label>
                            <input type="datetime-local"class="form-control" id="exampleInputPassword1" name="date_order">
                        </div>
                        <div class="form-group">
                        	<label for="exampleInputPassword1">Hiển thị</label>
                            <select  name="status" class="form-control input-sm m-bot15">
                                <option value="0">Ẩn</option>
                                <option value="1">Hiển thị</option>
                            </select>
                        </div>
                        <button type="submit" name="admin/save-bill-order" class="btn btn-info">Thêm hóa đơn nhập</button>
                    </form>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection