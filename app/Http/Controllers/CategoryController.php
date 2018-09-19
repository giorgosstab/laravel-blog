<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator;
use App\Category;
use Session;

class CategoryController extends Controller {
    public function __constructor() {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function index(){
        $categories = Category::all();
        return view('category.main')
                ->with('categories',$categories);
    }

    public function create(){
        return view('category.create');
    }

    public function store(Request $request){
        $validate = Validator::make($request->all(),[
            'name' => 'required|max:20|min:3',
        ]);
        if($validate->fails()){
            return redirect('category/create')
                ->withInput()
                ->withErrors($validate);
        }
        
        //crete category
        $category = new Category;
        $category->name = $request->name;
        $category->save();
        Session::flash('category_create','New category is Created');
        return redirect('category/create');
    }

    public function edit($id){
        $categories = Category::findorfail($id);
        return view('category.edit')
                ->with('categories',$categories);
    }

    public function update(Request $request, $id){
        $validate = Validator::make($request->all(),[
            'name' => 'required|max:20|min:3',
        ]);
        if($validate->fails()){
            return redirect('category/' . $category->id . '/edit')
                ->withInput()
                ->withErrors($validate);
        }
        
        //update category
        $category = Category::find($id);
        $category->name = $request->Input('name');
        $category->save();
        Session::flash('category_update','Selected category Updated');
        return redirect('category');
    }

    public function destroy($id){
        $categories = Category::find($id);
        $categories->delete();
        Session::flash('category_delete','Selected category Deleted');
        return redirect('category');
    }
}
