@extends('admin_layout')
@section('admin_content')
 <div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Cập Nhật Hóa Đơn Nhập
            </header>
            <div class="panel-body">
              @foreach($edit_bill_order as $key => $edit)
                <div class="position-center">
                    <form role="form" action="{{route('update-bill-order',$edit->id)}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label >Số lượng</label>
                            <input type="number" name="quantity" value="" class="form-control">
                        </div> 
                        <div class="form-group">
                            <label >Tổng tiền</label>
                            <input type="text" name="total_price" class="form-control">
                        </div>
                        <div class="form-group">
                            <label >Ngày nhập</label>
                            <input type="datetime-local" name="date_order" value="{{$edit->date_order}}" class="form-control" readonly="true">
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
                        <button type="submit" name="" class="btn btn-info">Cập nhật</button>
                    </form>
                </div>
              @endforeach
            </div>
        </section>
    </div>
</div>
@endsection