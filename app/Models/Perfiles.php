<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perfiles extends Model
{
    use HasFactory;

    protected $table = 'perfiles';

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id_perfil',
        'id_routers',
        'nombre',
        'tiempo',
        'tipo',
        'id_cuenta',
        'id_local',
        'id_status',
        'fecha',
        'users',
    ];

     protected $primaryKey = 'id_perfil';


     public function user()
    {
       return $this->belongsTo('App\Models\User', 'id_cuenta', 'id_cuenta');
    }

    public function routers()
    {
       return $this->belongsTo('App\Models\Routers', 'id_routers', 'id_routers');
    }

	public function tickets()
    {
       return $this->hasMany('App\Models\Tickets', 'id_perfil', 'id_perfil');
    }

    public function status()
    {
        return $this->belongsTo('App\Models\Estatus', 'id_status', 'id_status');
    }

    public function tipo_perfiles()
    {
        return $this->belongsTo('App\Models\Tipo_perfil', 'tipo', 'id_tipo_perfil');
    }
}

