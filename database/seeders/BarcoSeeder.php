<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarcoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('barcos')->insert([
            [
                
                'nome' => 'test',
                'numero_IMO' => '098765',
                'armador' => 'pedro',
                'numero_registro' => '454545',
                'indicativo_chamada' => 'activa',
                'ano_construcao' => '2021/11/17',
                'numero_construcao' => '1212',
                'estaleiro' => 'juan',
                'tipo_barco' => 'jate',
                'navegacao' => 'new',
                'servico' => 'mantenimiento',
                'n_p_a' => '20',
                'cpmto_total' => '79',
                'cpmto_perpendicular'=> '80' ,
                'manga' => 'no se',
                'strut' => 'esmeralda',
                'tonelagem_bruta' => '10',
                'tonelagem_líquida' => '20',
                'transporte_bruto' => 'ese bruto',
                'motor_ignicao' => 'modelo TYE',
                'qantidade' => '100',
                'marca' => 'full stack',
                'modelo' => 'RQTY',
                'potencia/velocidade' => '2000k/h'
            ],
            
        ]);
    }
}
