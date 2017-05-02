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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$data = $this->find();
		return view('home', compact('data'));
        //return view('home');
    }

	public function find()
	{
		$sql = "SELECT * FROM gamou.MASCATE1";
		return \DB::connection()->select($sql);
	}
}
