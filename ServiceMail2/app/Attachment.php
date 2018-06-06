<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    //
    protected $table = "Attachments";
    protected $fillable = ["link","email_id","filename"];
    public $timestamps = false;

    public function compose()
    {
        return $this->belongsTo('App\Compose','email_id','id');
    }

}
