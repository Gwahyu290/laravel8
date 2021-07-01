<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Cabang;
use DB;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email','level','alamat','no_tlpn','android','password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function cabang()
    {
        return $this->belongsTo('App\Cabang');
    }
    public function wilayah($data){
        return $data;
    }
    public function tanggal($data){
        $isi = DB::table('users')->rightjoin('facebooks','users.id','=','facebooks.nama')->where('users.id','=',$data)->get();
        // dd($isi);
        $a="";
        foreach ($isi as $i) {
            $a = $i->tgl;
        }
        return $a;
    }
    public function fb($data){
        return $data;
    }
    public function ins($data){
        return $data;
    }
    public function gm($data){
        return $data;
    }
    public function total($data){
        return $data;
    }
    

}
