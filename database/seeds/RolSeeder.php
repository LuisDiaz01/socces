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
            'rol'=>'Presidencia',
        ]);
        Rol::create([
            'id'=>4,
            'rol'=>'Vice-Presidencia',
        ]);
        Rol::create([
            'id'=>5,
            'rol'=>'Secretaria',
        ]);
        Rol::create([
            'id'=>6,
            'rol'=>'Tesoreria',
        ]);
        Rol::create([
            'id'=>7,
            'rol'=>'Primer Vocal',
        ]);
    }
}
