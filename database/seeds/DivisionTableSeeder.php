<?php

use Illuminate\Database\Seeder;
use Club\Division;
class DivisionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Division::create([
        	'id'=>0,
        	'division'=>'sub 12'
        ]);Division::create([
        	'division'=>'sub 15'
        ]);Division::create([
        	'division'=>'sub 16'
        ]);Division::create([
        	'division'=>'sub 18'
        ]);Division::create([
        	'division'=>'sub 20'
        ]);
    }
}
