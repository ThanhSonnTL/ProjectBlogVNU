<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\RequestValidateCategory;

class CategoryControllerResource extends Controller
{
    public function index()
    {
        //Get all category
        $Categorys = DB::select('select * from categories');
        foreach ($Categorys as $Category) {
            $Parent = DB::select('select category_title from categories where category_ID = ?', [$Category->category_parent]);
            if (count($Parent) > 0) {
                $Category->category_parent = $Parent[0]->category_title;
            } else {
                $Category->category_parent = 'Không';
            }
        }
        return view('admin.categoryManage.list')->with('Categories', $Categorys);
    }


    public function create()
    {
        // Show the form for creating a new blog.
        $Parent = DB::select('select * from categories where category_parent=0');
        return view('admin.categoryManage.add', ['Parent' => $Parent]);
    }
    public function Store(RequestValidateCategory $request)
    {
        $result = 'Tạo danh mục mới thất bại!';
        $Category = new Category;
        $Category->category_title = $request->title;
        $Category->category_parent = $request->par;
        if ($Category->save())
            $result = 'Tạo danh mục mới thành công !';
        return redirect()->route('category-manage.index')->with('mess', $result);
    }
    public function edit($id)
    {
        // Show the form for creating a new blog.
        $Category = DB::select('select * from categories where category_ID  = ?', [$id]);

        $Parent = DB::select('select category_ID,category_title from categories where category_parent = 0');


        return view('admin.categoryManage.edit', ['category' => $Category, 'parents' => $Parent]);
    }
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|min:3'
        ]);
        $result = 'Cập nhật danh mục thất bại';
        $category_title = $request->title;
        $category_parent = $request->par;
        $Category = DB::select('update categories set category_title  = ?, category_parent = ? where category_ID = ?', [$category_title, $category_parent, $id]);
        if ($Category)
            $result = 'Cập nhật danh mục thành công';
        return redirect()->route('category-manage.index')->with('mess', $result);
    }
    public function delete(Request $request, $id)
    {

        $Category = DB::select('delete from categories where category_ID = ?', [$id]);
        return redirect()->route('category-manage.index')->with('mess', 'Thành công');
    }
}
