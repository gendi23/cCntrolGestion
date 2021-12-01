<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OficinaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('oficinas')->insert([
            [
                'nome' => 'RIO'
            ],
            [
                'nome' => 'SAN'
            ],
            [
                'nome' => 'SAT'
            ],
            
        ]);
    
    }
}
