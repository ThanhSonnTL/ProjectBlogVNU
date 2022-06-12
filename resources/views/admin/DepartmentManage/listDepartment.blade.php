@include('admin..header')
<div class="container">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h2 class="h3 mb-0 text-gray-800">Quản lý phòng ban</h2>
    </div>
    <p>
        <a href="{{route('department-manage.create')}}" class="btn btn-success">Tạo mới phòng ban </a>
    </p>
    <!-- Content Row -->
    <div class="row">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Mã phòng ban</th>
                    <th scope="col">Tên phòng ban</th>
                    <th scope="col">Mô tả</th>
                    <th scope="col">Hình ảnh</th>
                    <th class="text-center" scope="col">Xem trước</th>
                    <th class="text-center" scope="col">Sửa</th>
                    <th class="text-center" scope="col">Xóa</th>
                </tr>
            </thead>
            <tbody>
            @foreach($Departments as $Department)
                <tr>
                    <td scope="row">{{$Department->department_ID}}</td>
                    <td>{{$Department->department_name}}</td>
                    <td>{{$Department->department_desc}}</td>
                    <td>{{$Department->department_imgURL}}</td>
                    <td>{{$Department->created_at}}</td>
                    <td>{{$Department->updated_at}}</td>
                    <td class="text-center"><a href=""><i class="fa-solid fa-eye"></i></a></td>
                    <td class="text-center"><a href=""><i class="fa-solid fa-pen"></i></a></td>
                    <td class="text-center"><a href=""><i class="fa-solid fa-trash-can"></i></td>
                </tr>
                @endforeach()
            </tbody>
        </table>
    </div>
</div>
@include('admin..footer')