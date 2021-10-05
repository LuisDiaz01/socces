<?php

use Illuminate\Database\Seeder;
use Club\Address;
class AddressTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Address::Create([
        	'address'=>'San juan de los morros'
        ]);
    }
}
