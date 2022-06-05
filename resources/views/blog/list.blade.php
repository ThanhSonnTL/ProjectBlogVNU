@include('admin..header')
<div class="container">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h2 class="h3 mb-0 text-gray-800">Quản lý bài viết</h2>
    </div>
    <p>
        <a href="{{route('blog.create')}}" class="btn btn-success">Tạo mới bài viết</a>
    </p>
    <!-- Content Row -->
    <div class="row">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Tiêu đề</th>
                    <th scope="col">Ngày tạo</th>
                    <th scope="col">Ngày update</th>
                    <th class="text-center" scope="col">Xem trước</th>
                    <th class="text-center" scope="col">Sửa</th>
                    <th class="text-center" scope="col">Xóa</th>
                </tr>
            </thead>
            <tbody>
                @foreach($blogs as $blog)
                <tr>
                    <td scope="row">{{$blog->id}}</td>
                    <td>{{$blog->title}}</td>
                    <td>{{$blog->created_at}}</td>
                    <td>{{$blog->updated_at}}</td>
                    <td class="text-center"><a href="#"><i class="fa-solid fa-eye"></i></a></td>
                    <td class="text-center"><a href="#"><i class="fa-solid fa-pen"></i></a></td>
                    <td class="text-center"><a href="#"><i class="fa-solid fa-trash-can"></i></td>
                </tr>
                @endforeach()
            </tbody>
        </table>
        <div style="margin: 0 auto;">
            {{$blogs->links()}}
        </div>
    </div>
</div>
@include('admin..footer')