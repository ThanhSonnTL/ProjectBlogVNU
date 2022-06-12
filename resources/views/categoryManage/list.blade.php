@include('admin..header')
<div class="container">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h2 class="h3 mb-0 text-gray-800">Quản lý danh mục</h2>
    </div>
    <p>
        <a href="{{route('category-manage.create')}}" class="btn btn-success">Tạo mới danh mục</a>
    </p>
    <!-- Content Row -->
    <div class="row">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Tiêu đề</th>
                    <th scope="col">Cấp độ</th>
                    <th scope="col">Ngày tạo</th>
                    <th scope="col">Ngày cập nhật</th>
                    <th class="text-center" scope="col">Xem trước</th>
                    <th class="text-center" scope="col">Sửa</th>
                    <th class="text-center" scope="col">Xóa</th>
                </tr>
            </thead>
            <tbody>
                @foreach($Categorys as $Category)
                <tr>
                    <td scope="row">{{$Category->category_ID}}</td>
                    <td>{{$Category->category_title}}</td>
                    <td>{{$Category->category_parent}}</td>
                    <td>{{$Category->created_at}}</td>
                    <td>{{$Category->updated_at}}</td>
                    <td class="text-center"><a href="#"><i class="fa-solid fa-eye"></i></a></td>
                    <td class="text-center"><a href="edit/category-{{ $Category->category_ID }}"><i class="fa-solid fa-pen"></i></a></td>
                    <td class="text-center"><a  data-toggle="modal" data-target="#exampleModalCenter"><i class="fa-solid fa-trash-can"></i></td>
                </tr>
                @endforeach()
            </tbody>
        </table>
    </div>
    <!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
  Launch demo modal
</button> -->
<!-- href="delete/category-{{ $Category->category_ID }}" -->
<!-- Modal -->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
                <div class="modal-body">
                    Chắc chắn xóa danh mục này!!
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                    <a href="delete/category-{{ $Category->category_ID }}" class="btn btn-success">Đồng ý</a>
                </div>
            </div>
        </div>
</div>
</div>
@include('admin..footer')