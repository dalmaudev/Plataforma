<?php

namespace Database\Seeders;

use App\Models\Sexo;
use Illuminate\Database\Seeder;

class SexoSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Sexo::create(['nombre' => 'MASCULINO']);
        Sexo::create(['nombre' => 'FEMENINO']);
    }
}
