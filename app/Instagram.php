<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instagram extends Model
{
    public function cabang()
    {
    	return $this->belongsTo('App\Cabang');
    }
     protected $table = "instagrams";
    protected $primaryKey ="id";
    protected $fillable =['id','nama_id','tgl','cabang_id','link'];

    public function users()
    {
    	return $this->belongsTo('App\Users');
    }
}
