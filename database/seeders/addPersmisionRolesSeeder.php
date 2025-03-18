<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class addPersmisionRolesSeeder extends Seeder
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

        //permisos para el rol de super-admin
        $roleAdmin->syncPermissions(Permission::pluck('name')); // Asignar todos los permisos al super-admin
    

        //permisos para el rol de patient
        $rolePatient->syncPermissions([
            'view blood pressures',
            'create blood pressures',
            'edit blood pressures',
            'view allergies',
        ]);

        //permisos para el rol de doctor
        $roleDoctor->syncPermissions([
            'create patients',
            'view patients',
            'edit patients',
            'delete patients',
        ]);
    
    
    }
}
