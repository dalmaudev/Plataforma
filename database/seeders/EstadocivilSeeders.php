<?php

namespace Database\Seeders;

use App\Models\Estadocivil;
use Illuminate\Database\Seeder;

class EstadocivilSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Estadocivil::create(['nombre' => 'SOLTERO']);
        Estadocivil::create(['nombre' => 'CASADO']);
        Estadocivil::create(['nombre' => 'DIVORCIADO']);
        Estadocivil::create(['nombre' => 'OTRO']);
    }
}
