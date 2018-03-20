<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $arr['pages'] = DB::table("tblpages")->count();
        $arr['posts'] = DB::table("tblposts")->count();
        $arr['users'] = DB::table("users")->count();
        return view('dashboard', $arr);
    }
}
