<?php

namespace App\Http\Controllers;

use App\Mail\Welcome;
//use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * HomeController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->check()) {
            $user = auth()->user();
            \Mail::to($user)->send(new Welcome($user));
        }
        return view('welcome');
    }
}
