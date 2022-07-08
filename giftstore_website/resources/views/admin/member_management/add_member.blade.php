@extends('admin_layout')
@section('admin_content')
 <div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Thêm Mới Thành Viên
            </header>
            <div class="panel-body">
                <div class="position-center">
                    <form role="form" action="/admin/save-member" enctype="multipart/form-data" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">ID</label>
                            <input type="text" name="id" class="form-control" id="exampleInputEmail1">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">User</label>
                          <input type="text" name="id_user" class="form-control" id="exampleInputEmail1">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Rank</label>
                          <input type="text" name="id_rank" class="form-control" id="exampleInputEmail1">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Point</label>
                            <input name="point" type="number" style="resize: none;" class="form-control" id="exampleInputPassword1">
                        </div>
                        <div class="form-group">
                        	<label for="exampleInputPassword1">Hiển thị</label>
                            <select  name="status" class="form-control input-sm m-bot15">
                                <option value="Ẩn">Ẩn</option>
                                <option value="Hiển thị">Hiển thị</option>
                                <option value="Nổi bật">Nổi bật</option>
                                <option value="Mới">Mới</option>
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