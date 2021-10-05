<?php

use Illuminate\Database\Seeder;
use Club\Network;
class NetworkTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(Network::class,5)->create();
    }
}
