<?php

use Illuminate\Database\Seeder;
use Club\Club;

class ClubTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Club::create([
        	'image'=>'LogoTopel.png',
			'name'=>'Academia Leon Topel Wortman',
			'mision'=>'Nuestra mision principal es formar personas y promover la actividad fisica a travéz del futbol, contribuyendo al desarrollo integral de los niños, niñas y adolescentes con talento futbolistico, fomentando su formación tanto en la práctica de la disciplina, como en el cultivo de valores y principios que contribuyan en su formación integral.',
			'history'=>'Random historia segun el director o el administador',
			'rif'=>'R-1232ASDG1',
			'email'=>'topelClub@gmil.com',
			'phone_number'=>'(0000)000-00-00',
			'address'=>'San Juan de los Morros, Municipio Juan German Roscio, Edo. Guarico',
			'stadium_id'=>1,
			'network_id'=>1,
        ]);

        Club::create([
        	'image'=>'LogoVisitnte1.png',
			'name'=>'Visitante 1',
			'rif'=>'R-VISITANTE1',
			'email'=>'Visitante1Club@gmil.com',
			'phone_number'=>'(1111)111-11-11',
			'address'=>'San Juan De los Morros, Municipio Roscio, Edo. Guarico',
			'stadium_id'=>2,
			'network_id'=>2,
			

        ]);
        Club::create([
        	'image'=>'LogoVisitnte2.png',
			'name'=>'Visitante 2',
			'rif'=>'R-VISITANTE2',
			'email'=>'Visitante2Club@gmil.com',
			'phone_number'=>'(2222)222-22-22',
			'address'=>'La urbina, Municipio Sucre, Edo. Caracas',
			'stadium_id'=>3,
			'network_id'=>3,

        ]);
    }
}
