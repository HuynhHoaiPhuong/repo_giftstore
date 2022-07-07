@extends('admin_layout')
@section('admin_content')
 <div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Thêm sản phẩm
            </header>
            <div class="panel-body">
                <div class="position-center">
                    <form role="form" action="" enctype="multipart/form-data" method="">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tiêu đề</label>
                            <input type="text" name="" class="form-control" id="exampleInputEmail1" placeholder="Nhập Tiêu đề">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Hình ảnh</label>
                            <input type="file" name="" class="form-control" id="exampleInputEmail1">
                        </div> 
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô tả</label>
                            <textarea style="resize: none;" rows="5" name="" class="form-control" id="exampleInputPassword1" placeholder="Mô tả bài viết"></textarea> 
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Nội dung</label>
                          <textarea style="resize: none;" rows="5" name="" class="form-control" id="exampleInputPassword1" placeholder="Nội dung bài viết"></textarea> 
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Loại</label>
                            <select  name="" class="form-control input-sm m-bot15">
                              <option value="">1</option>
                              <option value="">2</option>
                              <option value="">3</option>
                            </select>
                        </div>
                        <div class="form-group">
                        	<label for="exampleInputPassword1">Hiển thị</label>
                            <select  name="" class="form-control input-sm m-bot15">
                                <option value="0">Ẩn</option>
                                <option value="1">Hiển thị</option>
                            </select>
                        </div>
                        <button type="submit" name="" class="btn btn-info">Thêm bài viết</button>
                    </form>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection