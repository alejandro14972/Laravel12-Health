<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AllegiesUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $allergiesUser = [
            [
                'user_id' => 2,
                'allergy_id' => 1,
            ],
            [
                'user_id' => 2,
                'allergy_id' => 3,
            ],
            [
                'user_id' => 4,
                'allergy_id' => 2,
            ],
            [
                'user_id' => 4,
                'allergy_id' => 4,
            ],
            [
                'user_id' => 5,
                'allergy_id' => 1,
            ],
            [
                'user_id' => 5,
                'allergy_id' => 5,
            ],
        ];

        DB::table('user_allergies')->insert($allergiesUser);
    }
}
