<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuentas_eliminadas extends Model
{
    use HasFactory;

    protected $table = 'cuentas_eliminadas';

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'id_cuenta',
        'nom_cuentas',
        'ape_cuentas',
        'email',
        'password',
        'image_path',
    ];

    protected $primaryKey = 'id';
}
