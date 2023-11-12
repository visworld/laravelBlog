<?php

namespace App\Http\Controllers;
use auth;
use Illuminate\Http\Request;
use App\Models\Post;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts=Post::get();
        if(auth::check()){
            if(Auth::user()->user_type===1){
                return view('ADMIN.home',compact('posts'));
            }
       }else{
            return view('home',compact('posts'));
        }
    }
}
