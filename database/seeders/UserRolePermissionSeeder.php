<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
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
            'is_active' => true,
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

        Role::create(['name' => 'bendahara']);
        Role::create(['name' => 'koodinator lab']);
        Role::create(['name' => 'koordinator teknis']);
        Role::create(['name' => 'wakil koordinator teknis']);
        Role::create(['name' => 'pj dasar']);
        Role::create(['name' => 'pj jarkom']);
        Role::create(['name' => 'pj multi']);
        Role::create(['name' => 'sekretaris']);

        $admin->assignRole('admin');
        // $admin->roles()->first()->givePermissionTo('create');
        // $admin->roles()->first()->givePermissionTo('read');
        // $admin->roles()->first()->givePermissionTo('update');
        // $admin->roles()->first()->givePermissionTo('delete');
        // $admin->givePermissionTo('create');
        // $admin->givePermissionTo('read');
        // $admin->givePermissionTo('update');
        // $admin->givePermissionTo('delete');
    }
}
