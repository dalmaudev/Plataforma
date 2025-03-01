<?php

namespace Database\Seeders;

use App\Models\Proceso;
use Illuminate\Database\Seeder;

class ProcesoSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Proceso::create(['nombre' => "COMUNITARIO"]);
        Proceso::create(['nombre' => "ARRAIGO FAMILIAR"]);
        Proceso::create(['nombre' => "ARRAIGO SOCIAL RENOVACIONES"]);
        Proceso::create(['nombre' => "PAREJA DE HECHO"]);
        Proceso::create(['nombre' => "RECURSOS DE ASILO"]);
        Proceso::create(['nombre' => "NACIONALIDADES"]);
        Proceso::create(['nombre' => "ESCRITO DE SILENCIO POSITIVO"]);
        Proceso::create(['nombre' => "RECURSO CONTENCIOSO ADMINISTRATIVO"]);
        Proceso::create(['nombre' => "RENOVACION DE PERMISO DE ESTUDIO"]);
        Proceso::create(['nombre' => "NACIONALIDAD POR OPCION"]);
        Proceso::create(['nombre' => "NACIONALIDAD POR SIMPLE PRESUNCION"]);
        Proceso::create(['nombre' => "PENAL"]);
        Proceso::create(['nombre' => "CIVIL"]);
        Proceso::create(['nombre' => "LABORAL"]);
        Proceso::create(['nombre' => "AUTONOMOS"]);
        Proceso::create(['nombre' => "REGISTRO DE MATRIMONIO"]);
    }
}
