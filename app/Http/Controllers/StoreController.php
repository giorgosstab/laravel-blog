<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Post;
use App\Category;

class StoreController extends Controller {
    public function index(){
        $categories = Category::all();
        return view('store.main')
                ->with('posts', Post::orderBy('created_at','DESC')->paginate(5))
                ->with('categories', $categories);
    }

//    public function getView($id){
//        $categories = Category::all();
//        return view('store.view')
//                ->with('posts', Post::find($id))
//                ->with('categories', $categories);
//    }
    public function getView($title){
        $categories = Category::all();
        return view('store.view')
            ->with('posts', Post::where('title', urldecode($title))->firstOrFail())
            ->with('categories', $categories);
    }
    public function getCategory($id){
        $categories = Category::all();
        //$post = DB::table('posts')->where('category_id','=',$id)->paginate(2);
        $post = Post::where('category_id','=',$id)->paginate(2); //ta idio me thn apopanw apla paw meso model
        return view('store.category')
                ->with('posts', $post)
                ->with('categories', $categories);
    }

    public function getSearch(Request $request){
        $keyword = $request->Input('keyword');
        $categories = Category::all();
        if($keyword != ""){
            return view('store.search')
                ->with('posts', Post::where('title','LIKE','%'.$keyword.'%')->paginate(2))
                ->with('keyword', $keyword)
                ->with('categories', $categories);
        } else {
            return redirect('/');
        }
        
    }
}
