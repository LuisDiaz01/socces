<?php

use Illuminate\Database\Seeder;
use Club\Stadium;
class StadiumTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	
        factory(Stadium::class,10)->create();
    }
}
