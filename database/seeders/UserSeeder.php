<?php

namespace Database\Seeders;

use App\Models\Doctor;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Obtener roles
        $roleAdmin = Role::where('name', 'super-admin')->first();
        $rolePatient = Role::where('name', 'patient')->first();
        $roleDoctor = Role::where('name', 'doctor')->first();

        if (!$roleAdmin || !$rolePatient || !$roleDoctor) {
            $this->command->warn("Algunos roles no existen. Ejecuta primero RolesSeeder.");
            return;
        }

        // Crear usuario Admin
        $adminUser = User::firstOrCreate([
            'email' => 'admin@admin.com',
        ], [
            'name' => 'Admin',
            'surname' => 'Admin',
            'email_verified_at' => now(),
            'password' => Hash::make('12345678'),
            'dni' => '12345678A',
            'adress' => 'Calle Falsa 123',
            'birthdate' => '1997-11-18',
            'gender' => 'Hombre',
            'phone' => '123456789',
        ]);

        $adminUser->assignRole($roleAdmin);
      

        // Crear usuario Paciente
        $patient = User::firstOrCreate([
            'email' => 'agoal0@gmail.com',
        ], [
            'name' => 'Alejandro',
            'surname' => 'González',
            'email_verified_at' => now(),
            'password' => Hash::make('12345678'),
            'dni' => '12345679A',
            'adress' => 'Calle Falsa 124',
            'birthdate' => '1997-11-18',
            'gender' => 'Hombre',
            'phone' => '123456789',
        ]);

        $patient->assignRole($rolePatient);

        

        // Crear usuario Doctor
        $doctorUser = User::create([
            'name' => 'Dr. Test',
            'surname' => 'Test',
            'email' => 'drtest@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('12345678'),
            'dni' => '12345634A',
            'adress' => 'Calle Falsa 200',
            'birthdate' => '1978-11-18',
            'gender' => 'Hombre',
            'phone' => '123456739',
        ]);
        $doctorUser->assignRole('doctor');
        
        // Crear entrada en la tabla doctors
        Doctor::create([
            'user_id' => $doctorUser->id,
            'speciality_id' => 1, // ID de la especialidad del doctor
        ]);

        
    }
}
