<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Favorites extends Model
{
    use Notifiable;
    //

    protected $fillable = ['user_id','urlToImage','url','title','description','author'];
}
