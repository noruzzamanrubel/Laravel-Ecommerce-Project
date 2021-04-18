<?php

namespace App\Http\Controllers;
use Auth;

class MainUserController extends Controller
{
    public function Logout()
    {
        Auth::logout();
        return Redirect()->route('login');
    }
}
