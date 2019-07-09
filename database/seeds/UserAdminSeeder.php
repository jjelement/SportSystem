<?php

use App\Models\User;
use App\Models\UserAdmin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::where('username', 'admin')->delete();

        $user = new User([
            'username' => 'admin',
            'password' => Hash::make('123456'),
            'firstName' => 'Sport',
            'lastName' => 'System',
            'email' => 'admin@sport.system.com',
            'tel' => '0991234567',
            'gender' => 'M',
            'bloodType' => 'AB',
            'province' => 'กรุงเทพมหานคร',
            'area' => 'จตุจักร',
            'district_id' => 'ลาดยาว',
            'postalCode' => '10900',
            'address' => '123/45',
            'birthdate' => '1990-11-11',
        ]);
        $user->save();

        UserAdmin::create([
           'user_id' => $user->id
        ]);
    }
}
