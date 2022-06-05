@include('admin..header')
<div class="container">
    <div class="row justify-content-center">
        @isset($mess)
        <p><?php echo $mess ?></p>
        @endisset
        <div class="col-md-8">
            <form name="addPost" action="{{route('blog.store')}}" method="POST">
                @csrf
                <div class="card" style="width: 100%">
                    <div class="card-header">Thêm bài viết mới</div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input id = "title" type="text" class="form-control @error('title') is-invalid @enderror" name="title">
                            @error('title')
                            <div class="mt-2 alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="desc">Content</label>
                            <textarea name="txtContent" id="contentBlog" cols="10" class="form-control"></textarea>
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