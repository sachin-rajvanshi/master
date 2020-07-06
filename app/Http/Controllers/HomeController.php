<?php

namespace App\Http\Controllers;

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
        return view('home');
    }

    /**
     * Logout User
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function logout(Request $request) {
        \Auth::logout();
        \Session::flush();
        return redirect('admin/login');
    }
}
