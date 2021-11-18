<?php

use Illuminate\Database\Seeder;
use Club\Encounter;
class EncounterTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Encounter::create([
        	'title'=>'Topel VS Torrealba',
            'club_home_id'=>1,
			'club_visitor_id'=>2,
            'start'=>now(),
            'end'=>now()
        ]);
        Encounter::create([
        	'title'=>'Topel VS Escula de talento',
            'club_home_id'=>1,
			'club_visitor_id'=>3,
            'start'=>now(),
            'end'=>now()
        ]);
        Encounter::create([
            'title'=>'Torealba VS Topel',
            'club_home_id'=>2,
            'club_visitor_id'=>1,
            'start'=>now(),
            'end'=>now()
        ]);
        Encounter::create([
            'title'=>'Escuela de talento VS Topel',
            'club_home_id'=>3,
            'club_visitor_id'=>1,
            'start'=>now(),
            'end'=>now()
        ]);
    }
}
