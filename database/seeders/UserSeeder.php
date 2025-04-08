<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Usuario Masteradmin
        $master = User::create([
            'name' => 'Master Admin',
            'email' => 'master@metrix.com',
            'password' => bcrypt('123456789'),
        ]);
        $master->assignRole('masteradmin');

        // Usuario Admin
        $admin = User::create([
            'name' => 'Admin User',
            'email' => 'admin@metrix.com',
            'password' => bcrypt('password'),
        ]);
        $admin->assignRole('admin');

        // Usuario Ciudadano
        $ciudadano = User::create([
            'name' => 'Ciudadano',
            'email' => 'ciudadano@metrix',
            'password' => bcrypt('password'),
        ]);
        $ciudadano->assignRole('ciudadano');
    }
}
