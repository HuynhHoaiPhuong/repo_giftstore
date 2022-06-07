@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
               Cập nhật thương hiệu sản phẩm
            </header>
             <?php
                $message = Session::get('message');
                if($message){
                    echo '<span class="text-alert">'.$message.'</span>';
                    Session::put('message',null);
                }
                ?>
            <div class="panel-body">
                @foreach($edit_product as $key => $pr)
                <div class="position-center">
                    <form role="form" action="/update-product/{{$pr->product_id}}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tên sản phẩm</label>
                        <input type="text" name="product_name" class="form-control" id="exampleInputEmail1" value="{{$pr->product_name}}">

                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Giá</label>
                        <input type="text" name="product_price" class="form-control" id="exampleInputEmail1" value="{{$pr->product_price}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Hình ảnh</label>
                        <input type="file" name="product_image" class="form-control" id="exampleInputEmail1">
                        <img src="/upload/product/{{$pr->product_image}}" height="100" width="100">
                    </div> 
                    <div class="form-group">
                        <label for="exampleInputPassword1">Mô tả sản phẩm</label>
                        <textarea style="resize: none;" rows="5" name="product_desc" class="form-control" id="exampleInputPassword1">{{$pr->product_desc}}</textarea> 
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Nội dung sản phẩm</label>
                        <textarea style="resize: none;" rows="5" name="product_content" class="form-control" id="exampleInputPassword1">{{$pr->product_content}}</textarea> 
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Hiển thị</label>
                        <select  name="product_status" class="form-control input-sm m-bot15">
                            <option value="0">Ẩn</option>
                            <option value="1">Hiển thị</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Danh mục sản phẩm</label>
                        <select  name="product_cate" class="form-control input-sm m-bot15">
                            @foreach($cate_product as $key => $c)
                                @if($c->category_id == $pr->category_id)
                                    <option selected value="{{$c->category_id}}">{{$c->category_name}}</option>
                                @else
                                    <option value="{{$c->category_id}}">{{$c->category_name}}</option>
                                @endif
                            @endforeach

                                
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Thương hiệu</label>
                        <select  name="product_brand" class="form-control input-sm m-bot15">
                            @foreach($brand_product as $key => $b)
                                @if($b->brand_id == $pr->brand_id)
                                    <option selected value="{{$b->brand_id}}">{{$b->brand_name}}</option>
                                @else
                                    <option value="{{$b->brand_id}}">{{$b->brand_name}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" name="update_product" class="btn btn-info">Cập nhật</button>
                    </form>
                </div>
                @endforeach 
            </div>
        </section>
    </div>
@endsection