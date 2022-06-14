<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\posts;
use App\Models\Category;

class PostControllerResource extends Controller
{
    public function index(Request $request)
    {
        $data = posts::get();
        $search = $request->get('q');
        if($search!=""){
            $data = posts::query()->where('post_title','like','%'.$search.'%')->get();
        }
        $category_name = array();
        foreach ($data as $post){
            $category_ID = $post->category_ID;
            $category_name = Category::where('category_ID','=',$category_ID)->get();
            
        }
        

        return view('admin.PostManage.index',['data' => $data,'category_name'=>$category_name]);
           
    }
    public function create()
    {
        return view('admin.PostManage.add');
    }
    public function store(Request $request)
    {
        $object = new posts();
        $object->post_title = $request->post_title;
        $object->post_decs = $request->post_decs;
        $object->post_content = $request->post_content;
        $object->category_ID = $request->category_ID;
        $object->save();
        return redirect()->route('post.index');

    }
    public function destroy($post_ID)
    {
        $post =posts::where('post_ID','=',$post_ID)->delete();
        return redirect()->route('post.index')->with('mess', 'Thành công');
    }
    public function edit($post_ID)
    {
        $post =posts::where('post_ID','=',$post_ID)->get();
       
        return view('admin.PostManage.edit',['data' => $post]);
    }



}
