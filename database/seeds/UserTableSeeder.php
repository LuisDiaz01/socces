<?php

use Illuminate\Database\Seeder;
use Club\User;
use Club\Athlete;
use Illuminate\Support\Str as Str;
use Carbon\Carbon;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'=>'Luis',
            'lastname'=>'Rodriguez',
            'dni'=>21437318,
            'email'=>'admin@gmail.com',
            'password' => bcrypt('1234567890..'),
            'date_n'=> '2021-08-28 03:41:05',
            'rol_id' => 1,
            'confirmed' => true,
        ]);
        /* _start Atletas_ */
        factory(Athlete::class,50)->create();
        /* _End Atletas_ */
        User::create([
            'name'=>'Eleazar',
            'lastname'=>'Siso',
            'dni'=>111111,
            'email'=>'presidente@gmail.com',
            'password' => bcrypt('1234567890..'),
            'date_n'=>'2021-08-28 03:41:05',
            'network_id'=>2,
            'rol_id' => 3,
            'confirmed' => true,
        ]);

        User::create([
            'name'=>'Alexa',
            'lastname'=>'Galeno',
            'dni'=>222222,
            'email'=>'vice_presidente@gmail.com',
            'password' => bcrypt('1234567890..'),
            'date_n'=>'2021-08-28 03:41:05',
            'network_id'=>3,
            'rol_id' => 4,
            'confirmed' => true,
        ]);
        User::create([
            'name'=>'Gledys',
            'lastname'=>'Del Corral',
            'dni'=>3333333,
            'email'=>'secretaria@gmail.com',
            'password' => bcrypt('1234567890..'),
            'date_n'=>'2021-08-28 03:41:05',
            'network_id'=>3,
            'rol_id' => 5,
            'confirmed' => true,
        ]);
        User::create([
            'name'=>'Adri',
            'lastname'=>'Rodriguez',
            'dni'=>44444444,
            'email'=>'tesoreria@gmail.com',
            'password' => bcrypt('1234567890..'),
            'date_n'=>'2021-08-28 03:41:05',
            'network_id'=>3,
            'rol_id' => 6,
            'confirmed' => true,
        ]);
        User::create([
            'name'=>'Jesús',
            'lastname'=>'Rodriguez',
            'dni'=>555555555,
            'email'=>'primer_vocal@gmail.com',
            'password' => bcrypt('1234567890..'),
            'date_n'=>'2021-08-28 03:41:05',
            'network_id'=>3,
            'rol_id' => 7,
            'confirmed' => true,
        ]);

    }
}
