<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Session;
use Hash;
use Validator;
use Auth;

class UserController extends Controller {
    public function index(){
        return view('admin.index');
    }

    public function edit($id){
        $users = User::find($id);
        return view('auth.change_password')
                ->with('users',$users);
    }

    public function update(Request $request, $id){
        $validate = Validator::make($request->all(),[
            'password' => 'required|min:3|confirmed',
        ]);
        if($validate->fails()){
            return redirect('user/' . Auth::user()->id . '/edit')
                ->withInput()
                ->withErrors($validate);
        }
        
        //update admin password
        $user = User::find($id);
        $user ->fill([
            'password' => Hash::make($request->password)
        ]);
        Session::flash('user_update','Password Changed');
        return redirect('user');
    }
}
