<?php

use App\Models\Config;
use Illuminate\Database\Seeder;

class ConfigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Config::truncate();

        $data = collect([
            'facebook_name' => '',
            'facebook_url' => '',
            'instagram_name' => '',
            'instagram_url' => '',
            'line_id' => '',
            'youtube_url' => '',
        ])->map(function($val, $key) {
            return [
                'key' => $key,
                'value' => $val,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        })
        ->values()
        ->toArray();
        Config::insert($data);
    }
}
