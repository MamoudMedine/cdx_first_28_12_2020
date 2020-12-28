<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomePageController extends Controller
{
    // PAGE DE LOGIN
    public function home()
    {
        return redirect()->route('login');
    }
}
