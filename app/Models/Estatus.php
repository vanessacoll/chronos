<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estatus extends Model
{
    use HasFactory;


    protected $table = 'estatus';

    public $timestamps = false;

    protected $fillable = [
        'id_status',
        'des_status',
       ];

    protected $primaryKey = 'id_status';

    public function tickets()
    {
       return $this->hasMany('App\Models\Tickets', 'id_status', 'id_status');
    }

     public function routers()
    {
        return $this->hasMany('App\Models\Routers', 'id_status', 'id_status');
    }

     public function perfiles()
    {
        return $this->hasMany('App\Models\Perfiles', 'id_status', 'id_status');
    }

    public function licencias()
    {
        return $this->hasMany('App\Models\Licencias', 'id_status', 'status');
    }
}
