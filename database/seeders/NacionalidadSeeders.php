<?php

namespace Database\Seeders;

use App\Models\Pais;
use Illuminate\Database\Seeder;

class NacionalidadSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        Pais::create(['nombre' => 'ARGENTINA']);
        Pais::create(['nombre' => 'BOLIVIA']);
        Pais::create(['nombre' => 'BRASIL']);
        Pais::create(['nombre' => 'CHILE']);
        Pais::create(['nombre' => 'CHINA']);
        Pais::create(['nombre' => 'COLOMBIA']);
        Pais::create(['nombre' => 'CUBA']);
        Pais::create(['nombre' => 'ECUADOR']);
        Pais::create(['nombre' => 'HONDURAS']);
        Pais::create(['nombre' => 'MARRUECOS']);
        Pais::create(['nombre' => 'MEXICO']);
        Pais::create(['nombre' => 'NICARAGUA']);
        Pais::create(['nombre' => 'PAKISTAN']);
        Pais::create(['nombre' => 'PERU']);
        Pais::create(['nombre' => 'REP. DOMINICANA']);
        Pais::create(['nombre' => 'SENEGAL']);
        Pais::create(['nombre' => 'URUGUAY']);
        Pais::create(['nombre' => 'VENEZUELA']);
        Pais::create(['nombre' => 'PARAGUAY']);
        Pais::create(['nombre' => 'ESPAÑOLA']);
        

    }
}
