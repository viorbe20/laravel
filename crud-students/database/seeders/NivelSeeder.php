<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NivelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $niveles = [
            '1ºDAW', '2ºDAW', '1ºASIR', '2ºASIR', '1ºDAM', '2ºDAM',
        ];

        foreach ($niveles as $nivel) {
            DB::table('niveles')->insert([
                'nombre' => $nivel,
            ]);
        }
    }
}
