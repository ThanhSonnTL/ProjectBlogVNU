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
        return view('admin.CategoryManage.list')->with('Categories', $Categorys);
    }


    public function create()
    {
        // Show the form for creating a new blog.
        $Parent = DB::select('select * from categories where category_parent=0');
        return view('admin.CategoryManage.add', ['Parent' => $Parent]);
    }
    public function store(RequestValidateCategory $request)
    {
        $Category = new Category;
        $Category->category_title = $request->title;
        $Category->category_parent = $request->par;
        $result = 'Tạo danh mục mới thất bại!';
        if ($Category->save())
            $result = 'Tạo danh mục mới thành công !';
        return redirect()->route('category.index')->with('mess', $result);
    }
    public function edit($id)
    {
        // Show the form for creating a new blog.
        $Category = DB::select('select * from categories where category_ID  = ?', [$id]);

        $Parent = DB::select('select category_ID,category_title from categories where category_parent = 0');

        return view('admin.CategoryManage.edit', ['category' => $Category[0], 'parents' => $Parent]);
    }
    public function update(Request $request, $id)
    {
        $category= Category::where('category_ID','=',$id)
        ->update([
            'category_title'=>$request->category_title,
            'category_parent'=>$request->category_parent,
            'updated_at'=>DB::raw('CURRENT_TIMESTAMP'),
        ]);
        return redirect()->route('category.index');
    }
    
    public function destroy($id)
    {

        $Category =Category::where('category_ID','=',$id)->delete();
        return redirect()->route('category.index');
    }
}
