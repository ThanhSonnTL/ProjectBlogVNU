@include('admin..header')
<div class="container">
    <div class="row justify-content-center">
        @isset($mess)
        <p><?php echo $mess ?></p>
        @endisset
        <div class="col-md-8">
        <form action="" method="POST">
                @csrf
                @method('PUT')
                <div class="card" style="width: 100%">
                    <div class="card-header font-weight-bold">Chỉnh sửa bài viết</div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="post_title">Tiêu đề</label>
                            <input id = "post_title" type="text" class="form-control @error('title') is-invalid @enderror" name="post_title" value="{{$data[0]->post_title}}">
                            @error('title')
                            <div class="mt-2 alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="post_decs">Mô tả</label></br>
                            <textarea name="post_decs" id="desc" class="ckeditor" value="">{{$data[0]->post_decs}}</textarea>

                        </div>
                        <div class="form-group">
                            <label for="post_content">Nội dung</label>
                            <textarea name="post_content" id="cont" class="ckeditor" value="">{{$data[0]->post_content}}</textarea>
                            <label for="category_ID">Tiêu đề</label>
                            <input id = "title" type="text" class="form-control @error('title') is-invalid @enderror" name="category_ID" value="{{$data[0]->category_ID}}">

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