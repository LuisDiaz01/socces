<?php

use Illuminate\Database\Seeder;
use Club\Template;
class TemplateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        for ($i=1; $i < 30; $i++) { 
	        Template::create([
	        	'user_id'=>$i,
	        	'division_id'=>1
	        ]);
        }

        for ($i=30; $i < 40; $i++) { 
            Template::create([
                'user_id'=>$i,
                'division_id'=>2
            ]);
        }

        for ($i=40; $i < 50; $i++) { 
            Template::create([
                'user_id'=>$i,
                'division_id'=>3
            ]);
        }
    }
}
