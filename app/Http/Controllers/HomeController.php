<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Region;
use Illuminate\Http\Request;

use App\Models\Post;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $posts=Post::region($request->input('region_id'))
            ->category($request->input('category_id'))

            ->paginate(2);

        $categories=Category::all();
        $regions=Region::all();


        return view("home",compact('posts','categories','regions'));
    }
    public function agreements(Request $request)
    {



        return view("agreements");
    }
    public function about(Request $request)
    {



        return view("about");
    }
    public function terms_of_use(Request $request)
    {



        return view("terms_of_use");
    }
    public function show(Post $post)
    {


        return view("show",compact('post'));
    }
}
