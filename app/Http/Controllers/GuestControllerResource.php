<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
class GuestControllerResource extends Controller
{
    public function getAll()
    {
        $post = DB::select('select posts.post_decs,posts.post_imgURL from posts,categories where posts.category_ID = categories.category_ID LIMIT 6'); 
        $category = array();
        $category = DB::select('select category_ID,category_title from categories where category_parent = 0');
        $categoryChild = array();
        $categoryChild = DB::select('select category_parent,category_title from categories where category_parent != 0'); 
        

        return view('home',['posts' => $post,'categories' => $category,'categoryChildrent'=> $categoryChild]);           
    }
    public function getAll2()
    {
        $post = DB::select('select posts.post_decs,posts.post_imgURL from posts,categories where posts.category_ID = categories.category_ID LIMIT 6'); 
        $category = array();
        $category = DB::select('select category_ID,category_title from categories where category_parent = 0');
        $categoryChild = array();
        $categoryChild = DB::select('select category_parent,category_title from categories where category_parent != 0'); 
        

        return view('layoutPost',['posts' => $post,'categories' => $category,'categoryChildrent'=> $categoryChild]);           
    }
}
