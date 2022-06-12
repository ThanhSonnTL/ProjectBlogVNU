@include('admin..header')
<div class="container">
    <div class="row justify-content-center">
        @isset($mess)
        <p><?php echo $mess ?></p>
        @endisset
        <div class="col-md-8">
            <form name="addPost" action="/update/category-{{$category[0]->category_ID }}" method="POST">
                @csrf
                <div class="card" style="width: 100%">
                    <div class="card-header">Chỉnh sửa danh mục</div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="title">Tiêu đề</label>
                            <input id = "title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{$category[0]->category_title}}">
                            @error('title')
                            <div class="mt-2 alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                        <label for="par">Danh mục cha</label></br>
                            <!-- <input id = "par" type="text" class="form-control @error('par') is-invalid @enderror" name="par"> -->
                           
                            <select class="form-control" aria-label="Default select example" name="par">
                                <option selected value=0>- Không -</option>
                                @foreach($parents as $parent)
                                <option value={{ $parent->category_ID}}>{{ $parent->category_title }}</option>
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