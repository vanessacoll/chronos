<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Licencias extends Model
{
    use HasFactory;

    protected $table = 'licencias';

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'tip_licencia',
        'license_key',
        'dispositivo',
        'fecha_inicio',
        'fecha_vencimiento',
        'status',
        'id_licencia',
        'nt_vc',
        'nt_lvc',
    ];

//     protected $primaryKey = 'license_key';


    public function tip_licencias()
    {
       return $this->belongsTo('App\Models\Tip_licencias', 'tip_licencia', 'id_licencia');
    }

    public function statuses()
    {
        return $this->belongsTo('App\Models\Estatus', 'status', 'id_status');
    }
}
