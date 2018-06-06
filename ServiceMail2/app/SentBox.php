<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SentBox extends Model
{
    protected $table    = "sent_boxes";
    protected $fillable = ["email_id", "user_id"];
    public $timestamps  = false;

    public function compose()
    {
        return $this->belongsTo('App\Compose','email_id','id');
    }

    public function user()
    {
        return $this->hasOne('App\User','user_id','id');
    }

}
