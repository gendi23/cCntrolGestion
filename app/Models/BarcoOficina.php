<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class BarcoOficina extends Pivot
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $table ='barco_oficinas';
    protected $fillable = [

        'barco_id',
        'oficina_id',
        'numero_orden',
        'nome',
        'status_id',
        'nome_documento',
        'url_documento'
    ];

}
