<?php

namespace App\Http\Controllers;

use App\Models\Band;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $band = Band::find(1);
        return view('home');
    }
}
