<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(["name" => 'delete posts']);
        Permission::create(["name" => 'assign roles']);
        Permission::create(["name" => 'manage roles']);
        Permission::create(["name" => 'create posts']);
        Permission::create(["name" => 'edit posts']);
        Permission::create(["name" => 'read posts']);
        Permission::create(["name" => 'show posts']);

        $role = Role::create(["name" => "admin"]);
        $role->givePermissionTo(['delete posts','manage roles', 'create posts', 'edit posts', 'read posts', 'show posts']);

        $role = Role::create(["name" => "writer"]);
        $role->givePermissionTo(Permission::all());

        $role = Role::create(["name" => "user"]);
        $role->givePermissionTo(['read posts', 'show posts']);
    }
}
