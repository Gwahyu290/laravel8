<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Whatsapp extends Model
{
    public function cabang()
    {
    	return $this->belongsTo('App\Cabang');
    }
    protected $table = "whatsapps";
    protected $primaryKey ="id";
    protected $fillable =['id','nama','nama_id','tgl','cabang_id','gambar'];
}
