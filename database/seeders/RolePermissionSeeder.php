<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();
        // create permissions
        Permission::create(['name' => 'add_products']);
        Permission::create(['name' => 'delete_products']);
        Permission::create(['name' => 'rearrange_menu']);


        // create roles and assign existing permissions
        $role0 = Role::create(['name' => 'guest']);
        $role1 = Role::create(['name' => 'customer']);

        $role2 = Role::create(['name' => 'admin']);
        $role2->givePermissionTo('add_products');
        $role2->givePermissionTo('delete_products');
        $role2->givePermissionTo('rearrange_menu');

        $role3 = Role::create(['name' => 'Super-Admin']);

        // create demo users
        $user = User::factory()->create([
            'name' => 'Customer 0',
            'email' => 'customer0@example.com',
            'password' => Hash::make('customer0@example.com'),
            'is_guest' => false,
        ]);
        $user->assignRole($role1);

        $user = User::factory()->create([
            'name' => 'Admin 0',
            'email' => 'admin0@example.com',
            'password' => Hash::make('admin0@example.com'),
            'is_guest' => false,
        ]);
        $user->assignRole($role2);

        $user = User::factory()->create([
            'name' => 'Example Super-Admin User',
            'email' => 'superadmin@example.com',
            'is_guest' => false,
        ]);
        $user->assignRole($role3);

        $user = User::factory()->create([
            'is_guest' => true
        ]);
        $user->assignRole($role0);
    }
}
