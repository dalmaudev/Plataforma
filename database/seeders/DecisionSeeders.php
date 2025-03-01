<?php

namespace Database\Seeders;

use App\Models\Desicion;
use Illuminate\Database\Seeder;

class DecisionSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Desicion::create(['nombre' => 'PENDIENTE']);
        Desicion::create(['nombre' => 'A TRAMITE']);
        Desicion::create(['nombre' => 'FAVORABLE']);
        Desicion::create(['nombre' => 'NO FAVORABLE']);
        Desicion::create(['nombre' => 'INADMITIDO']);
    }
}
