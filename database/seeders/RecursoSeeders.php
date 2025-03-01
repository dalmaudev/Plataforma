<?php

namespace Database\Seeders;

use App\Models\Recurso;
use Illuminate\Database\Seeder;

class RecursoSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Recurso::create(['nombre' => 'FAVORABLE']);
        Recurso::create(['nombre' => 'NO FAVORABLE']);
        Recurso::create(['nombre' => 'EN TRAMITE']);
    }
}
