@extends('admin_layout')
@section('admin_content')
 <div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Thêm File Phương Tiện
            </header>
            <div class="panel-body">
                <div class="position-center">
                    <form role="form" action="" enctype="multipart/form-data" method="">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên file</label>
                            <input type="text" name="" class="form-control" id="exampleInputEmail1" placeholder="Tên file phương tiện">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Hình ảnh</label>
                            <input type="file" name="" class="form-control" id="exampleInputEmail1">
                        </div> 
                        <div class="form-group">
                            <label for="exampleInputPassword1">Liên kết</label>
                            <input type="text" name="" class="form-control" id="exampleInputPassword1">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Loại phương tiện</label>
                          <select  name="" class="form-control input-sm m-bot15">
                            <option value="0">Thumbnail</option>
                            <option value="1">Photo</option>
                            <option value="2">Video</option>
                          </select>
                      </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tác giả</label>
                            <input type="text" class="form-control" id="exampleInputPassword1">
                        </div>
                        <div class="form-group">
                        	<label for="exampleInputPassword1">Hiển thị</label>
                            <select  name="" class="form-control input-sm m-bot15">
                                <option value="0">Ẩn</option>
                                <option value="1">Hiển thị</option>
                            </select>
                        </div>
                        <button type="submit" name="" class="btn btn-info">Thêm file phương tiện</button>
                    </form>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection