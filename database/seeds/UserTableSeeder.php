<?php

use Illuminate\Database\Seeder;
use Club\User;
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
            'password' => bcrypt('Je21437318..'),
            'date_n'=> '2021-08-28 03:41:05',
            'rol_id' => 1,
            'confirmed' => true,
        ]);
        /* _start Atletas_ */
        factory(User::class,50)->create();
        /* _End Atletas_ */
        User::create([
            'name'=>'Otilio',
            'lastname'=>'Villalta',
            'dni'=>252371,
            'email'=>'entrenador@gmail.com',
            'password' => bcrypt('Je21437318..'),
            'date_n'=>'2021-08-28 03:41:05',
            'network_id'=>2,
            'rol_id' => 3,
            'confirmed' => true,
        ]);

        User::create([
            'name'=>'Maria',
            'lastname'=>'Gonzalez',
            'dni'=>25237,
            'email'=>'director@gmail.com',
            'password' => bcrypt('Je21437318..'),
            'date_n'=>'2021-08-28 03:41:05',
            'network_id'=>3,
            'rol_id' => 4,
            'confirmed' => true,
        ]);

    }
}
