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
                            <label for="exampleInputEmail1">Title</label>
                            <input type="text" name="" class="form-control" id="exampleInputEmail1" placeholder="Nhập title">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Logo</label>
                            <input type="file" name="" class="form-control" id="exampleInputEmail1">
                        </div> 
                        <div class="form-group">
                          <label for="exampleInputEmail1">Địa chỉ</label>
                          <input type="text" name="" class="form-control" id="exampleInputEmail1">
                        </div> 
                        <div class="form-group">
                          <label for="exampleInputEmail1">Hotline</label>
                          <input type="number" name="" class="form-control" id="exampleInputEmail1">
                        </div> 
                        <div class="form-group">
                          <label for="exampleInputEmail1">Phone</label>
                          <input type="number" name="" class="form-control" id="exampleInputEmail1">
                        </div> 
                        <div class="form-group">
                          <label for="exampleInputEmail1">Email</label>
                          <input type="text" name="" class="form-control" id="exampleInputEmail1">
                        </div> 
                        <button type="submit" name="" class="btn btn-info">Cập nhật</button>
                    </form>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection