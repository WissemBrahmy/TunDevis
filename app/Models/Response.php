<?php

namespace App\Models;

use App\User;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Response extends Model
{
    protected $fillable=[
        'post_id','user_id','description','qte','price','address'
    ];
    public $timestamps=true;

    public function post(){
        return $this->belongsTo(Post::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function attachments(){
        return $this->hasMany(Attachment::class);
    }
    public function scopeConfirmed($query){
        return $query->whereConfirmed(1);
    }

    public function storeFileAttachments(Request $request){

        if($request->has('images')){
            $images=$request->file('images');

            foreach ($images as $image){
                $imageName=uniqid("d_").'.'.$image->getClientOriginalExtension();

                 Attachment::where('response_id',$this->id)->delete();

                $image->move(public_path().'/attachments',$imageName);
                Attachment::create([

                    'url'=> '/attachments/'.$imageName,
                    'response_id'=>$this->id

                ]);


            }
        }

        if($request->hasFile('devis')){
            if(!is_null($this->devis_url)){

            }
            $file=$request->file('devis');
            $fileName=uniqid("d_").'.'.$file->getClientOriginalExtension();

            $file->move(public_path().'/devis',$fileName);

            $this->devis_url='/devis/'.$fileName;
            $this->save();

        }
    }

}
