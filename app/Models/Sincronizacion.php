<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sincronizacion extends Model
{
    use HasFactory;

     protected $table = 'sincronizacion';

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id_cuenta',
        'fecha',
        'id_sincronizacion',
        
    ];

     protected $primaryKey = 'id_sincronizacion';


    public function user()
    {
        return $this->hasMany('App\Models\User', 'id_cuenta', 'id_cuenta');
    }
}
