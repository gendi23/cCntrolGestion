<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarcoOficinaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('barco_oficinas')->insert([
            [
                'barco_id' => 1,
                'oficina_id' => 1,
                'numero_orden'=> 'SAN-121'
            ]
        ]);
    }
}
