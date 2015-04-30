<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use \App\GradoAcademico;

class GradoAcademicoTableSeeder extends Seeder {

    public function run()
    {
        DB::table('GEN_Grado_Acad')->delete();

        GradoAcademico::create(['Gra_Nombre' => 'Bachiller']);
        GradoAcademico::create(['Gra_Nombre' => 'Maestría']);
        GradoAcademico::create(['Gra_Nombre' => 'Doctorado']);
        // GradoAcademico::create(['Gra_Nombre' => 'Gestión de recursos naturales (GRN)']);
    }
}