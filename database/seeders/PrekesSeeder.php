<?php

namespace Database\Seeders;

use App\Models\Shop;
use Illuminate\Database\Seeder;

class PrekesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Shop::create([
            'pavadinimas' => 'Coolgate pasta',
            'kaina' => 15.80,
            'galioja_iki_data' => '2020/12/31',
            'gamintojas' => 'Coolgate',
            'aprasymas' => 'Labai gera pasta dantims, Rekomenduoja 9/10 žmoniu'
        ]);

        Shop::create([
            'pavadinimas' => 'Masažuoklis',
            'kaina' => 99.99,
            'gamintojas' => 'Masažas',
            'aprasymas' => 'Patogus nugarai masažuoklis :)'
        ]);

        Shop::create([
            'pavadinimas' => 'Papildai xiioanfgh',
            'kaina' => 20.50,
            'galioja_iki_data' => '2060/12/31',
            'gamintojas' => 'Csokirbgtjhn',
            'aprasymas' => 'Padeda nuo viduriavimo'
        ]);

        Shop::create([
            'pavadinimas' => 'Svarmenys',
            'kaina' => 30.80,
            'gamintojas' => 'Treneris INC.',
            'aprasymas' => 'Stiprina rankų raumenis'
        ]);
    }
}
