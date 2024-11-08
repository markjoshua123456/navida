<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventController extends Controller
{
    //
    public function viewEvents()
    {
        return view('events.viewEvents');
    }
}
