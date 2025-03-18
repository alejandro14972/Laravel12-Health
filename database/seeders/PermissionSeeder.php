<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            // Usuarios
            'view users', 'create users', 'edit users', 'delete users',

            // Pacientes
            'view patients', 'create patients', 'edit patients', 'delete patients',

            // Presión Arterial
            'view blood pressures', 'create blood pressures', 'edit blood pressures', 'delete blood pressures',

            // Alergias
            'view allergies', 'create allergies', 'edit allergies', 'delete allergies',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }
    }
}
