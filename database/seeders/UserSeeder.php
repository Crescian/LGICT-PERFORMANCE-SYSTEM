<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $department = DB::table('departments')->first();

        $users = [
            // ICT =================================================
            [
                'role_name' => 'Employee',
                'name' => 'Ruby Cabuhat',
                'email' => 'rscabuhat@leoniogroup.com',
                'position' => 'Leonio Group Employee',
            ],
        ];

        foreach ($users as $userData) {
            $role = DB::table('roles')
                ->where('role_name', $userData['role_name'])
                ->first();

            if (!$role) {
                $this->command->warn("Role '{$userData['role_name']}' not found. Skipping.");
                continue;
            }

            DB::table('users')->insert([
                'id' => Str::uuid(),
                'name' => $userData['name'],
                'email' => $userData['email'],
                'password' => Hash::make('password'),
                'role_id' => $role->id,
                'department_id' => $department->id,
                'position' => $userData['position'],
                'active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}