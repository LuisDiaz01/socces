<?php

use Illuminate\Database\Seeder;
use Club\Rol;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Rol::create([
            'id'=>1,
            'rol'=>'Administrador',
        ]);
        Rol::create([
            'id'=>2,
            'rol'=>'Atleta',
        ]);
        Rol::create([
            'id'=>3,
            'rol'=>'Personal Administrativo',
        ]);
        Rol::create([
            'id'=>4,
            'rol'=>'Director',
        ]);
    }
}
