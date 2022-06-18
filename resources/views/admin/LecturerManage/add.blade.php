@include('admin..header')
<div class="container-fluid">
    <div class="row justify-content-center">
        @isset($mess)
        <p><?php echo $mess ?></p>
        @endisset
        <div class="col-md-10">
            <form action="{{route('lecturer.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card" style="width: 100%">
                    <div class="card-header font-weight-bold">Chỉnh sửa bài viết</div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="post_title">Tên giảng viên</label>
                            <input id = "lecturer_name" type="text" class="form-control @error('title') is-invalid @enderror" name="lecturer_name"">
                            @error('title')
                            <div class="mt-2 alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="post_decs">Giới tính</label></br>
                            <select class="form-control" aria-label="Default select example" name="lecturer_gender">
                               
                                <option value="Nam" selected >Nam</option>
                                <option value="Nữ">Nữ</option>
                                
                             </select>
                            

                        </div>
                        <div class="form-group">
                            <label for="post_content">Thông tin liên lạc</label>
                            <textarea name="lecturer_email" id="cont" class="ckeditor" value=""></textarea>
                        </div>
                        <div class="form-group">
                            <label for="lecturer_imgURL">Hình ảnh</label>
                            <input id = "lecturer_imgURL" type="file" class="form-control @error('title') is-invalid @enderror" name="lecturer_imgURL">
                        </div>
                        <div class="form-group">
                        <select class="form-control" aria-label="Default select example" name="department_name">
                                @foreach($department_name as $department_name)
                                <option value={{$department_name->department_ID}}>{{$department_name->department_name}}</option>
                                @endforeach()
                        </select>
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