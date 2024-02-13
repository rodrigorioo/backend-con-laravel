<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::where('email', 'rodrigo@mail.com')
            ->first();

        if (empty($user)) {
            $user = User::create([
                'name' => 'Rodrigo',
                'email' => 'rodrigo@mail.com',
                'password' => Hash::make('123456'),
            ]);
        }
        $user->assignRole('super-admin');

        $user = User::where('email', 'admin@admin.com')
            ->first();

        if (empty($user)) {
            $user = User::create([
                'name' => 'Admin',
                'email' => 'admin@admin.com',
                'password' => Hash::make('123456'),
            ]);
        }
        $user->assignRole('admin');
    }
}
