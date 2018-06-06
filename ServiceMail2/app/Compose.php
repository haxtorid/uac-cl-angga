<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class Compose extends Model
{
    protected $table = "compose";
    protected $fillable = ["user_id","subject","content","created_at","user_id"];
    public $timestamps = false;
    //
    public function user()
    {
        return $this->belongsTo('App\User','user_id','id');
    }

    public function inbox()
    {
        return $this->hasMany('App\InBox','email_id','id');
    }

    public function sentbox()
    {
        return $this->hasMany('App\SentBox','email_id','id');
    }

    public function attachments() 
    {
        return $this->hasMany('App\Attachment','email_id','id');
    }
}
