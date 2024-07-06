<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rolePemilik = Role::create(['name' => 'pemilik']);
        $roleKaryawan = Role::create(['name' => 'karyawan']);

        $permission = Permission::create(['name' => 'manage karyawan']);

        $rolePemilik->givePermissionTo($permission);

        $pemilik = User::create([
            'name' => 'Sri Suyanti 2',
            'email' => 'srisuyanti2@admin.com',
            'email_verified_at' => now(),
            'password' => bcrypt('admin123'),
        ]);
        $pemilik->assignRole($rolePemilik);

        $karyawan = User::create([
            'name' => 'Karyawan',
            'email' => 'karyawan@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('karyawan'),
        ]);
        $karyawan->assignRole($roleKaryawan);
    }
}
