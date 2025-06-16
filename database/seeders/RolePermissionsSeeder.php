<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role; // ✅ MUHIM!
use Spatie\Permission\Models\Permission; // ✅ MUHIM!

class RolePermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Rollar
        Role::create(['name' => "Super Admin"]);
        Role::create(['name' => "Admin"]);
        Role::create(['name' => "Creator"]);

        // Ruxsatlar
        Permission::create(['name' => "Create category"]);
        Permission::create(['name' => "Edit category"]);
        Permission::create(['name' => "Delete category"]);
    }
}
