<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use App\Models\User;
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
        User::truncate();
        //table('role_user')->truncate();

        $adminRole = Role::where('name', 'admin')->first();
        $trainerRole = Role::where('name', 'trainer')->first();
        $userRole = Role::where('name', 'user')->first();

        $admin = User::create([
            'name' => 'Admin User',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password')
        ]);
        $trainer = User::create([
            'name' => 'Trainer User',
            'email' => 'trainer@trainer.com',
            'password' => Hash::make('password')
        ]);
        $user = User::create([
            'name' => 'Generic User',
            'email' => 'user@user.com',
            'password' => Hash::make('password')
        ]);

        $admin->roles()->attach($adminRole);
        $trainer->roles()->attach($trainerRole);
        $user->roles()->attach($userRole);

    }
}
