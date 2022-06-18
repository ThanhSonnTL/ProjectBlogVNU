<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
class GuestControllerResource extends Controller
{
    public function getAll()
    {
        $post = DB::select('select post_ID, post_title,post_imgURL from posts where category_ID = 10 LIMIT 6;'); 
        $category = array();
        $category = DB::select('select category_ID,category_title from categories where category_parent = 0');
        $categoryChild = array();
        $categoryChild = DB::select('select category_ID, category_parent,category_title from categories where category_parent != 0'); 
        return view('home',['posts' => $post,'categories' => $category,'categoryChildrent'=> $categoryChild]);           
    }
    public function getPost($id){
        $post=array();
        $posts=DB::select('SELECT post_ID,post_title,post_decs,post_content,post_imgURL,b.category_title FROM posts p, categories a, categories b WHERE a.category_parent=b.category_ID AND p.category_ID=a.category_ID AND p.category_ID=?',[$id]);
        $category = array();
        $category = DB::select('select category_ID,category_title from categories where category_parent = 0');
        $categoryChild = array();
        $categoryChild = DB::select('select category_ID,category_parent,category_title from categories where category_parent != 0'); 
       
        if(count($posts)>1){
            //trả về trang có nhiều bài viết
            return view('layoutPosts',['posts' => $posts,'categories' => $category,'categoryChildrent'=> $categoryChild]); 
        }
        else{
            //trả về trang có  một bài viết
            if(isset($posts[0])){
                return view('layoutPost',['post' => $posts[0],'categories' => $category,'categoryChildrent'=> $categoryChild]); 
            }
        }

    }
    public function getPostDetail($id){
        $post=array();
        $posts=DB::select('SELECT post_ID,post_title,post_decs,post_content,post_imgURL,b.category_title FROM posts p, categories a, categories b WHERE a.category_parent=b.category_ID AND p.category_ID=a.category_ID AND p.post_ID=?',[$id]);
        $category = array();
        $category = DB::select('select category_ID,category_title from categories where category_parent = 0');
        $categoryChild = array();
        $categoryChild = DB::select('select category_ID,category_parent,category_title from categories where category_parent != 0'); 

        //trả về trang có  một bài viết
        if(isset($posts[0])){
            return view('layoutPost',['post' => $posts[0],'categories' => $category,'categoryChildrent'=> $categoryChild]); 
        }

}
