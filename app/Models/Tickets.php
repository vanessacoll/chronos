<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tickets extends Model
{
    use HasFactory;


    protected $table = 'tickets';

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id_ticket',
        'limit_uptime',
        'uptime',
        'id_status',
        'id_cuenta',
        'id_routers',
        'usuario',
        'clave',
        'id_perfil',
        'precio',
        'fecha_creacion',
    ];

     protected $primaryKey = 'id_ticket';


     public function user()
    {
       return $this->belongsTo('App\Models\User', 'id_cuenta', 'id_cuenta');
    }

    public function routers()
    {
       return $this->belongsTo('App\Models\Routers', 'id_routers', 'id_routers');
    }

    public function status()
    {
        return $this->belongsTo('App\Models\Estatus', 'id_status', 'id_status');
    }

    public function perfiles()
    {
        return $this->belongsTo('App\Models\Perfiles', 'id_perfil', 'id_perfil');
    }
}
