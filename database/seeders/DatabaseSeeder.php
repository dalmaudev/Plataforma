<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(DecisionSeeders::class);
        $this->call(DocumentoSeeder::class);
        $this->call(EstadocivilSeeders::class);
        $this->call(ProvinciaSeeders::class);
        $this->call(LocalidadSeeders::class);
        $this->call(NacionalidadSeeders::class);
        $this->call(PresentoSeeders::class);
        $this->call(ProcesoSeeders::class);
        $this->call(SexoSeeders::class);
        
        $this->call(RecursoSeeders::class);

        $this->call(TipoprocesoSeeders::class);
        
        
        
    }
}
