<?php

namespace App\Http\Controllers\Web;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
        return view('profil');
    }

    public function updateAvatar(Request $request){

        $user=Auth::user();

        if($user->avatar_url){
            //Perform deletion
        }


        if($request->hasFile('avatar')){


            $file=$request->file('avatar');
            $fileName=uniqid("a_").'.'.$file->getClientOriginalExtension();

            $file->move(public_path().'/avatars',$fileName);

            $user->avatar='/avatars/'.$fileName;
        }
        $user->update();

        return redirect()->to(route('me'));
    }

    public function updateInfo(Request $request, User $user){

        $user=Auth::user();



        $user->update($request->all());

        return redirect()->to(route('me',['id'=>$user->id]))->with('message','Votre données est modifiée avec succes');
    }

    public function edit(User $user){

        return view('profile.edit');
    }

    public function updatePassword(Request $request)

    {
        $this->validate($request,["password"=>"required","new_password"=>"required|confirmed"]);

        $user=Auth::user();
        if(!Hash::check($request->password,$user->password)){

            return redirect()->back()->withErrors(["password"=>"password does not match"]);
        }
        else{
            $user->password=Hash::make($request->new_password);

            $user->save();
            return redirect()->back()->with("status","Mot de passe modfié");
        }
        //
    }
}

