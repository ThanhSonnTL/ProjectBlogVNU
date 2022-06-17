@include('admin..header')

<div class="container">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h2 class="h3 mb-0 text-gray-800">Quản lý bài viết</h2>
    </div>
    <p>
        <a href="{{route('post.create')}}" class="btn btn-success">Tạo mới bài viết</a>
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
                    <th scope="col">Mô tả</th>
                    <th scope="col">Danh mục</th>
                    <th scope="col">Ngày tạo</th>
                    <th scope="col">Ngày cập nhật</th>
                    <th class="text-center" scope="col">Sửa</th>
                    <th class="text-center" scope="col">Xóa</th>
                </tr>
            </thead>
            <tbody>
                @for($i=0;$i<count($data);$i++)
                    <tr>
                    <td scope="row">{{$data[$i]->post_ID}}</td>
                    <td>{{$data[$i]->post_title}}</td>
                    <td>{{strip_tags($data[$i]->post_decs)}}</td>
                    <td>{{ $category_name[$i]->category_title}}</td>
                    <td>{{$data[$i]->created_at}}</td>
                    <td>{{$data[$i]->updated_at}}</td>
                    <td class="text-center"><a href="{{route('post.edit', $data[$i]->post_ID)}}"><i class="fa-solid fa-pen"></i></a></td>
                    <td>
                        <form action="{{ route('post.destroy', $data[$i]->post_ID) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="color:#4e73df;border:none;background:#f8f9fc;"><i class="fa-solid fa-trash-can"></i></button>
                        </form>
                    </td>
                </tr>
                @endfor
          
            </tbody>
        </table>
    </div>

    
</div>
@include('admin..footer')