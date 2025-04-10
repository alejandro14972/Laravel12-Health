<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AllegiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $allergies = [
            [
                'name' => 'Polen',
                'description' => 'Reacción alérgica estacional causada por polen de árboles, pastos o malezas.',
                'severity' => 'Alta',
                'diagnosis_date' => Carbon::now()->subYears(2)->format('Y-m-d'),
                'treatment' => 'Antihistamínicos diarios y evitar áreas con mucho polen.',
                'notes' => 'Empeora en primavera',
                'type' => 'Ambiental',
            ],
            [
                'name' => 'Maní',
                'description' => 'Alergia alimentaria severa que puede causar anafilaxia.',
                'severity' => 'Crítica',
                'diagnosis_date' => Carbon::now()->subYears(5)->format('Y-m-d'),
                'treatment' => 'Evitar maní, llevar EpiPen siempre.',
                'notes' => 'Evitar todos los frutos secos procesados juntos.',
                'type' => 'Alimentaria',
            ],
            [
                'name' => 'Lactosa',
                'description' => 'Intolerancia a la lactosa, puede causar malestar digestivo.',
                'severity' => 'Media',
                'diagnosis_date' => Carbon::now()->subMonths(18)->format('Y-m-d'),
                'treatment' => 'Evitar productos lácteos o consumir lactasa.',
                'notes' => null,
                'type' => 'Alimentaria',
            ],
            [
                'name' => 'Picaduras de abeja',
                'description' => 'Reacción inflamatoria severa a la picadura de insectos.',
                'severity' => 'Alta',
                'diagnosis_date' => Carbon::now()->subYears(3)->format('Y-m-d'),
                'treatment' => 'Adrenalina y antihistamínicos.',
                'notes' => 'Llevar identificación médica.',
                'type' => 'Insectos',
            ],
            [
                'name' => 'Penicilina',
                'description' => 'Alergia a antibiótico común.',
                'severity' => 'Crítica',
                'diagnosis_date' => Carbon::now()->subYears(10)->format('Y-m-d'),
                'treatment' => 'Evitar uso. Usar alternativas como macrólidos.',
                'notes' => null,
                'type' => 'Medicamento',
            ],
        ];

        DB::table('allergies')->insert($allergies);
    }
}
