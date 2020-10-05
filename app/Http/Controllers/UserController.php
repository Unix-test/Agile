<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManagerStatic as Image;

class UserController extends Controller
{
    //
    public function profile(){
        return view('/users/profile',array('user'=> Auth::user()));
    }

    public function update_avatar(Request $request){
        if($request->hasFile('avatar')){
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            $img = Image::make($avatar->getRealPath());
            $img ->resize(300,300);
            $img ->save(public_path('/uploads/avatars/' . $filename));
//            Image::make(($avatar)->resize(300,300) ->save(public_path('/uploads/avatars/' . $filename)));

            $user = Auth::user();
            $user->avatar = $filename;
            $user->save();
        }
        return view('/users/profile',array('user'=> Auth::user()));
    }
}
