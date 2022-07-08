@extends('admin_layout')
@section('admin_content')
 <div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Thêm hạng
            </header>
            <div class="panel-body">
                <div class="position-center">
                    <form role="form" action="/admin/save-rank/" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Tên hạng</label>
                            <input type="text" name="name" class="form-control" >
                        </div>
                        <div class="form-group">
                          <label>Point</label>
                          <input type="number" name="point" class="form-control">
                        </div>
                        <div class="form-group">
                          <label>Ngày Created</label>
                          <input type="datetime-local" name="date_created" class="form-control">
                        </div>
                        <div class="form-group">
                          <label>Hiển thị</label>
                            <select  name="status" class="form-control input-sm m-bot15">
                                <option value="an">Ẩn</option>
                                <option value="hienthi">Hiển thị</option>
                                <option value="noibat">Nổi bật</option>
                                <option value="moi">Mới</option>
                            </select>
                        </div>
                        <button type="submit" name="" class="btn btn-info">Thêm</button>
                    </form>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection