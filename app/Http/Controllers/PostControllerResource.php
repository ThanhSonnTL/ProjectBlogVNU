<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;

use Illuminate\Support\Facades\DB;

class PostControllerResource extends Controller
{
    public function index(Request $request)
    {
        $data = Post::get();
        $search = $request->get('q');
        if($search!=""){
            $data = Post::query()->where('post_title','like','%'.$search.'%')->get();
        }
        $category_name = array();
        
 
        $category_name = DB::select('SELECT post_ID,post_title,post_decs,post_content,post_imgURL,a.category_title FROM posts p, categories a WHERE  p.category_ID=a.category_ID');
  

        return view('admin.PostManage.index',['data' => $data,'category_name'=>$category_name]);
           
    }
    public function create()
    {
        
        $category_parent = Category::get();
        // Show the form for creating a new blog.
        return view('admin.PostManage.add', ['category_parents' => $category_parent]);

    }
    public function store(Request $request)
    {
        $object = new Post();
        $object->post_title = $request->post_title;
        $object->post_decs = $request->post_decs;
        $object->post_content = $request->post_content;
        $object->category_ID = $request->category_ID;


        $img = $request->file('post_imgURL');

        $storePathIMG = $img->move('post_imgURL',$img->getClientOriginalName());
         
        $object->post_imgURL = $storePathIMG;

        $object->save();
        
        return redirect()->route('post.index');

    }
    public function destroy($post_ID)
    {
        $post =Post::where('post_ID','=',$post_ID)->delete();
        return redirect()->route('post.index')->with('mess', 'Thành công');
    }
    public function edit($post_ID)
    {
        $post =Post::where('post_ID','=',$post_ID)->get();
        $category_parent = Category::get();
       
        return view('admin.PostManage.edit',['data' => $post,'category_parents'=>$category_parent]);
    }
    public function update(Request $request,$post_ID)
    {

        $img = $request->file('post_imgURL');
        $storePathIMG = $img->move('post_imgURL',$img->getClientOriginalName());
         
        

        $post = Post::where('post_ID','=',$post_ID)
        ->update([  
            'post_title' => $request->post_title,
            'post_decs' => $request->post_decs,
            'post_content' => $request->post_content,
            'category_ID' => $request->category_ID,
            'post_imgURL' => $storePathIMG
           ]);
        
        return redirect()->route('post.index');
        
    }



}
