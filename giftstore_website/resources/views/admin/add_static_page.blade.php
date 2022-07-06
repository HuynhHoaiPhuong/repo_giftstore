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
                            <label for="exampleInputEmail1">Tên sản phẩm</label>
                            <input type="text" name="" class="form-control" id="exampleInputEmail1" placeholder="Tên sản phẩm">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô tả sản phẩm</label>
                            <textarea style="resize: none;" rows="5" name="" class="form-control" id="exampleInputPassword1"></textarea> 
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Nội dung sản phẩm</label>
                          <textarea style="resize: none;" rows="5" name="" class="form-control" id="exampleInputPassword1"></textarea> 
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Loại</label>
                          <input type="text" name="" class="form-control" id="exampleInputEmail1">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Ngày Created</label>
                          <input type="datetime-local" name="" class="form-control" id="exampleInputEmail1">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Ngày Updated</label>
                          <input type="datetime-local" name="" class="form-control" id="exampleInputEmail1">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Hiển thị</label>
                            <select  name="" class="form-control input-sm m-bot15">
                                <option value="0">Ẩn</option>
                                <option value="1">Hiển thị</option>
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