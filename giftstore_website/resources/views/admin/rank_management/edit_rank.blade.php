@extends('admin_layout')
@section('admin_content')
 <div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Cập nhật hạng
            </header>
            <div class="panel-body">
              @foreach($edit_rank as $key => $edit)
                <div class="position-center">
                    <form role="form" action="{{route('update-rank',$edit->id)}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Tên hạng</label>
                            <input type="text" name="name" value="{{$edit->name}}" class="form-control">
                        </div>
                        <div class="form-group">
                          <label>Point</label>
                          <input type="number" name="point" value="{{$edit->point}}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Ngày Created</label>
                            <input type="datetime-local" name="date_created" class="form-control">
                          </div>
                        <div class="form-group">
                          <label>Hiển thị</label>
                          <select  name="status" class="form-control input-sm m-bot15">
                            <option value="hienthi">Hiển thị</option>
                            <option value="an">Ẩn</option>
                        </select>
                        </div>
                        <button type="submit" class="btn btn-info">Cập nhật</button>
                    </form>
                </div>
                @endforeach
            </div>
        </section>
    </div>
</div>
@endsection