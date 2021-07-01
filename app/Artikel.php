<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    public function cabang()
    {
    	return $this->belongsTo('App\Cabang');
    }
    protected $table = "artikels";
    protected $primaryKey ="id";
    protected $fillable =['id','nama','tgl','cabang_id','gambar'];
}
