@include('admin..header')
<div class="container-fluid">
    <div class="row justify-content-center">
        @isset($mess)
        <p><?php echo $mess ?></p>
        @endisset
        <div class="col-md-10">
            <form action="{{route('post.store')}}" method="POST" enctype="multipart/form-data">

                @csrf
                <div class="card" style="width: 100%">
                    <div class="card-header font-weight-bold">Thêm mới bài viết</div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="post_title">Tiêu đề</label>
                            <input id = "post_title" type="text" class="form-control @error('title') is-invalid @enderror" name="post_title">
                            @error('title')
                            <div class="mt-2 alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="post_decs">Mô tả</label></br>
                            <textarea name="post_decs" id="desc" class="ckeditor"></textarea>
                            @error('post_decs')
                            <div class="mt-2 alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="post_content">Nội dung</label>
                            <textarea name="post_content" id="cont" class="ckeditor"></textarea>
                            @error('post_content')
                            <div class="mt-2 alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div>
                        <label for="post_imgURL">Danh mục</label>
                        <select class="form-control" aria-label="Default select example" name="category_ID">
                                @foreach($category_parents as $category_parent)
                                <option value={{ $category_parent->category_ID}}>{{ $category_parent->category_title }}</option>
                                @endforeach()
                        </select></br>
                        </div>
                        <div class="form-group">
                            <label for="post_imgURL">Hình ảnh</label>
                            <input id = "post_imgURL" type="file" class="form-control @error('title') is-invalid @enderror" name="post_imgURL">
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