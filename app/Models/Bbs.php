<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class bbs extends Model
{
    public function category(){
        return $this->belongsTo('App\Models\Category');
}


}
