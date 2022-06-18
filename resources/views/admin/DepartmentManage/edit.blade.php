@include('admin..header')
<div class="container">
    <div class="row justify-content-center">
        @isset($mess)
        <p><?php echo $mess ?></p>
        @endisset
        <div class="col-md-8">
        <form action="{{route('department.update',$data[0]->department_ID)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card" style="width: 100%">
                    <div class="card-header font-weight-bold">Chỉnh sửa bài viết</div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="department_name">Tên phòng ban</label>
                            <input id = "department_name" type="text" class="form-control @error('title') is-invalid @enderror" name="department_name" value="{{$data[0]->department_name}}">
                            @error('title')
                            <div class="mt-2 alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="department_desc">Mô tả</label></br>
                            <textarea name="department_desc" id="desc" class="ckeditor" value="">{{$data[0]->department_desc}}</textarea>

                        </div>
                        <div class="form-group">
                            <label for="department_imgURL">Hình ảnh</label>
                            <input id = "department_imgURL" type="file" class="form-control @error('title') is-invalid @enderror" name="department_imgURL">
                        </div>
                        <div class="form-group text-center mt-3">
                            <button type="submit" name="btnSave" class="btn btn-primary w-25">Save</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@include('admin..footer')