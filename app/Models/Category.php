<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function bbs(){
        return $this->belongsTo('App\Models\Bbs');
    }
}
