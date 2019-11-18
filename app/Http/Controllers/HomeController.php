<?php

namespace App\Http\Controllers;

use App\Documents;
use Carbon\Carbon;
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
        $num_docs = Documents::all()->count();
        $last_fifteen_num_doc = Documents::whereBetween('created_at',[Carbon::now()->subDays(15),Carbon::now()])->count();
        $recently_added_docs = Documents::limit(5)->latest()->get();
        return view('home',compact('num_docs','last_fifteen_num_doc','recently_added_docs'));
    }
}
