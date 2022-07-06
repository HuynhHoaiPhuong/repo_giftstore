@extends('admin_layout')
@section('admin_content')
 <div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Thêm Danh Mục Danh Sách Sản Phẩm
            </header>
            <div class="panel-body">
                <div class="position-center">
                    <form role="form" action="" enctype="multipart/form-data" method="">
                        @csrf
                        <div class="form-group">
                          <label for="exampleInputPassword1">ID</label>
                          <input type="text"class="form-control" id="exampleInputPassword1">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Numb</label>
                          <input type="text"class="form-control" id="exampleInputPassword1">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Hình ảnh</label>
                            <input type="file" name="" class="form-control" id="exampleInputEmail1">
                        </div> 
                        <div class="form-group">
                          <label for="exampleInputEmail1">Tên danh mục</label>
                          <input type="text" name="" class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô tả danh mục</label>
                            <textarea style="resize: none;" rows="5" name="" class="form-control" id="exampleInputPassword1" placeholder="Mô tả danh mục"></textarea> 
                        </div>
                        <div class="form-group">
                        	<label for="exampleInputPassword1">Hiển thị</label>
                            <select  name="" class="form-control input-sm m-bot15">
                                <option value="0">Ẩn</option>
                                <option value="1">Hiển thị</option>
                            </select>
                        </div>
                        <button type="submit" name="" class="btn btn-info">Thêm danh mục</button>
                    </form>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection