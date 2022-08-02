@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Cập Nhật Thành Viên
            </header>
            <div class="panel-body">
                @foreach($edit_member as $key => $edit)
                <div class="position-center">
                    <form role="form" action="{{route('update-member',$edit->id)}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Point</label>
                            <input type="number" name="point" value="{{$edit->current_point}}" class="form-control">
                        </div>
                        {{-- <div class="form-group">
                            <label>Ngày Created</label>
                            <input type="datetime-local" name="date_created" value="{{$edit->date_created}}" class="form-control">
                        </div> --}}
                        <div class="form-group">
                        	<label>Trạng thái</label>
                            <select  name="status" class="form-control input-sm m-bot15">
                              <option value="an">Ẩn</option>
                              <option value="hienthi">Hiển thị</option>
                              <option value="noibat">Nổi bật</option>
                              <option value="moi">Mới</option>
                            </select>
                        </div>
                        <button type="submit" name="" class="btn btn-info">Cập nhật</button>
                    </form>
                </div>
                @endforeach
            </div>
        </section>
    </div>
</div>
@endsection