<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Administrador',
            'email' => 'admin@empresa.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
        ]);
    
        User::create([
            'name' => 'Empleado',
            'email' => 'empleado@empresa.com',
            'password' => Hash::make('empleado123'),
            'role' => 'empleado',
        ]);
    }
}
