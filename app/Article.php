<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //
    protected $fillable=['title','status','user_id'];

    protected $table='article';

    public function user()
    {
       return $this->belongsTo('App\User','user_id','id');
    }
}
