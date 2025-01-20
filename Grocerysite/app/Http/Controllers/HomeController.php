<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // This will return our home.blade.php soon
        return view('home');
    }
}
