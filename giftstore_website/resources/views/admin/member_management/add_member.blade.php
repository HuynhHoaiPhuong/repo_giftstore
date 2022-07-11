@extends('admin_layout')
@section('admin_content')
 <div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Thêm Mới Thành Viên
            </header>
            <div class="panel-body">
                <div class="position-center">
                    <form role="form" action="{{route('save-member')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>User</label>
                            <select name="id_user" class="form-control input-sm m-bot15">
                            @foreach($user as $key => $u)
                                <option value="{{$u->id}}">{{$u->username}}</option>
                            @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Rank</label>
                            <select name="id_rank" class="form-control input-sm m-bot15">
                            @foreach($rank as $key => $r)
                                <option value="{{$r->id}}">{{$r->name}}</option>
                            @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Point</label>
                            <input name="point" type="number" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Ngày tạo</label>
                            <input type="datetime-local" name="date_created" class="form-control" >
                        </div>
                        <div class="form-group">
                        <label>Ngày cập nhật</label>
                            <input type="datetime-local" name="date_updated" class="form-control">
                        </div>
                        <div class="form-group">
                        	<label>Hiển thị</label>
                            <select  name="status" class="form-control input-sm m-bot15">
                                <option value="an">Ẩn</option>
                                <option value="hienthi">Hiển thị</option>
                                <option value="noibat">Nổi bật</option>
                                <option value="moi">Mới</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-info">Thêm</button>
                    </form>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection