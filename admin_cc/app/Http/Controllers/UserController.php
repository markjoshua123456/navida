<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function viewProfilePage()
    {
        return view('user.profile_page');
    }
}
