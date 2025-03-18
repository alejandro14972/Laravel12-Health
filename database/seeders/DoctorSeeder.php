<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class DoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $doctor = User::create([
            'name' => 'Dr. Pedro',
            'surname' => 'González Álvarez',
            'email' => 'dr@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('12345678'),
            'dni' => '12345634A',
            'adress' => 'Calle Falsa 200',
            'birthdate' => '1978-11-18',
            'gender' => 'Hombre',
            'phone' => '123456739',
            'role' => 'doctor'
        ]);

        $roleDoctor = Role::create(['name' => 'doctor']);
        $doctor->assignRole($roleDoctor);

        $roleDoctor->syncPermissions(
            [
                'create patients',
                'view patients',
                'edit patients',
                'delete patients',
            ]
        );
    }
}
