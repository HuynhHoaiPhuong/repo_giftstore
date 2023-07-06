@extends('admin/admin_layout')

@section('title','Quản lý sản phẩm')

@section('header')
  <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
  <!-- bootstrap-css -->
  <link rel="stylesheet" href="{{asset('admin/css/bootstrap.min.css')}}" >

  <!-- Custom CSS -->
  <link href="{{asset('admin/css/style.css')}}" rel='stylesheet' type='text/css' />
  <link href="{{asset('admin/css/style-responsive.css')}}" rel="stylesheet"/>

  <!-- Font-Awesome-->
  <link rel="stylesheet" href="{{asset('admin/css/font.css')}}" type="text/css"/>
  <link href="{{asset('admin/css/font-awesome.css')}}" rel="stylesheet"> 

  <link rel="stylesheet" href="{{asset('admin/css/morris.css')}}" type="text/css"/>
  <link rel="stylesheet" href="{{asset('admin/css/monthly.css')}}">

  <!-- Fonts -->
  <link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

  <script src="{{asset('admin/js/jquery2.0.3.min.js')}}"></script>
  <script src="{{asset('admin/js/raphael-min.js')}}"></script>
  <script src="{{asset('admin/js/morris.js')}}"></script>
@endsection

@section('admin_content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">Danh sách sản phẩm</div>
    <div class="row w3-res-tb">
      <div class="col-sm-5 m-b-xs">
        <a href="{{route('add-product-management')}}" class="btn btn-sm btn-primary"><i class="fa fa-plus" aria-hidden="true"></i><strong>Thêm Mới</strong></a>        
        <a href="{{route('recycle-product')}}" class="btn btn-sm btn-warning"><i class="fa fa-recycle" aria-hidden="true"></i> Thùng rác</a>
      </div>
      <div class="col-sm-4">
      </div>
      <div class="col-sm-3">
        <div class="input-group">
          <input type="text" class="input-sm form-control" placeholder="Search">
          <span class="input-group-btn">
            <button class="btn btn-sm btn-default" type="button">Go!</button>
          </span>
        </div>
      </div>
    </div>
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th style="width:20px;">
              <label class="i-checks m-b-none">
                <input type="checkbox">
              </label>
            </th>
            <th>STT</th>
            <th>Hình ảnh</th>
            <th>Tên</th>
            <th>Nhà sản xuất</th>
            <th>Danh mục</th>
            <th>Giá</th>
            <th>Thao tác</th>
          </tr>
        </thead>
        <tbody>
          @if($products != [])
          <?php $i = 1; ?>
          @foreach($products as $key => $product)
          <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"></label></td>
            <td>{{$i++}}</td>
            @if($product->photo != 'noimage.png' && $product->photo != '')
            <td><img src="../upload/product/{{ $product->photo }}" alt="{{$product->name}}" width="40"></td>
            @else
            <td><img src="../admin/images/noimage.png" alt="noimage.png" width="40"></td>
            @endif
            <td>{{$product->name}}</td>
            <td>{{$product->provider->name}}</td>
            <td>{{$product->category->name}}</td>
            <td>{{$product->price}}</td>
            <td>
              <a data-id="{{ $product->id_product }}" data-toggle="modal" data-target="#updateProduct" href="#" class="updateProduct active styling-edit" title="Chỉnh sửa">
                <i class="fa fa-pencil-square-o text-success text-active"></i>
              </a>
              <a id="{{ $product->id_product }}" data-toggle="modal" data-target="#deleteProduct" href="#" class="removeProduct active styling-edit" title="Xóa">
                <i class="fa fa-times text-danger text"></i>
              </a>
            </td>
          </tr>
          @endforeach
          @else
              <tr class="odd "><td valign="top" colspan="12" class="text-center dataTables_empty">Chưa có dữ liệu</td></tr>
          @endif
        </tbody>
      </table>
    </div>
    <footer class="panel-footer">
      <div class="row">
        <div class="col-sm-5 text-center">
          <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
        </div>
        <div class="col-sm-7 text-right text-center-xs">                
          <ul class="pagination pagination-sm m-t-none m-b-none">
            <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
            <li><a href="">1</a></li>
            <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
          </ul>
        </div>
      </div>
    </footer>
  </div>
</div>

<!-- /Modal update Product -->
<div class="modal fade" id="updateProduct" tabindex="-1" role="dialog" aria-labelledby="updateProduct" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h5 class="modal-title  text-uppercase" id="exampleModalPopoversLabel"><strong>Chỉnh sửa thông tin</strong></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('update-product')}}" id="updateProductForm" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id_product" id="inputUpdateIdProduct">
                    <div class="row">
                      <div class="form-group col-sm-6">
                          <label for="inputUpdateIdProviderProduct">Nhà cung cấp</label>
                          <select id="inputUpdateIdProviderProduct" name="id_provider" class="form-control">
                            @if($providers != [])
                              @foreach($providers as $key => $pvd)
                                  <option class="pvd-{{$pvd->id_provider}}" value="{{$pvd->id_provider}}">{{$pvd->name}}</option>
                              @endforeach
                            @endif
                          </select>
                      </div>
                      <div class="form-group col-sm-6">
                          <label for="inputUpdateCategoryProduct">Danh mục sản phẩm</label>
                          <select  id="inputUpdateCategoryProduct" name="id_category" class="form-control">
                            @if($categories != [])
                              @foreach($categories as $key => $category)
                                  <option class="cat-{{$category->id_category}}" value="{{$category->id_category}}">{{$category->name}}</option>
                              @endforeach
                            @endif
                          </select>
                      </div>
                      <div class="form-group col-sm-6">
                          <label for="inputUpdatePhotoProduct">Hình ảnh</label>
                          <input type="file" name="photo" class="form-control" id="inputUpdatePhotoProduct">
                      </div>
                      <input type="hidden" name="photoCurrent" id="inputUpdatePhotoCurrentProduct">
                      <div class="form-group col-sm-6">
                          <label for="inputUpdateSlugProduct">Đường dẫn</label>
                          <input type="text" name="slug" class="form-control" id="inputUpdateSlugProduct" placeholder="Đường dẫn">
                      </div>
                      <div class="form-group col-sm-6">
                          <label for="inputUpdateNameProduct">Tên</label>
                          <input type="text" name="name" class="form-control" id="inputUpdateNameProduct" placeholder="Tên sản phẩm">
                      </div>
                      
                      <div class="form-group col-sm-6">
                        <label for="inputUpdatePriceProduct">Giá</label>
                        <input type="number" name="price" class="form-control" id="inputUpdatePriceProduct">
                      </div>
                    </div>
                    <div class="form-group">
                        <label for="inputUpdateDescProduct">Mô tả</label>
                        <textarea rows="4" cols="50" type="text" placeholder="Mô tả" name="description"
                            id="inputUpdateDescProduct" class="form-control text-sm"></textarea>
                    </div>
                    <div class="form-group">
                        <button class="btn_submit_update_product btn btn-primary btn-block mr-10" type="submit" {{($categories != [] && $providers != []) ? '' : 'disabled' }} >Lưu</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- /Modal Delete Product -->
<div class="modal fade" id="deleteProduct" tabindex="-1" role="dialog" aria-labelledby="deleteProduct" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteProduct">Xoá sản phẩm</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h5 class="font-weight-normal">Bạn có muốn chuyển sản phẩm này vào thùng rác không?</h5>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Huỷ bỏ</button>
                <button type="button" id="" class="btn_remove_product btn btn-primary">Đồng ý</button>
            </div>
        </div>
    </div>
</div>

@endsection

<!-- JavaScript -->
@section('java-script')
  <script src="{{asset('admin/js/bootstrap.js')}}"></script>
  <script src="{{asset('admin/js/jquery.dcjqaccordion.2.7.js')}}"></script>
  <script src="{{asset('admin/js/scripts.js')}}"></script>
  <script src="{{asset('admin/js/jquery.slimscroll.js')}}"></script>
  <script src="{{asset('admin/js/jquery.nicescroll.js')}}"></script>
  <script src="{{asset('admin/js/jquery.scrollTo.js')}}"></script>
  <!-- morris JavaScript -->  
  <script>
      $(document).ready(function() {
          //BOX BUTTON SHOW AND CLOSE
        jQuery('.small-graph-box').hover(function() {
            jQuery(this).find('.box-button').fadeIn('fast');
        }, function() {
            jQuery(this).find('.box-button').fadeOut('fast');
        });
        jQuery('.small-graph-box .box-close').click(function() {
            jQuery(this).closest('.small-graph-box').fadeOut(200);
            return false;
        });

        // Remove Product
        $('.removeProduct').on('click', function() {
          $id_product = $(this).attr('id');
          $('.btn_remove_product').attr('id', $id_product);
        });
        $('.btn_remove_product').on('click', function() {
            $id_product = $(this).attr('id');
            $.ajax({
                type: 'POST',
                url: '/api/products/remove-product',
                data: {
                    'id_product': $id_product,
                    'status': 'disabled',
                },
                success: function(data) {
                    location.reload(false);
                },
                error: function() {

                }
            });
        });

        // Update Product
        $('.updateProduct').on('click', function() {
          $id_product = $(this).attr('data-id');
          $.ajax({
              type: 'GET',
              url: '/api/products/get-product-by-id/' + $id_product,
              success: function(data) {
                $product = data.data;

                $('#updateProduct #inputUpdateIdProduct').val($product.id_product);

                $('#updateProduct #inputUpdateNameProduct').val($product.name);

                $('#updateProduct #inputUpdateSlugProduct').val($product.slug);

                $('#updateProduct #inputUpdatePhotoCurrentProduct').val($product.photo);

                $('#updateProduct #inputUpdateIdProviderProduct').val($product.provider.id_provider).change();

                $('#updateProduct #inputUpdateCategoryProduct').val($product.category.id_category).change();

                $('#updateProduct #inputUpdatePriceProduct').val($product.price);

                $('#updateProduct #inputUpdateDescProduct').val($product.description);

            },
            error: function() {

            }
          });
        });
      });
  </script>
@endsection

