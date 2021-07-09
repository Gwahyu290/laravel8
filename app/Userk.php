<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Userk extends Model
{
    public function cabang()
    {
    	return $this->belongsTo('App\Cabang');
    }
}
