<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use \App\Nacionalidad;
use \App\Pais;

class NacionalidadTableSeeder extends Seeder {

    public function run()
    {
        DB::table('Asp_Nacionalidad')->delete();

        Nacionalidad::create(['Nac_Nombre' => 'Afgano/na']);
        Nacionalidad::create(['Nac_Nombre' => 'Albanés/sa']);
        Nacionalidad::create(['Nac_Nombre' => 'Alemán/na']);
        Nacionalidad::create(['Nac_Nombre' => 'Alemán/na']);
        Nacionalidad::create(['Nac_Nombre' => 'Andorrano/na']);
        Nacionalidad::create(['Nac_Nombre' => 'Angolano/na']);
        Nacionalidad::create(['Nac_Nombre' => 'Antiguano/na']);
        Nacionalidad::create(['Nac_Nombre' => 'Saudí/Saudita']);
        Nacionalidad::create(['Nac_Nombre' => 'Argelino/na']);
        Nacionalidad::create(['Nac_Nombre' => 'Argentino/a']);
        Nacionalidad::create(['Nac_Nombre' => 'Armenio/nia']);
        Nacionalidad::create(['Nac_Nombre' => 'Australiano/na']);
        Nacionalidad::create(['Nac_Nombre' => 'Austriaco/ca']);
        Nacionalidad::create(['Nac_Nombre' => 'Azerbaiyano/na']);
        Nacionalidad::create(['Nac_Nombre' => 'Bahameño/ña']);
        Nacionalidad::create(['Nac_Nombre' => 'Bangladesí']);
        Nacionalidad::create(['Nac_Nombre' => 'Barbadense']);
        Nacionalidad::create(['Nac_Nombre' => 'Bareiní']);
        Nacionalidad::create(['Nac_Nombre' => 'Belga']);
        Nacionalidad::create(['Nac_Nombre' => 'Beliceño/ña']);

        Nacionalidad::create(['Nac_Nombre' => 'Beninés/sa']);
        Nacionalidad::create(['Nac_Nombre' => 'Bielorruso/sa']);
        Nacionalidad::create(['Nac_Nombre' => 'Birmano/na']);
        Nacionalidad::create(['Nac_Nombre' => 'Boliviano/a']);
        Nacionalidad::create(['Nac_Nombre' => 'Bosnio/nia;']);
        Nacionalidad::create(['Nac_Nombre' => 'Botsuano/na']);
        Nacionalidad::create(['Nac_Nombre' => 'Brasileño/a']);
        Nacionalidad::create(['Nac_Nombre' => 'Bruneano/na']);
        Nacionalidad::create(['Nac_Nombre' => 'Búlgaro/ra']);
        Nacionalidad::create(['Nac_Nombre' => 'Burkinés']);
        Nacionalidad::create(['Nac_Nombre' => 'Burundés/sa']);
        Nacionalidad::create(['Nac_Nombre' => 'Butanés/sa']);
        Nacionalidad::create(['Nac_Nombre' => 'Caboverdiano/na']);
        Nacionalidad::create(['Nac_Nombre' => 'Camboyano/na']);
        Nacionalidad::create(['Nac_Nombre' => 'Camerunés/sa']);
        Nacionalidad::create(['Nac_Nombre' => 'Canadiense']);
        Nacionalidad::create(['Nac_Nombre' => 'Catarí']);
        Nacionalidad::create(['Nac_Nombre' => 'Chadiano/na']);
        Nacionalidad::create(['Nac_Nombre' => 'Chileno/a']);
        Nacionalidad::create(['Nac_Nombre' => 'Chino/na']);
        Nacionalidad::create(['Nac_Nombre' => 'Chipriota']);
        Nacionalidad::create(['Nac_Nombre' => 'Vaticano/na']);
        Nacionalidad::create(['Nac_Nombre' => 'Colombiano/a']);
        Nacionalidad::create(['Nac_Nombre' => 'Comorense']);
    }
}

// Benín: Beninés/sa
// Bielorrusia: Bielorruso/sa
// Birmania: Birmano/na
// Bolivia: Boliviano/a
// Bosnia y Herzegovina: Bosnio/nia; Bosnioherzegovino/na
// Botsuana: Botsuano/na
// Brasil: Brasileño/a; Brasilero/a
// Brunéi: Bruneano/na
// Bulgaria: Búlgaro/ra
// Burkina Faso: Burkinés
// Burundi: Burundés/sa
// Bután: Butanés/sa
// Cabo Verde: Caboverdiano/na
// Camboya: Camboyano/na
// Camerún: Camerunés/sa
// Canadá: Canadiense
// Catar: Catarí
// Chad: Chadiano/na
// Chile: Chileno/a
// China: Chino/na
// Chipre: Chipriota
// Ciudad del Vaticano: Vaticano/na
// Colombia: Colombiano/a
// Comoras: Comorense
// Corea del Norte: Norcoreano/na
// HASTA AQUI
// Corea del Sur: Surcoreano/na
// Costa de Marfil: Marfileño/ña
// Costa Rica: Costarricense
// Croacia: Croata
// Cuba: Cubano/a
// Dinamarca: Danés/sa
// Dominica: Dominiqués
// Ecuador: Ecuatoriano/a
// Egipto: Egipcio/cia
// El Salvador: Salvadoreño/ña
// Emiratos Árabes Unidos: Emiratí
// Eritrea: Eritreo/a
// Eslovaquia: Eslovaco/ca
// Eslovenia: Esloveno/na
// España: Español/la
// Estados Unidos: Estadounidense
// Estonia: Estonio/nia
// Etiopía: Etíope
// Filipinas: Filipino/na
// Finlandia: Finlandés/sa
// Fiyi: Fiyiano/na
// Francia: Francés/sa
// Gabón: Gabonés/sa
// Gambia: Gambiano/na
// Georgia: Georgiano/na
// Ghana: Ghanés/sa
// Granada: Granadino/a
// Grecia: Griego/ga
// Guatemala: Guatemalteco/a
// Guinea ecuatorial: Ecuatoguineano/na
// Guinea: Guineano/na
// Guinea-Bisáu: Guineano/na
// Guyana: Guyanés/esa
// Haití: Haitiano/a
// Honduras: Hondureño/a
// Hungría: Húngaro/ra
// India: Indio/dia; Hindú
// Indonesia: Indonesio/sia
// Irak: Iraquí
// Irán: Iraní
// Irlanda: Irlandés/sa
// Islandia: Islandés/sa
// Islas Marshall: Marshalés/sa
// Islas Salomón: Salomonense
// Israel: Israelí
// Italia: Italiano/na
// Jamaica: Jamaicano/na o Jamaiquino/na
// Japón: Japonés/sa
// Jordania: Jordano/na
// Kazajistán: Kazajo/ja
// Kenia: Keniano/na; Keniata
// Kirguistán: Kirguís; Kirguiso/sa
// Kiribati: Kiribatiano/na
// Kuwait: Kuwaití
// Laos: Laosiano/na
// Lesoto: Lesotense
// Letonia: Letón/na
// Líbano: Libanés/sa
// Liberia: Liberiano/na
// Libia: Libio/a
// Liechtenstein: liechtensteiniano/na
// Lituania: Lituano/na
// Luxemburgo: Luxemburgués/sa
// Madagascar: Malgache
// Malasia: Malasio/sia
// Malaui: Malauí
// Maldivas: Maldivo/va
// Malí: Maliense, Malí
// Malta: Maltés/sa
// Marruecos: Marroquí
// Mauricio: Mauriciano/na
// Mauritania: Mauritano/na
// México: Mexicano/a
// Micronesia: Micronesio/sia
// Moldavia: Moldavo/va
// Mónaco: Monegasco/ca
// Mongolia: Mongol/la
// Montenegro: Montenegrino/na
// Mozambique: Mozambiqueño/ña
// Namibia: Namibio/bia
// Nauru: Nauruano/na
// Nepal: Nepalés/sa; Nepalí
// Nicaragua: Nicaragüense
// Níger: Nigerino/na
// Nigeria: Nigeriano /na
// Noruega: Noruego/ga
// Nueva Zelanda: Neozelandés/sa
// Omán: Omaní
// Países Bajos: Neerlandés/sa
// Pakistán: Pakistaní
// Palaos: Palauano/na
// Panamá: Panameño/ña
// Papúa Nueva Guinea: Papú
// Paraguay: Paraguayo/a
// Perú: Peruano/a
// Polonia: Polaco/ca
// Portugal: Portugués/sa
// Reino Unido: Británico/ca
// República Centroafricana: Centroafricano/na
// República Checa: Checo/ca
// República de Macedonia: Macedonio/nia
// República del Congo: Congoleño/ña
// República Democrática del Congo: Congoleño/ña
// República Dominicana: Dominicano/na
// República Sudafricana: Sudafricano/na
// Ruanda: Ruandés/sa
// Rumanía: Rumano/na
// Rusia: Ruso/sa
// Samoa: Samoano/na
// San Cristóbal y Nieves: Cristobaleño/ña
// San Marino: Sanmarinense
// San Vicente y las Granadinas: Sanvicentino/na
// Santa Lucía: Santalucense
// Santo Tomé y Príncipe: Santotomense
// Senegal: Senegalés/sa
// Serbia: Serbio/a
// Seychelles: Seychellense
// Sierra Leona: Sierraleonés/sa
// Singapur: Singapurense
// Siria: Sirio/ria
// Somalia: Somalí
// Sri Lanka: Ceilanés/sa; Ceilandés; Esrilanqués/sa
// Suazilandia: Suazi
// Sudán del Sur: Sursudanés/sa
// Sudán: Sudanés/sa
// Suecia: Sueco/ca
// Suiza: Suizo/za
// Surinam: Surinamés/esa
// Tailandia: Tailandés/sa
// Tanzania: Tanzano/na
// Tayikistán: Tayiko/ka
// Timor Oriental: Timorense
// Togo: Togolés/sa
// Tonga: Tongano/na
// Trinidad y Tobago: Trinitense
// Túnez: Tunecino/na
// Turkmenistán: Turcomano/na; Turkmeno/na
// Turquía: Turco/ca
// Tuvalu: Tuvaluano/na
// Ucrania: Ucraniano/na
// Uganda: Ugandés/sa
// Uruguay: Uruguayo/a
// Uzbekistán: Uzbeko/ka
// Vanuatu: Vanuatuense
// Venezuela: Venezolano/a
// Vietnam: Vietnamita
// Yemen: Yemení
// Yibuti: Yibutiano/na
// Zambia: Zambiano/na
// Zimbabue: Zimbabuense
//
// Fuente: http://www.saberespractico.com/gentilicios/gentilicios-de-todos-los-paises-del-mundo-orden-alfabetico/