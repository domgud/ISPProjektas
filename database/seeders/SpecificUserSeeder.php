<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Client;
use App\Models\Trainer;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class SpecificUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        Admin::create([
            'work_start' => Carbon::now(),
            'end_work' => Carbon::now(),
            'state_id' => 1,
            'user_id' => 1,
        ]);
        Trainer::create([
            'work_start' => Carbon::now(),
            'end_work' => Carbon::now(),
            'state_id' => 2,
            'user_id' => 2,
            'experience' => 1,
            'is_private' => 1
        ]);
        Client::create([
            'created_date' => Carbon::now(),
            'user_id' => 3,
        ]);
    }
}
