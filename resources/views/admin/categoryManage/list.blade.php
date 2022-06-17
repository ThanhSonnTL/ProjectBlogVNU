@include('admin..header')
<div class="container">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h2 class="h3 mb-0 text-gray-800">Quản lý danh mục</h2>
    </div>
    <p>
        <a href="{{route('category.create')}}" class="btn btn-success">Tạo mới danh mục</a>
    </p>
    @if(session('mess'))
    <div class="alert alert-success">{{session('mess')}}</div>
    @endif
    <!-- Content Row -->
    <div class="row">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Tiêu đề</th>
                    <th scope="col">Danh mục cha</th>
                    <th scope="col">Ngày tạo</th>
                    <th scope="col">Ngày cập nhật</th>
                    <th class="text-center" scope="col">Sửa</th>
                    <th class="text-center" scope="col">Xóa</th>
                </tr>
            </thead>
            <tbody>
                @foreach($Categories as $Category)
                <tr>
                    <td scope="row">{{$Category->category_ID}}</td>
                    <td>{{$Category->category_title}}</td>
                    <td>{{$Category->category_parent}}</td>
                    <td>{{$Category->created_at}}</td>
                    <td>{{$Category->updated_at}}</td>

                    <td class="text-center"><a href="{{route('category.edit',$Category->category_ID)}}"><i class="fa-solid fa-pen"></i></a></td>

                    <td class="text-center"><a data-toggle="modal" data-target="#exampleModalCenter"><i class="fa-solid fa-trash-can text-danger"></i></td>
                </tr>
                {{-- modal delete --}}
                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Cảnh báo</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                            </div>
                            <div class="modal-body">
                                Bạn chắc chắn xóa danh mục này!
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                                <form action="{{route('category.destroy',$Category->category_ID)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Đồng ý</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach()
            </tbody>
        </table>
    </div>
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Cảnh báo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Chắc chắn xóa danh mục này!
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                    @isset($Category->category_ID)
                    <a href="delete/category-{{$Category->category_ID}}" class="btn btn-danger">Đồng ý</a>
                    @endisset
                </div>
            </div>
        </div>
    </div>
</div>
@include('admin..footer')