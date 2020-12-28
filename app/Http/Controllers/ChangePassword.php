<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Illuminate\Support\Facades\Hash;
 
class ChangePassword extends Controller
{
    public function CPassword(){
        return view('admin.body.change_password');
    }

    public function UpdatePassword(Request $request){
        $validateData = $request->validate([
            'old_password' => 'required',
            'password' => 'required|confirmed',
        ]);

        $hashedPassword = Auth::user()->password;
        // check if auth password matches old_password
        if(Hash::check($request->old_password, $hashedPassword)){
            $user = User::find(Auth::user());
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();
            return redirect()->route('login')->with('success', 'Password Updated');
        }else {
            return redirect()->back()->with('error', 'current password is invalid');
        }
    }


    public function Profile(){
        if(Auth::user()){
            $user = User::find(Auth::user()->id);
            if($user){
                return view('admin.body.update_profile', compact('user'));
            }
        }
    }


    public function UpdateProfile(Request $request){


        $new_image = $request->file('image');
        
        $unique_id = hexdec(uniqid());
        $image_ext = strtolower($new_image->getClientOriginalExtension());
        $image_name = $unique_id.'.'.$image_ext;
        $path = 'storage/profile-photos/';
        $saveDB = 'profile-photos/'.$image_name;
        $new_image->move($path, $image_name);

        $user = User::find(Auth::user()->id);
        if($user){
          $user->name = $request->name;
          $user->email = $request->email;
          $user->profile_photo_path = $saveDB;
          $user->save();
          return redirect()->back()->with('success', 'Profile Updated');
        }else {
            return redirect()->back()->with('error', 'Not Updated');
        }
    }
}
