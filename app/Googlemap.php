<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Googlemap extends Model
{
    public function cabang()
    {
    	return $this->belongsTo('App\Cabang');
    }
    protected $table = "googlemaps";
    protected $primaryKey ="id";
    protected $fillable =['id','nama','tgl','cabang_id','link'];
}
