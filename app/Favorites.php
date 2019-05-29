<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favorites extends Model
{
    //

    protected $fillable = ['user_id','urlToImage','url','title','description'];
}
