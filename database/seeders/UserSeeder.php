<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = 'Amelie';
        $user->last_name = 'LaJocande';
        $user->email = 'Amelie.LaJocande@example.com';
        $user->password = 'password';
        $user->gender = 'female';
        $user->phone = '1122334455';
        $user->save();

        $user = new User();
        $user->name = 'Matthew';
        $user->last_name = 'Smith';
        $user->email = 'Matthew.Smith@example.com';
        $user->password = 'password';
        $user->gender = 'male';
        $user->phone = '1122334455';
        $user->address = 'some address';
        $user->save();

        $user = new User();
        $user->name = 'Yosri';
        $user->last_name = 'Wolf';
        $user->email = 'Yosri.Wolf@example.com';
        $user->password = 'password';
        $user->gender = 'male';
        $user->phone = '1122334455';
        $user->address = 'some address';
        $user->save();
    }
}
