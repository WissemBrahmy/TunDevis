<?php

namespace App\Http\Controllers\Web;

use App\Models\Attachment;
use App\Models\Category;
use App\Models\Post;
use App\Models\Region;
use App\Models\Response;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ResponseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user=Auth::user();
        $posts=Post::query();

        $posts=$posts->whereHas('responses',function ($query) use($request,$user){
            if($request->has('confirmed')==1){
                $s=$request->input('confirmed')==1?1:0;
                $query->whereConfirmed($s);
            }
            return $query ->where('user_id',$user->id);
        });
        $categories=Category::all();
        $regions=Region::all();

        $posts=$posts->with(['responses'=>function($query) use($user){
            return $query ->where('user_id',$user->id);
        },'user'])->paginate(2);

      return view("responses.index",compact('posts','categories','regions'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function confirm(Response $response)
    {
        $response->confirmed=!$response->confirmed;
        $response->update();

        return redirect()->to(route('posts.show',['id'=>$response->post_id]));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $user=Auth::user();
        $this->validate($request,[
            'devis'=>'required|file',
        ]);
       $this->validateRequest($request);
         $postId=$request->input('post_id');
         $response=new Response($request->all());
         $response->user_id=$user->id;

        DB::transaction(function() use($response,$request){
            $response->save();
            $response->storeFileAttachments($request);
        });

        return redirect()->to(route('posts.show',['id'=>$postId]));





    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Response $response)
    {

        $this->validateRequest($request);

        if($request->has('devis') || $request->has('images')){

            $response->storeFileAttachments($request);
        }

        $response->update($request->all());

        return redirect()->to(route('posts.show',['id'=>$response->post_id]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Response $response)
    {
        $post=$response->post_id;
        $response->delete();

        return redirect()->to(route('posts.show',['id'=>$post]));
    }

    private  function validateRequest(Request $request){
        $this->validate($request,[
            'description'=>'required',

            "post_id"=>"required|exists:posts,id",
            'price'=>"numeric",
            "qte"=>"numeric"
        ]);
    }
}
