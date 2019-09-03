<?php

namespace App\Http\Controllers\Web;

use App\Http\Requests\StorePost;
use App\Models\Category;
use App\Models\Post;
use App\Models\Region;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user=Auth::user();

        $posts=Post::where('user_id',$user->id)
            ->paginate(2);


        return view("posts.index",compact('posts'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all();
        $regions=Region::all();
        return view('posts.create',compact('categories','regions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePost $request)
    {

        $user=Auth::user();
        $data=$request->all();

        $data=array_merge($data,['user_id'=>$user->id]);
        $post=new Post($data);
        if($request->hasFile('avatar')){

            $file=$request->file('avatar');
            $fileName=uniqid("a_").'.'.$file->getClientOriginalExtension();

            $file->move(public_path().'/avatars',$fileName);

            $post->photo_url='/avatars/'.$fileName;

        }
        $post->save();
        return redirect()->route("posts.index")->with('message','Publication ajoutée avec succee');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {

        return view("posts.show",compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post){
        $categories=Category::all();
        $regions=Region::all();
        return view('posts.edit', compact('post','categories','regions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Post $post){
       $post->update($request->all());
        return redirect()->to(route('posts.index',['id'=>$post->id]))->with('message','Publication modifiée');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->to(route('posts.index'))->with('message','Publication suprimée');

    }
}
