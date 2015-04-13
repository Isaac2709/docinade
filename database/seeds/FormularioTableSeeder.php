<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class FormularioTableSeeder extends Seeder {

    public function run()
    {
        DB::table('ASP_Aspirante')->delete();

        User::create([	'Asp_Fecha_Envio' => '',
        				'Asp_Fotografia' => '',
        				'Asp_Pasaporte_Adj' => '',
        				'Asp_ID_InfoPer' => '',
        				'Asp_Lugar_Nac' => '',
        				'Asp_ID_Nac' => '',
        				'Asp_ID_Enfasis' => '',
        				'Asp_ID_Dir_Actual' => '',
        				'Asp_ID_Area_Interes' => '',
        				'Asp_Acceso_Biblioteca' => '',
        				'Asp_Acceso_Proc_DatoS' => '',
        				'Asp_Acceso_Windows' => '',
        				'Asp_Acceso_Email' => '',
        				'Asp_Utilizacion_Progra_Comp' => '',
        				'Asp_Conoc_Educacion_Dist' => '',
        				'ID_Prop_Tesis' => '']);
    }

}
