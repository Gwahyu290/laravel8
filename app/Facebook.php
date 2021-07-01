<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Facebook extends Model
{
    public function cabang()
    {
    	return $this->belongsTo('App\Cabang');
    }
    protected $table = "facebooks";
    protected $primaryKey ="id";
    protected $fillable =['id','nama','nama_id','tgl','cabang_id','link'];
}
