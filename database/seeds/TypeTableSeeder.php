<?php

use Illuminate\Database\Seeder;
use Club\Type;
class TypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Type::create([
        	'name'=>'Informativo',
        ]);
        Type::create([
        	'name'=>'Galeria'
        ]);
        Type::create([
        	'name'=>'Encuentros'
        ]);
        Type::create([
        	'name'=>'Entrenamientos'
        ]);
    }
}
