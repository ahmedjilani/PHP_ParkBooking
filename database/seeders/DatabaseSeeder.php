<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Admin',
            'email' => 'park_booking@gmail.com',
            'password' => Hash::make('12345678')
        ]);
        $role = Role::create(['name' => 'admin']);
        $user->assignRole($role);
        Role::create(['name' => 'user']);
    }
}
