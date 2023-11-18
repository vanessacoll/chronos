<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

//nuevo
use App\Notifications\MyResetPassword;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'cuentas';

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id_cuenta',
        'nom_cuentas',
        'ape_cuentas',
        'id_licencia',
        'email',
        'password',
        'image_path',
    ];

     protected $primaryKey = 'id_cuenta';

     /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
   protected $hidden = [
        'password',
        'remember_token',
    ];


    public function routers()
    {
        return $this->hasMany('App\Models\Routers', 'id_cuenta', 'id_cuenta');
    }

    public function tickets()
    {
        return $this->hasMany('App\Models\Tickets', 'id_cuenta', 'id_cuenta');
    }

    public function perfiles()
    {
        return $this->hasMany('App\Models\Perfiles', 'id_cuenta', 'id_cuenta');
    }

    public function session()
    {
        return $this->hasMany('App\Models\Session', 'id_cuenta', 'id_cuenta');
    }

    public function sincronizacion()
    {
        return $this->hasMany('App\Models\Sincronizacion', 'id_cuenta', 'id_cuenta');
    }

    //nuevo

    public function sendPasswordResetNotification($token)
    {
    $this->notify(new MyResetPassword($token));
    }


  
}


