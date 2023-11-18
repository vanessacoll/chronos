<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tip_licencias extends Model
{
    use HasFactory;

    protected $table = 'tip_licencias';

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id_licencia',
        'nombre',
        'max_dis',
        'precio',
        'duracion',
    ];

     protected $primaryKey = 'id_licencia';


    public function licencias()
    {
        return $this->hasMany('App\Models\Licencias', 'id_licencia', 'tip_licencia');
    }
}
