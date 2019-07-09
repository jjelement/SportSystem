<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//        $this->call(ProvinceSeeder::class);
        $this->call(UserAdminSeeder::class);
        $this->call(ThailandAddressSeeder::class);
        $this->call(ConfigSeeder::class);
    }
}
