<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CocheWebController extends Controller
{
    public function index()
    {
        return view('coches.index');
    }
}
