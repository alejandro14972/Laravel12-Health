<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name' => 'view patients']);
        Permission::create(['name' => 'create patients']);
        Permission::create(['name' => 'edit patients']);
        Permission::create(['name' => 'delete patients']);

        //BloodPressure
        Permission::create(['name' => 'view blood pressures']);
        Permission::create(['name' => 'create blood pressures']);
        Permission::create(['name' => 'edit blood pressures']);
        Permission::create(['name' => 'delete blood pressures']);

        //Allergy
        Permission::create(['name' => 'view allergies']);
        Permission::create(['name' => 'create allergies']);
        Permission::create(['name' => 'edit allergies']);
        Permission::create(['name' => 'delete allergies']);

        $adminUser = User::create([
            'name' => 'Admin',
            'surname' => 'Admin',
            'email' => 'admin@admin.com',
            'email_verified_at' => now(),
            'password' => Hash::make('12345678'),
            'dni' => '12345678A',
            'adress' => 'Calle Falsa 123',
            'birthdate' => '1997-11-18',
            'gender' => 'Hombre',
            'phone' => '123456789'
        ]);


        $roleAdmin = Role::create(['name' => 'super-admin']);
        $adminUser->assignRole($roleAdmin);
        $permissionsAdmin = Permission::query()->pluck('name'); //todos los permisos 
        $roleAdmin->syncPermissions($permissionsAdmin);


        $patient = User::create([
            'name' => 'Alejandro',
            'surname' => 'González',
            'email' => 'agoal0@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('12345678'),
            'dni' => '12345679A',
            'adress' => 'Calle Falsa 124',
            'birthdate' => '1997-11-18',
            'gender' => 'Hombre',
            'phone' => '123456789'
        ]);

        $rolepatient = Role::create(['name' => 'patient']);
        $patient->assignRole($rolepatient);
        $rolepatient->syncPermissions([
            'view blood pressures',
            'create blood pressures',
            'edit blood pressures',
            'view allergies',
        ]);
    }
}
