<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SpecialitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $specialities = [
            ['name' => 'Cardiología', 'description' => 'Especialidad en enfermedades del corazón y sistema circulatorio.'],
            ['name' => 'Pediatría', 'description' => 'Especialidad en la salud de bebés, niños y adolescentes.'],
            ['name' => 'Neurología', 'description' => 'Especialidad en trastornos del sistema nervioso.'],
            ['name' => 'Dermatología', 'description' => 'Especialidad en enfermedades de la piel.'],
            ['name' => 'Oftalmología', 'description' => 'Especialidad en enfermedades y cirugía ocular.'],
            ['name' => 'Traumatología', 'description' => 'Especialidad en lesiones del aparato locomotor.'],
            ['name' => 'Ginecología', 'description' => 'Especialidad en el sistema reproductivo femenino.'],
            ['name' => 'Psiquiatría', 'description' => 'Especialidad en trastornos mentales y emocionales.'],
        ];

        DB::table('specialities')->insert($specialities);
    }
}
