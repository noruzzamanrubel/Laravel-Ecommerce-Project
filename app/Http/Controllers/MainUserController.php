<?php

namespace App\Http\Controllers;

use App\Models\User;
use Auth;
use Illuminate\Http\Request;

class MainUserController extends Controller
{
    public function Logout()
    {
        Auth::logout();
        return Redirect()->route('login');
    }

    public function UserProfile()
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('user.profile.view_profile', compact('user'));
    }

    public function UserProfileEdit()
    {
        $id = Auth::user()->id;
        $editdata = User::find($id);
        return view('user.profile.view_profile_edit', compact('editdata'));
    }
    public function UserProfileStore(Request $request)
    {
        $id = Auth::user()->id;
        $data = User::find($id);
        $data->name = $request->name;
        $data->email = $request->email;

        if ($request->file('profile_photo_path')) {
            $file = $request->file('profile_photo_path');
            @unlink(public_path('upload/user_images/' . $data->profile_photo_path));
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/user_images'), $filename);
            $data['profile_photo_path'] = $filename;
        }

        $data->save();

        $notification = array(
            'message' => 'User Profile Update Successfully',
            'alert-type' => 'success',
        );
        
        return redirect()->route('user.profile')->with($notification);
    }
}
