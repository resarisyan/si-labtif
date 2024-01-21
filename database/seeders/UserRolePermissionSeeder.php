<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserRolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create([
            'name' => 'Admin',
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
        ]);

        Role::create(['name' => 'admin']);
        Role::create(['name' => 'asisten']);
        Role::create(['name' => 'mahasiswa']);

        Permission::create(['name' => 'create']);
        Permission::create(['name' => 'read']);
        Permission::create(['name' => 'update']);
        Permission::create(['name' => 'delete']);

        $admin->assignRole('admin');
        $admin->givePermissionTo('create');
        $admin->givePermissionTo('read');
        $admin->givePermissionTo('update');
        $admin->givePermissionTo('delete');
    }
}
