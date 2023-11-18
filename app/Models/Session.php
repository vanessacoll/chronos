<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    use HasFactory;


    protected $table = 'session';

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id_session',
        'fecha_inicio',
        'fecha_fin',
        'id_cuenta',
        
    ];

     protected $primaryKey = 'id_session';


    public function user()
    {
        return $this->hasMany('App\Models\User', 'id_cuenta', 'id_cuenta');
    }
}
