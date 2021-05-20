<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;

class UserRoleController extends Controller
{
    public function UserRole()
    {
        $user = User::where('type', 2)->get();
        return view('admin.role.all_role', compact('user'));
    }
}
