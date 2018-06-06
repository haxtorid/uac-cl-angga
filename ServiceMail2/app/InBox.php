<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InBox extends Model
{
    protected $table = "inbox";
    protected $fillabale = ["email_id", "user_id"];
    public $timestamps = false;
    //
    public function compose()
    {
        return $this->belongsTo('App\Compose','email_id','id');
    }

    public function user()
    {
        return $this->hasOne('App\User','user_id','id');
    }

    
}
