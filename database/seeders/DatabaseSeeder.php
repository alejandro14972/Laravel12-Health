<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        /* $this->call(SpecialitySeeder::class);
        
        $this->call(RolesSeeder::class);
        $this->call(PermissionSeeder::class);
        $this->call(addPersmisionRolesSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(AllegiesSeeder::class); */
        $this->call(AllegiesUserSeeder::class);
        
    }
}
