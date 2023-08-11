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
     */
    public function run(): void
    {
        $this->call([
            RolePermissionSeeder::class,
            MenuAndItemSeeder::class,
        ]);

        $user = User::create([
            'name' => 'Hunter',
            'email' => 'hunter@laravel.com',
            'password' => Hash::make('hunter@laravel.com'),
            'is_guest' => false
        ]);

        $user->assignRole(Role::findByName('Super-Admin'));

    }
}
