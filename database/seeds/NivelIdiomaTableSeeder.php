<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use \App\NivelIdioma;

class NivelIdiomaTableSeeder extends Seeder {

    public function run()
    {
        DB::table('ASP_Nivel')->delete();

        NivelIdioma::create(['Niv_Nombre' => 'Basico']);
        NivelIdioma::create(['Niv_Nombre' => 'Intermedio']);
        NivelIdioma::create(['Niv_Nombre' => 'Avanzado']);
    }
}