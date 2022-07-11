@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Danh sách sản phẩm
    </div>
    <div class="row w3-res-tb">
      <div class="col-sm-5 m-b-xs">
        <select class="input-sm form-control w-sm inline v-middle">
          <option value="0">Bulk action</option>
          <option value="1">Delete selected</option>
          <option value="2">Bulk edit</option>
          <option value="3">Export</option>
        </select>
        <button class="btn btn-sm btn-success">Apply</button>       
        <a href="{{route('add-bill-order')}}" class="btn btn-sm btn-primary">Add</a>           
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
                <input type="checkbox"><i></i>
              </label>
            </th>
            <th>ID</th>
            <th>ID NSX</th>
            <th>ID User</th>
            <th>ID sản phẩm</th>
            <th>Số lượng</th>
            <th>Tổng tiền</th>
            <th>Ngày mua</th>
            <th>Hiển thị</th>
            <th>Thao tác</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          @foreach($all_bill_order as $key => $bo)
          <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"></label></td>
            <td>{{$bo->id}}</td>
            <td>{{$bo->id_producer}}</td>
            <td>{{$bo->id_user}}</td>
            <td>{{$bo->id_stock}}</td>
            <td>{{$bo->quantity}}</td>
            <td>{{$bo->total_price}}</td>
            <td>{{$bo->date_order}}</td>
            <td>{{$bo->status}}</td>
            <td><span class="text-ellipsis">
              <?php 
                if($bo->status == 'an'){
              ?>
                <a href="{{route('unactive-bill',$bo->id)}}"><span class="fa-thumb-styling fa fa-thumbs-down"></span></a>
              <?php
                }else
                {
              ?>
                <a href="{{route('active-bill',$bo->id)}}"><span class="fa-thumb-styling fa fa-thumbs-up"></span></a>
              <?php
                }
              ?>
            </span></td>
            <td>
              <a href="{{route('edit-bill',$bo->id)}}" class="active styling-edit" ui-toggle-class="">
                <i class="fa fa-pencil-square-o text-success text-active"></i>
              </a>
              <a href="{{route('delete-bill',$bo->id)}}" onclick="return confirm('Bạn có chắc chắn muốn xóa không?')" class="active styling-edit" ui-toggle-class="">
                <i class="fa fa-times text-danger text"></i>
              </a>
            </td>
          </tr>
          @endforeach
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
            <li><a href="">2</a></li>
            <li><a href="">3</a></li>
            <li><a href="">4</a></li>
            <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
          </ul>
        </div>
      </div>
    </footer>
  </div>
</div>
@endsection

