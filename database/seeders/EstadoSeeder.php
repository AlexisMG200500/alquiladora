<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Estado;
use Carbon\Carbon;

class EstadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Estado::insert([
            [
                'estado'=>'CDMX',
                'created_at'=>Carbon::now('America/Mexico_City'),
                'updated_at'=>Carbon::now('America/Mexico_City'),
            ],
            [
                'estado'=>'Estado de México',
                'created_at'=>Carbon::now('America/Mexico_City'),
                'updated_at'=>Carbon::now('America/Mexico_City'),
            ]
        ]);        
    }
}
