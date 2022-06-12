<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryControllerResource extends Controller
{
    public function getParentbyID($id)
    {    
        return $Parent;
    }
    public function index()
    {
        //Get all category
        $Categorys = DB::select('select * from categories') ;
        
        foreach($Categorys as $Category){
            
            $Parent = DB::select('select category_title from categories where category_ID = ?',[$Category->category_parent]) ;    
            if(count($Parent)>0){
                $Category->category_parent = $Parent[0]->category_title;
            }
            else{
                $Category->category_parent = 'Không';
            }
            

        }
        return view('categoryManage.list')->with('Categories', $Categorys);
    }
    

    public function create()
    {
        $Parent = DB::select('select * from categories where category_parent=0') ;
       
        // Show the form for creating a new blog.
        return view('categoryManage.add',['Parent'=>$Parent]);
    }
    public function Store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|min:3'
        ]);
        $result = 'Đăng bài thất bại !';
        $Category = new Category;
        $Category->category_title = $request->title;
        $Category->category_parent = $request->par;
        if ($Category->save())
            $result = 'Đăng bài thành công !';
        return redirect()->route('category-manage.index')->with('mess', 'Thành công');
    }
    public function edit($id)
    {
        // Show the form for creating a new blog.
        $Category = DB::select('select * from categories where category_ID  = ?',[$id]);
        
            $Parent = DB::select('select category_ID,category_title from categories where category_parent = 0') ;  


        return view('categoryManage.edit',['category'=>$Category,'parents'=>$Parent]);
    }
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|min:3'
        ]);
        $result = 'Đăng bài thất bại !';
        $category_title = $request->title;
        $category_parent = $request->par;
        $Category = DB::select('update categories set category_title  = ?, category_parent = ? where category_ID = ?',[$category_title,$category_parent,$id]);
        return redirect()->route('category-manage.index')->with('mess', 'Thành công');

    }
    public function delete(Request $request, $id)
    {
    
        $Category = DB::select('delete from categories where category_ID = ?',[$id]);
        return redirect()->route('category-manage.index')->with('mess', 'Thành công');

    }
}
