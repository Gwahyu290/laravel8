<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NilaiHarian extends Model
{
    public function cabang()
    {
    	return $this->belongsTo('App\Cabang');
    }
     protected $table = "rekap";
    protected $primaryKey ="id";
    protected $fillable =['id_rekap','nama_id','tgl','fb','gm','ig'];

    public function users()
    {
    	return $this->belongsTo('App\Users');
    }
}
