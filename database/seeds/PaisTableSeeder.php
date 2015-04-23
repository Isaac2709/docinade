<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use \App\Pais;

class PaisTableSeeder extends Seeder {

    public function run()
    {
        DB::table('GEN_Pais')->delete();

        Pais::create(['Pais_Nombre' => 'Afghanistan']);
        Pais::create(['Pais_Nombre' => 'Albania']);
        Pais::create(['Pais_Nombre' => 'Algeria']);
        Pais::create(['Pais_Nombre' => 'American Samoa']);
        Pais::create(['Pais_Nombre' => 'Andorra']);
        Pais::create(['Pais_Nombre' => 'Angola']);
        Pais::create(['Pais_Nombre' => 'Anguilla']);
        Pais::create(['Pais_Nombre' => 'Antarctica']);
        Pais::create(['Pais_Nombre' => 'Antigua and/or Barbuda']);
        Pais::create(['Pais_Nombre' => 'Argentina']);
        Pais::create(['Pais_Nombre' => 'Armenia']);
        Pais::create(['Pais_Nombre' => 'Aruba']);
        Pais::create(['Pais_Nombre' => 'Australia']);
        Pais::create(['Pais_Nombre' => 'Austria']);
        Pais::create(['Pais_Nombre' => 'Azerbaijan']);
        Pais::create(['Pais_Nombre' => 'Bahamas']);
        Pais::create(['Pais_Nombre' => 'Bahrain']);
        Pais::create(['Pais_Nombre' => 'Bangladesh']);
        Pais::create(['Pais_Nombre' => 'Barbados']);
        Pais::create(['Pais_Nombre' => 'Belarus']);
        Pais::create(['Pais_Nombre' => 'Belgium']);
        Pais::create(['Pais_Nombre' => 'Belize']);
        Pais::create(['Pais_Nombre' => 'Benin']);
        Pais::create(['Pais_Nombre' => 'Bermuda']);
        Pais::create(['Pais_Nombre' => 'Bhutan']);
        Pais::create(['Pais_Nombre' => 'Bolivia']);
        Pais::create(['Pais_Nombre' => 'Bosnia and Herzegovina']);
        Pais::create(['Pais_Nombre' => 'Botswana']);
        Pais::create(['Pais_Nombre' => 'Bouvet Island']);
        Pais::create(['Pais_Nombre' => 'Brazil']);
        Pais::create(['Pais_Nombre' => 'British lndian Ocean Territory']);
        Pais::create(['Pais_Nombre' => 'Brunei Darussalam']);
        Pais::create(['Pais_Nombre' => 'Bulgaria']);
        Pais::create(['Pais_Nombre' => 'Burkina Faso']);
        Pais::create(['Pais_Nombre' => 'Burundi']);
        Pais::create(['Pais_Nombre' => 'Cambodia']);
        Pais::create(['Pais_Nombre' => 'Cameroon']);
        Pais::create(['Pais_Nombre' => 'Cape Verde']);
        Pais::create(['Pais_Nombre' => 'Cayman Islands']);
        Pais::create(['Pais_Nombre' => 'Central African Republic']);
        Pais::create(['Pais_Nombre' => 'Chad']);
        Pais::create(['Pais_Nombre' => 'Chile']);
        Pais::create(['Pais_Nombre' => 'China']);
        Pais::create(['Pais_Nombre' => 'Christmas Island']);
        Pais::create(['Pais_Nombre' => 'Cocos (Keeling) Islands']);
        Pais::create(['Pais_Nombre' => 'Colombia']);
        Pais::create(['Pais_Nombre' => 'Comoros']);
        Pais::create(['Pais_Nombre' => 'Congo']);
        Pais::create(['Pais_Nombre' => 'Cook Islands']);
        Pais::create(['Pais_Nombre' => 'Costa Rica']);
        Pais::create(['Pais_Nombre' => 'Croatia (Hrvatska)']);
        Pais::create(['Pais_Nombre' => 'Cuba']);
        Pais::create(['Pais_Nombre' => 'Cyprus']);
        Pais::create(['Pais_Nombre' => 'Czech Republic']);
        Pais::create(['Pais_Nombre' => 'Denmark']);
        Pais::create(['Pais_Nombre' => 'Djibouti']);
        Pais::create(['Pais_Nombre' => 'Dominica']);
        Pais::create(['Pais_Nombre' => 'Dominican Republic']);
    }
}

// [
    // {"US":"United States"},
    // {"CA":"Canada"},
//     {"AF":"Afghanistan"},
//     {"AL":"Albania"},
//     {"DZ":"Algeria"},
//     {"DS":"American Samoa"},
//     {"AD":"Andorra"},
//     {"AO":"Angola"},
//     {"AI":"Anguilla"},
//     {"AQ":"Antarctica"},
//     {"AG":"Antigua and/or Barbuda"},
//     {"AR":"Argentina"},
//     {"AM":"Armenia"},
//     {"AW":"Aruba"},
//     {"AU":"Australia"},
//     {"AT":"Austria"},
//     {"AZ":"Azerbaijan"},
//     {"BS":"Bahamas"},
//     {"BH":"Bahrain"},
//     {"BD":"Bangladesh"},
//     {"BB":"Barbados"},
//     {"BY":"Belarus"},
//     // HASTA AQUI
//     {"BE":"Belgium"},
//     {"BZ":"Belize"},
//     {"BJ":"Benin"},
//     {"BM":"Bermuda"},
//     {"BT":"Bhutan"},
//     {"BO":"Bolivia"},
//     {"BA":"Bosnia and Herzegovina"},
//     {"BW":"Botswana"},
//     {"BV":"Bouvet Island"},
//     {"BR":"Brazil"},
//     {"IO":"British lndian Ocean Territory"},
//     {"BN":"Brunei Darussalam"},
//     {"BG":"Bulgaria"},
//     {"BF":"Burkina Faso"},
//
//     {"BI":"Burundi"},
//     {"KH":"Cambodia"},
//     {"CM":"Cameroon"},
//     {"CV":"Cape Verde"},
//     {"KY":"Cayman Islands"},
//     {"CF":"Central African Republic"},
//     {"TD":"Chad"},
//     {"CL":"Chile"},
//     {"CN":"China"},
//     {"CX":"Christmas Island"},
//     {"CC":"Cocos (Keeling) Islands"},
//     {"CO":"Colombia"},
//     {"KM":"Comoros"},
//     {"CG":"Congo"},
//     {"CK":"Cook Islands"},
//     {"CR":"Costa Rica"},
//     {"HR":"Croatia (Hrvatska)"},
//     {"CU":"Cuba"},
//     {"CY":"Cyprus"},
//     {"CZ":"Czech Republic"},
//     {"DK":"Denmark"},
//     {"DJ":"Djibouti"},
//     {"DM":"Dominica"},
//     {"DO":"Dominican Republic"},
//     {"TP":"East Timor"},
//     {"EC":"Ecudaor"},
//     {"EG":"Egypt"},
//     {"SV":"El Salvador"},
//     {"GQ":"Equatorial Guinea"},
//     {"ER":"Eritrea"},
//     {"EE":"Estonia"},
//     {"ET":"Ethiopia"},
//     {"FK":"Falkland Islands (Malvinas)"},
//     {"FO":"Faroe Islands"},
//     {"FJ":"Fiji"},
//     {"FI":"Finland"},
//     {"FR":"France"},
//     {"FX":"France, Metropolitan"},
//     {"GF":"French Guiana"},
//     {"PF":"French Polynesia"},
//     {"TF":"French Southern Territories"},
//     {"GA":"Gabon"},
//     {"GM":"Gambia"},
//     {"GE":"Georgia"},
//     {"DE":"Germany"},
//     {"GH":"Ghana"},
//     {"GI":"Gibraltar"},
//     {"GR":"Greece"},
//     {"GL":"Greenland"},
//     {"GD":"Grenada"},
//     {"GP":"Guadeloupe"},
//     {"GU":"Guam"},
//     {"GT":"Guatemala"},
//     {"GN":"Guinea"},
//     {"GW":"Guinea-Bissau"},
//     {"GY":"Guyana"},
//     {"HT":"Haiti"},
//     {"HM":"Heard and Mc Donald Islands"},
//     {"HN":"Honduras"},
//     {"HK":"Hong Kong"},
//     {"HU":"Hungary"},
//     {"IS":"Iceland"},
//     {"IN":"India"},
//     {"ID":"Indonesia"},
//     {"IR":"Iran (Islamic Republic of)"},
//     {"IQ":"Iraq"},
//     {"IE":"Ireland"},
//     {"IL":"Israel"},
//     {"IT":"Italy"},
//     {"CI":"Ivory Coast"},
//     {"JM":"Jamaica"},
//     {"JP":"Japan"},
//     {"JO":"Jordan"},
//     {"KZ":"Kazakhstan"},
//     {"KE":"Kenya"},
//     {"KI":"Kiribati"},
//     {"KP":"Korea, Democratic People's Republic of"},
//     {"KR":"Korea, Republic of"},
//     {"KW":"Kuwait"},
//     {"KG":"Kyrgyzstan"},
//     {"LA":"Lao People's Democratic Republic"},
//     {"LV":"Latvia"},
//     {"LB":"Lebanon"},
//     {"LS":"Lesotho"},
//     {"LR":"Liberia"},
//     {"LY":"Libyan Arab Jamahiriya"},
//     {"LI":"Liechtenstein"},
//     {"LT":"Lithuania"},
//     {"LU":"Luxembourg"},
//     {"MO":"Macau"},
//     {"MK":"Macedonia"},
//     {"MG":"Madagascar"},
//     {"MW":"Malawi"},
//     {"MY":"Malaysia"},
//     {"MV":"Maldives"},
//     {"ML":"Mali"},
//     {"MT":"Malta"},
//     {"MH":"Marshall Islands"},
//     {"MQ":"Martinique"},
//     {"MR":"Mauritania"},
//     {"MU":"Mauritius"},
//     {"TY":"Mayotte"},
//     {"MX":"Mexico"},
//     {"FM":"Micronesia, Federated States of"},
//     {"MD":"Moldova, Republic of"},
//     {"MC":"Monaco"},
//     {"MN":"Mongolia"},
//     {"MS":"Montserrat"},
//     {"MA":"Morocco"},
//     {"MZ":"Mozambique"},
//     {"MM":"Myanmar"},
//     {"NA":"Namibia"},
//     {"NR":"Nauru"},
//     {"NP":"Nepal"},
//     {"NL":"Netherlands"},
//     {"AN":"Netherlands Antilles"},
//     {"NC":"New Caledonia"},
//     {"NZ":"New Zealand"},
//     {"NI":"Nicaragua"},
//     {"NE":"Niger"},
//     {"NG":"Nigeria"},
//     {"NU":"Niue"},
//     {"NF":"Norfork Island"},
//     {"MP":"Northern Mariana Islands"},
//     {"NO":"Norway"},
//     {"OM":"Oman"},
//     {"PK":"Pakistan"},
//     {"PW":"Palau"},
//     {"PA":"Panama"},
//     {"PG":"Papua New Guinea"},
//     {"PY":"Paraguay"},
//     {"PE":"Peru"},
//     {"PH":"Philippines"},
//     {"PN":"Pitcairn"},
//     {"PL":"Poland"},
//     {"PT":"Portugal"},
//     {"PR":"Puerto Rico"},
//     {"QA":"Qatar"},
//     {"RE":"Reunion"},
//     {"RO":"Romania"},
//     {"RU":"Russian Federation"},
//     {"RW":"Rwanda"},
//     {"KN":"Saint Kitts and Nevis"},
//     {"LC":"Saint Lucia"},
//     {"VC":"Saint Vincent and the Grenadines"},
//     {"WS":"Samoa"},
//     {"SM":"San Marino"},
//     {"ST":"Sao Tome and Principe"},
//     {"SA":"Saudi Arabia"},
//     {"SN":"Senegal"},
//     {"SC":"Seychelles"},
//     {"SL":"Sierra Leone"},
//     {"SG":"Singapore"},
//     {"SK":"Slovakia"},
//     {"SI":"Slovenia"},
//     {"SB":"Solomon Islands"},
//     {"SO":"Somalia"},
//     {"ZA":"South Africa"},
//     {"GS":"South Georgia South Sandwich Islands"},
//     {"ES":"Spain"},
//     {"LK":"Sri Lanka"},
//     {"SH":"St. Helena"},
//     {"PM":"St. Pierre and Miquelon"},
//     {"SD":"Sudan"},
//     {"SR":"Suriname"},
//     {"SJ":"Svalbarn and Jan Mayen Islands"},
//     {"SZ":"Swaziland"},
//     {"SE":"Sweden"},
//     {"CH":"Switzerland"},
//     {"SY":"Syrian Arab Republic"},
//     {"TW":"Taiwan"},
//     {"TJ":"Tajikistan"},
//     {"TZ":"Tanzania, United Republic of"},
//     {"TH":"Thailand"},
//     {"TG":"Togo"},
//     {"TK":"Tokelau"},
//     {"TO":"Tonga"},
//     {"TT":"Trinidad and Tobago"},
//     {"TN":"Tunisia"},
//     {"TR":"Turkey"},
//     {"TM":"Turkmenistan"},
//     {"TC":"Turks and Caicos Islands"},
//     {"TV":"Tuvalu"},
//     {"UG":"Uganda"},
//     {"UA":"Ukraine"},
//     {"AE":"United Arab Emirates"},
//     {"GB":"United Kingdom"},
//     {"UM":"United States minor outlying islands"},
//     {"UY":"Uruguay"},
//     {"UZ":"Uzbekistan"},
//     {"VU":"Vanuatu"},
//     {"VA":"Vatican City State"},
//     {"VE":"Venezuela"},
//     {"VN":"Vietnam"},
//     {"VG":"Virigan Islands (British)"},
//     {"VI":"Virgin Islands (U.S.)"},
//     {"WF":"Wallis and Futuna Islands"},
//     {"EH":"Western Sahara"},
//     {"YE":"Yemen"},
//     {"YU":"Yugoslavia"},
//     {"ZR":"Zaire"},
//     {"ZM":"Zambia"},
//     {"ZW":"Zimbabwe"}
// ]
//     }
