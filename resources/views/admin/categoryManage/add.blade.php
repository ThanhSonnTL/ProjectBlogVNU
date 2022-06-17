@include('admin..header')
<div class="container px-5">
    <div class="row justify-content-center">
        @isset($mess)
        <p><?php echo $mess ?></p>
        @endisset
        <div class="col-md-8">
            <form name="addPost" action="{{route('category.store')}}" method="POST">
                @csrf
                <div class="card" style="width: 100%">
                    <div class="card-header">Thêm mới danh mục</div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="title">Tiêu đề</label>
                            <input id = "title" type="text" class="form-control @error('title') is-invalid @enderror" name="title">
                            @error('title')
                            <div class="mt-2 alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="par">Danh mục cha</label></br>
                            <!-- <input id = "par" type="text" class="form-control @error('par') is-invalid @enderror" name="par"> -->
                           
                            <select class="form-control" aria-label="Default select example" name="par">
                                <option selected value=0>- Không -</option>
                                @foreach($Parent as $Category)
                                <option value={{ $Category->category_ID}}>{{ $Category->category_title }}</option>
                                @endforeach()
                            </select>
                        </div>
                        <div class="form-group text-center mt-3">
                            <button type="submit" name="btnSave" class="btn btn-primary w-25">Lưu lại</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@include('admin..footer')