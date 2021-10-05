<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolSeeder::class);
        $this->call(StadiumTableSeeder::class);
        $this->call(NetworkTableSeeder::class);
        $this->call(AddressTableSeeder::class);
        $this->call(DivisionTableSeeder::class);
        $this->call(TypeTableSeeder::class);
        
        $this->call(UserTableSeeder::class);
        $this->call(ClubTableSeeder::class);
        $this->call(TemplateTableSeeder::class);
        $this->call(EncounterTableSeeder::class);
        

        $this->call(PostTableSeeder::class);

       
    }
}
