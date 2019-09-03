<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    public $timestamps=true;
    public $fillable=[
        'url','response_id'
    ];

}
