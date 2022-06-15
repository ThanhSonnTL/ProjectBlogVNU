@include('admin..header')

<div class="container">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h2 class="h3 mb-0 text-gray-800">Quản lý bài viết</h2>
    </div>
    <p>
        <a href="{{route('department.create')}}" class="btn btn-success">Tạo mới bài viết</a>
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
                    <th scope="col">Tên phòng ban</th>
                    <th scope="col">Mô tả</th>
                    <th scope="col">Hình ảnh</th>
                    <th scope="col">Ngày tạo</th>   
                    <th scope="col">Ngày cập nhật</th>
                    <th class="text-center" scope="col">Sửa</th>
                    <th class="text-center" scope="col">Xóa</th>
                </tr>
            </thead>
            <tbody>
                @for($i=0;$i<count($data);$i++)
                    <tr>
                    <td scope="row">{{$data[$i]->department_ID}}</td>
                    <td>{{$data[$i]->department_name}}</td>
                    <td>{{strip_tags($data[$i]->department_desc)}}</td>
                    <td>{{strip_tags($data[$i]->department_imgURL)}}</td>
                    <td>{{$data[$i]->created_at}}</td>
                    <td>{{$data[$i]->updated_at}}</td>
                    <td class="text-center"><a href="{{route('department.edit', $data[$i]->department_ID)}}"><i class="fa-solid fa-pen"></i></a></td>
                    <td class="text-center"><a data-toggle="modal" data-target="#exampleModalCenter{{$i}}"><i class="fa-solid fa-trash-can text-danger"></i></td>
                </tr>
                @endfor
          
            </tbody>
        </table>
</div>
@include('admin..footer')