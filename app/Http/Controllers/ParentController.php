<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ParentController extends Controller
{
    public function index()
    {
        return view ('parent.index');
    }

    public function form()
    {
        return view ('parent.form');
    }
}
