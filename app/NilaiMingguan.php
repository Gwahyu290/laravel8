<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NilaiMingguan extends Model
{
     protected $table = "rekap";
    protected $primaryKey ="id";
    protected $fillable =['id_mingguan','nama_id','tgl','ar','wa','pam'];

}
