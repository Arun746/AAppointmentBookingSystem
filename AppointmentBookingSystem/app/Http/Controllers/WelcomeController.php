<?php

namespace App\Http\Controllers;

use App\Models\FAQ;
use App\Models\Page;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        return view('frontend.layout');
    }

    public function dynamic()
    {
        // dd($page);

        return view('frontend.welcome');
    }
}
