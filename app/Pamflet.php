<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pamflet extends Model
{
    public function cabang()
    {
    	return $this->belongsTo('App\Cabang');
    }
    protected $table = "pamflets";
    protected $primaryKey ="id";
    protected $fillable =['id','nama','tgl','cabang_id','gambar'];
}
