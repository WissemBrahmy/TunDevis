<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Post extends Model
{
    protected $fillable=[
      'title','description','user_id','region_id','category_id','phone','address'
    ];

    public function responses(){
        return $this->hasMany(Response::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
    public $timestamps=true;

    public static function scopeRegion($query,$region_id=null){
        if($region_id)
           return $query->where('region_id',$region_id);
        return $query;
    }

    public static function scopeCategory($query,$category_id=null){
        if($category_id)
           return $query->where('category_id',$category_id);

        return $query;
    }

}
