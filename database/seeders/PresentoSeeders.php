<?php

namespace Database\Seeders;

use App\Models\Presento;
use Illuminate\Database\Seeder;

class PresentoSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Presento::create(['nombre' => "SI"]);
        Presento::create(['nombre' => "NO"]);
    }
}
