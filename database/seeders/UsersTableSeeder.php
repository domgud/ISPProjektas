<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Address;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //User::truncate();

        $adminRole = Role::where('name', 'admin')->first()->id;
        $trainerRole = Role::where('name', 'trainer')->first()->id;
        $userRole = Role::where('name', 'user')->first()->id;

        $a1 = Address::create([
            'street' => 'pickle',
            'city' => 'kaunas',
            'number' => 69,
            'post_code' => 69420

        ]);
        $a2 = Address::create([
            'street' => 'pickle',
            'city' => 'kaunas',
            'number' => 69,
            'post_code' => 69420
        ]);
        $a3 = Address::create([
            'street' => 'pickle',
            'city' => 'kaunas',
            'number' => 69,
            'post_code' => 69420
        ]);

        User::create([
            'name' => 'Admin User',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password'),
            'role_id' => $adminRole,
            'address_id' => $a1->id,
            'lastname' => 'a',
            'birthdate' => Carbon::now(),
            'code' => '123',
            'phonenumber' => '+370612313212'

        ]);
        User::create([
            'name' => 'Trainer User',
            'email' => 'trainer@trainer.com',
            'password' => Hash::make('password'),
            'role_id' => $trainerRole,
            'address_id' => $a2->id,
            'lastname' => 'b',
            'birthdate' => Carbon::now(),
            'code' => '456',
            'phonenumber' => '+370612313212'

        ]);
        User::create([
            'name' => 'Generic User',
            'email' => 'user@user.com',
            'password' => Hash::make('password'),
            'role_id' => $userRole,
            'address_id' => $a3->id,
            'lastname' => 'c',
            'birthdate' => Carbon::now(),
            'code' => '789',
            'phonenumber' => '+370612313212'
        ]);

    }
}
