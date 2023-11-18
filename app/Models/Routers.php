<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Routers extends Model
{
    use HasFactory;

    protected $table = 'routers';

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id_routers',
        'nom_routers',
        'ip_private',
        'id_cuenta',
        'puerto',
        'nom_conex',
        'password',
        'serial_dis',
        'id_status',
    ];

     protected $primaryKey = 'id_routers';




     public function user()
    {
       return $this->belongsTo('App\Models\User', 'id_cuenta', 'id_cuenta');
    }

    public function tickets()
    {
       return $this->hasMany('App\Models\Tickets', 'id_routers', 'id_routers');
    }

    public function perfiles()
    {
        return $this->hasMany('App\Models\Perfiles', 'id_routers', 'id_routers');
    }

    public function status()
    {
        return $this->belongsTo('App\Models\Estatus', 'id_status', 'id_status');
    }

     
}
