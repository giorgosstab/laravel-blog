<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Post;
use Validator;
use Session;
use File;


class PostController extends Controller {
    public function __constructor() {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function index(){
        //$posts = Post::all();
        // $categories = array();
        // foreach (Category::find($posts->category_id) as $category) {
        //     $categories[$category->id]=$category->name;
        // }
        return view('post.main')
                ->with('posts', Post::orderBy('created_at','ASC')->paginate(5));
                // ->with('categories',$categories);
    }

    public function create(){
        $categories = array();
        foreach (Category::all() as $category) {
            $categories[$category->id]=$category->name;
        }
        return view('post.create')
                ->with('categories',$categories);
    }

    public function store(Request $request){
        $validate = Validator::make($request->all(),[
            'category_id' => 'required|integer',
            'title' => 'required|max:20|min:3',
            'author' => 'required|max:20|min:3',
            'image' => 'required|mimes:jpg,jpeg,png,gif',
            'short_desc' => 'required|max:50|min:10',
            'description' => 'required|max:1000|min:50',
        ]);
        if($validate->fails()){
            return redirect('post/create')
                ->withInput()
                ->withErrors($validate);
        }
        
        $image = $request->file('image');
        $upload = 'img/posts/';
        $filename = time().$image->getClientOriginalName();
        $path = move_uploaded_file($image->getPathName(), $upload. $filename);

        //crete post
        $post = new Post;
        $post->category_id = $request->category_id;
        $post->title = $request->title;
        $post->author = $request->author;
        $post->image = $filename;
        $post->short_desc = $request->short_desc;
        $post->description = $request->description;
        $post->save();
        Session::flash('post_create','New Post Created!!');
        return redirect('post/create');
    }

    public function edit($id){
        $categories = array();
        foreach (Category::all() as $category) {
            $categories[$category->id]=$category->name;
        }
        $posts = Post::findOrfail($id);
        return view('post.edit')
                ->with('posts',$posts)
                ->with('categories',$categories);
    }

    public function update(Request $request, $id){
        $validate = Validator::make($request->all(),[
            'category_id' => 'required|integer',
            'title' => 'required|max:20|min:3',
            'author' => 'required|max:20|min:3',
            'image' => 'mimes:jpg,jpeg,png,gif',
            'short_desc' => 'required|max:50|min:10',
            'description' => 'required|max:1000|min:50',
        ]);
        $post = Post::find($id);
        if($validate->fails()){
            return redirect('post/' . $post->id . '/edit')
                ->withInput()
                ->withErrors($validate);
        }
        if($request->file('image') != ""){
            $image = $request->file('image');
            $upload = 'img/posts/';
            $filename = time().$image->getClientOriginalName();
            $path = move_uploaded_file($image->getPathName(), $upload. $filename);
        }
        //update post
        $post->category_id = $request->category_id;
        $post->title = $request->Input('title');
        $post->author = $request->Input('author');
        if(isset($filename)){
            $post->image = $filename;
        }
        $post->short_desc = $request->Input('short_desc');
        $post->description = $request->Input('description');
        $post->save();
        Session::flash('post_update','Post Updated!!');
        return redirect('post');
    }

    public function destroy($id){
        $post = Post::find($id);
        $image_path = 'img/posts/'. $post->image;
        File::delete($image_path);
        $post->delete();
        Session::flash('post_delete','Selected Post Deleted!!');
        return redirect('post');
    }
}
