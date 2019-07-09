<?php

use App\Models\Area;
use App\Models\District;
use App\Models\Geography;
use App\Models\Province;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ThailandAddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        District::truncate();
        Area::truncate();
        Province::truncate();
        Geography::truncate();

        $query = file_get_contents(base_path('data/seeds/thailand.sql'));
        DB::unprepared($query);
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
