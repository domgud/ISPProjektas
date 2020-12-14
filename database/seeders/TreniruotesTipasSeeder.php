<?php

namespace Database\Seeders;

use App\Models\Training_type;
use Illuminate\Database\Seeder;

class TreniruotesTipasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Training_type::create([
            'tipas' => 'Solo'
        ]);
        Training_type::create([
            'tipas' => 'Grupinė'
        ]);
    }
}
