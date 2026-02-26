<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Home;

class FrontController extends Controller
{
    public function index()
    {
        $home = Home::first();

        return view('pages.index', compact('home'));
    }
}
