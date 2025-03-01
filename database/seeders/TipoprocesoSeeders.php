<?php

namespace Database\Seeders;

use App\Models\Tipoproceso;
use Illuminate\Database\Seeder;

class TipoprocesoSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tipoproceso::create(['nombre' => 'PROCESO']);
        Tipoproceso::create(['nombre' => 'RECURSO']);
        Tipoproceso::create(['nombre' => 'TERMINADO']);
        Tipoproceso::create(['nombre' => 'REQUERIMIENTO']);
    }
}
