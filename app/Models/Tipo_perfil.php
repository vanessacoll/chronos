<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipo_perfil extends Model
{
    use HasFactory;

	protected $table = 'tipo_perfil';

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id_tipo_perfil',
        'des_tipo_perfil',
    ];

     protected $primaryKey = 'id_tipo_perfil';


    public function perfiles()
    {
        return $this->hasMany('App\Models\Perfiles', 'id_tipo_perfil', 'tipo');
    }
}
