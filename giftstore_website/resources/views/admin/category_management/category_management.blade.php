@extends('admin/admin_layout')
@section('title','Quản lý thể loại')

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
    <div class="panel-heading">Danh sách danh mục sản phẩm</div>
    <div class="row w3-res-tb">
      <div class="col-sm-5 m-b-xs">
        <a href="#" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#addCategory"><i class="fa fa-plus" aria-hidden="true"></i><strong>Thêm Mới</strong></a>
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
            <th>Tên danh mục</th>
            <th>Loại danh mục</th>
            <!-- <th>Slug</th> -->
            <th>Thao tác</th>
          </tr>
        </thead>
        <tbody>
          @if($categories != [])
          <?php $i = 1; ?>
          @foreach($categories as $key => $category)
          <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"></label></td>
            <td>{{$i++}}</td>
            @if($category->photo != 'noimage.png' && $category->photo != '')
            <td><img src="../upload/category/{{ $category->photo }}" alt="{{$category->name}}" width="40"></td>
            @else
            <td><img src="../admin/images/noimage.png" alt="noimage.png" width="40"></td>
            @endif
            <td>{{$category->name}}</td>
            <td>{{$category->typeCategory->name}}</td>
            <!-- <td>{{$category->slug}}</td> -->
            <td>
              <a data-id="{{ $category->id_category }}" data-toggle="modal" data-target="#updateCategory" href="#" class="updateCategory active styling-edit" title="Chỉnh sửa">
                <i class="fa fa-pencil-square-o text-success text-active"></i>
              </a>
              <a href="" onclick="return confirm('Bạn có chắc chắn muốn xóa không?')" class="active styling-edit" ui-toggle-class="">
                <i class="fa fa-times text-danger text"></i>
              </a>
            </td>
          </tr>
          @endforeach
          @else
              <tr class="odd "><td valign="top" colspan="6" class="text-center dataTables_empty">Chưa có dữ liệu</td></tr>
          @endif
        </tbody>
      </table>
    </div>
    {{--<footer class="panel-footer">
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
    </footer>--}}
  </div>
</div>

<!-- /Modal Add Category -->
<div class="modal fade" id="addCategory" tabindex="-1" role="dialog" aria-labelledby="addCategory" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h5 class="modal-title text-white text-uppercase" id="exampleModalPopoversLabel" style="text-align:center;"><strong>Thêm danh mục</strong></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('add-category')}}" id="addCategoryForm" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                      <label for="inputAddPhotoCategory">Hình ảnh</label>
                      <input type="file" placeholder="Thêm tập tin" name="photo" id="inputAddPhotoCategory" class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="addIdTypeCategory">Loại danh mục</label>
                      <select id="addIdTypeCategory" name="id_type_category" class="form-control">
                        @foreach($typeCategories as $key => $typeCat)
                          <option value="{{$typeCat->id_type_category}}">{{$typeCat->name}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                        <label for="inputAddSlugCategory">Đường dẫn</label>
                        <input type="text" placeholder="Đường dẫn" name="slug" id="inputAddSlugCategory" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="inputAddNameCategory">Tên</label>
                        <input type="text" placeholder="Tên loại sản phẩm" name="name" id="inputAddNameCategory" class="form-control" require>
                    </div>
                    <div class="form-group">
                        <button class="btn_submit_add_category btn btn-primary btn-block mr-10" type="submit" {{($typeCategories != []) ? '' : 'disabled' }}>Lưu</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- /Modal Update Category -->
<div class="modal fade" id="updateCategory" tabindex="-1" role="dialog" aria-labelledby="updateCategory" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h5 class="modal-title text-white text-uppercase" id="exampleModalPopoversLabel" style="text-align:center;"><strong>Chỉnh sửa danh mục</strong></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('update-category')}}" id="updateCategoryForm" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id_category" id="inputUpdateIdCategory">
                    <div class="form-group">
                      <label for="inputUpdatePhotoCategory">Hình ảnh</label>
                      <input type="file" placeholder="Thêm tập tin" name="photo" id="inputUpdatePhotoCategory" class="form-control">
                    </div>
                    <input type="hidden" name="photoCurrent" id="inputUpdatePhotoCurrentCategory">
                    <div class="form-group">
                      <label for="addIdTypeCategory">Loại danh mục</label>
                      <select id="addIdTypeCategory" name="id_type_category" class="form-control">
                        @foreach($typeCategories as $key => $typeCat)
                          <option class="typeCat-{{$typeCat->id_type_category}}" value="{{$typeCat->id_type_category}}">{{$typeCat->name}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                        <label for="inputUpdateSlugCategory">Đường dẫn</label>
                        <input type="text" placeholder="Đường dẫn" name="slug" id="inputUpdateSlugCategory" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="inputUpdateNameCategory">Tên</label>
                        <input type="text" placeholder="Tên loại sản phẩm" name="name" id="inputUpdateNameCategory" class="form-control" require>
                    </div>
                    <div class="form-group">
                        <button class="btn_submit_update_category btn btn-primary btn-block mr-10" type="submit" {{($typeCategories != []) ? '' : 'disabled' }}>Lưu</button>
                    </div>
                </form>
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
        
          
        // Update Category
        $('.updateCategory').on('click', function() {
          $id_category = $(this).attr('data-id');
          $.ajax({
              type: 'GET',
              url: '/api/categorys/get-category-by-id/' + $id_category,
              success: function(data) {
                $category = data.data;

                $('#updateCategory #inputUpdateIdCategory').val($category.id_category);

                $('#updateCategory #inputUpdateNameCategory').val($category.name);

                $('#updateCategory #inputUpdateSlugCategory').val($category.slug);

                $('#updateCategory #inputUpdatePhotoCurrentCategory').val($category.photo);

                $('#updateCategory #inputUpdateTypeCategory').val($category.typeCategory.id_type_category).change();

                $('#updateCategory #inputUpdateDescCategory').val($category.description);

            },
            error: function() {

            }
          });
        });
      });
  </script>
@endsection



