<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barco extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'nome',
        'numero_IMO',
        'armador',
        'numero_registro',
        'indicativo_chamada',
        'ano_construcao',
        'numero_construcao',
        'estaleiro',
        'tipo_barco',
        'navegacao',
        'servico',
        'n_p_a',
        'cpmto_total',
        'cpmto_perpendicular',
        'manga',
        'strut',
        'tonelagem_bruta',
        'tonelagem_líquida',
        'transporte_bruto',
        'motor_ignicao',
        'qantidade',
        'marca',
        'modelo',
        'potencia/velocidade'
    ];

    public function oficinas(){
        return $this->belongsToMany('App\Models\Oficina' , 'barco_oficinas' , 'barco_id' , 'oficina_id')
        ->as('barcoOficina')
        ->withPivot(
            'barco_id',
            'oficina_id',
            'numero_orden'
        );
    }
}
