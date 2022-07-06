@extends('admin_layout')
@section('admin_content')
 <div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Thêm thành viên
            </header>
            <div class="panel-body">
                <div class="position-center">
                    <form role="form" action="" enctype="multipart/form-data" method="">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">ID</label>
                            <input type="text" name="" class="form-control" id="exampleInputEmail1">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">User</label>
                          <input type="text" name="" class="form-control" id="exampleInputEmail1">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Rank</label>
                          <input type="text" name="" class="form-control" id="exampleInputEmail1">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Point</label>
                            <input type="number" style="resize: none;" class="form-control" id="exampleInputPassword1">
                        </div>
                        <div class="form-group">
                        	<label for="exampleInputPassword1">Hiển thị</label>
                            <select  name="" class="form-control input-sm m-bot15">
                                <option value="0">Ẩn</option>
                                <option value="1">Hiển thị</option>
                            </select>
                        </div>
                        <button type="submit" name="" class="btn btn-info">Thêm thành viên</button>
                    </form>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection