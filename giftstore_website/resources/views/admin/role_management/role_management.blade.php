@extends('admin/admin_layout')

@section('title','Quản lý phân quyền')

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

  <!-- Message error css -->
  <style>
        .error-popup {
            position: fixed;
            right: 20px;
            bottom: 100px;
            background-color: #ff0000;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            animation: popupAnimation 0.5s ease-in-out;
        }
        @keyframes popupAnimation {
                0% { opacity: 0; transform: translateY(-20px); }
                100% { opacity: 1; transform: translateY(0); }
        }
    </style>

  <script src="{{asset('admin/js/jquery2.0.3.min.js')}}"></script>
  <script src="{{asset('admin/js/raphael-min.js')}}"></script>
  <script src="{{asset('admin/js/morris.js')}}"></script>
@endsection

@section('admin_content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">Danh sách quyền</div>
    <div class="row w3-res-tb">
      <div class="col-sm-5 m-b-xs">
        <a href="#" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#addRole"><i class="fa fa-plus" aria-hidden="true"></i><strong>Thêm mới</strong></a>                 
      </div>
      <div class="col-sm-4">
      </div>
      <div class="col-sm-3">
        {{--<div class="input-group">
          <input type="text" class="input-sm form-control" placeholder="Search">
          <span class="input-group-btn">
            <button class="btn btn-sm btn-default" type="button">Tìm</button>
          </span>
        </div>--}}
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
            <th>Mã quyền</th>
            <th>Tên</th>
            <th>Trạng thái</th>
            <th>Thao tác</th>
          </tr>
        </thead>
        <tbody>
          @if($roles != [])
          <?php $i = 1; ?>
          @foreach($roles as $key => $role)
          <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"></label></td>
            <td>{{$i++}}</td>
            <td>{{$role->id_role}}</td>
            <td>{{$role->name}}</td>
            <td>{{ ($role->status == 'enabled') ? 'Đang hoạt động' : 'Ngừng hoạt động'  }}</td>
            <td>
              <a data-id="{{ $role->id_role }}" data-toggle="modal" data-target="#updateRole" href="#" class="updateRole active styling-edit" title="Chỉnh sửa">
                <i class="fa fa-pencil-square-o text-success text-active"></i>
              </a>
              @if($role->id_role != 'AD' && $role->id_role != 'MB')
              <a id="{{ $role->id_role }}" data-toggle="modal" data-target="#deleteRole" href="#" class="deleteRole active styling-edit">
                <i class="fa fa-times text-danger text"></i>
              </a>
              @endif
            </td>
          </tr>
          @endforeach
          @else
              <tr class="odd "><td valign="top" colspan="12" class="text-center dataTables_empty">Chưa có dữ liệu</td></tr>
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
            <li><a href="">2</a></li>
            <li><a href="">3</a></li>
            <li><a href="">4</a></li>
            <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
          </ul>
        </div>
      </div>
    </footer>--}}
  </div>
</div>


<!-- /Modal Add Role -->
<div class="modal fade" id="addRole" tabindex="-1" role="dialog" aria-labelledby="addRole" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h5 class="modal-title text-center text-uppercase" id="exampleModalPopoversLabel" style="text-align:center;"><strong>Thêm nhóm quyền</strong></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('add-role')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="inputAddIdRole">ID quyền</label>
                        <input type="text" placeholder="ID quyền" name="id_role" id="inputAddIdRole" class="form-control text-sm">
                    </div>
                    <div class="form-group">
                        <label for="inputAddNameRole">Tên quyền</label>
                        <input type="text" placeholder="Tên quyền" name="name" id="inputAddNameRole" class="form-control text-sm">
                    </div>
                    <div class="form-group">
                        <button class="btn_submit_add_role btn btn-primary btn-block mr-10" type="submit">Lưu</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- /Modal Update Role -->
<div class="modal fade" id="updateRole" tabindex="-1" role="dialog" aria-labelledby="updateRole" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h5 class="modal-title text-center text-uppercase" id="exampleModalPopoversLabel" style="text-align:center;"><strong>Chỉnh sửa nhóm quyền</strong></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('update-role')}}" method="POST">
                    @csrf
                    <input type="hidden" name="id_role" id="inputUpdateIdRole">
                    <div class="form-group">
                        <label for="inputUpdateNameRole">Tên quyền</label>
                        <input type="text" name="name" id="inputUpdateNameRole" class="form-control text-sm" required />
                    </div>
                    <div class="form-group">
                        <button class="btn_submit_update_role btn btn-primary btn-block mr-10" type="submit">Lưu</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- /Modal Delete Role -->
<div class="modal fade" id="deleteRole" tabindex="-1" role="dialog" aria-labelledby="deleteRole" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteRole">Xoá nhóm quyền</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h5 class="font-weight-normal">Bạn có muốn xóa vĩnh viễn nhóm quyền này không?</h5>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Huỷ bỏ</button>
                <button type="button" id="" class="btn_delete_role btn btn-primary">Đồng ý</button>
            </div>
        </div>
    </div>
</div>

@if(session('error'))
    <div class="error-popup">
        <span class="error-message">{{ session('error') }}</span>
    </div>
@endif

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

      // Update Role
      $('.updateRole').on('click', function() {
        $id_role = $(this).attr('data-id');
        $.ajax({
            type: 'GET',
            url: '/api/roles/get-role-by-id/' + $id_role,
            success: function(data) {
                $role = data.data;

                $('#updateRole #inputUpdateIdRole').val($role.id_role);

                $('#updateRole #inputUpdateNameRole').val($role.name);

            },
            error: function() {

            }
        });
      });

      // Remove Role
      $('.deleteRole').on('click', function() {
        $id_role = $(this).attr('id');
        $('.btn_delete_role').attr('id', $id_role);
      });
      $('.btn_delete_role').on('click', function() {
          $id_role = $(this).attr('id');
          $.ajax({
              type: 'POST',
              url: '/api/roles/delete-role',
              data: {
                  'id_role': $id_role,
              },
              success: function(data) {
                  location.reload(false);
              },
              error: function() {

              }
          });
      });
    });
  </script>
  <script>
    window.addEventListener('DOMContentLoaded', () => {
        const errorPopup = document.querySelector('.error-popup');
        if (errorPopup) {
            setTimeout(() => {
                    errorPopup.style.display = 'none';
            }, 5000);
        }
    });
  </script>
@endsection