<?php

namespace Database\Seeders;

use App\Models\Documento;
use Illuminate\Database\Seeder;

class DocumentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Documento::create(['nombre' => 'TARJETA RESIDENTE']);
        Documento::create(['nombre' => 'TARJETA UE']);
        Documento::create(['nombre' => 'PASAPORTE']);
        Documento::create(['nombre' => 'DNI']);
        Documento::create(['nombre' => 'OTRO']);
    }
}
