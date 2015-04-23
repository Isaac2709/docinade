<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use \App\Enfasis;

class EnfasisTableSeeder extends Seeder {

    public function run()
    {
        DB::table('ASP_Enfasis')->delete();

        Enfasis::create(['Enf_Nombre' => 'Sistemas de producción agrícola(SPA)']);
        Enfasis::create(['Enf_Nombre' => 'Gestión de recursos naturales (GRN)']);
        Enfasis::create(['Enf_Nombre' => 'Gestión y cultura ambiental (GCA)']);
        Enfasis::create(['Enf_Nombre' => 'Tecnologías electrónicas aplicadas (TEA)']);
    }
}