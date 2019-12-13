<?php

namespace App\Http\Controllers;

Use Alert;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        toast('Welcome '. auth()->user()->name .'!','success');
        return view('home');
    }

    public function profile()
    {
        return view('profile.index');
    }
}
