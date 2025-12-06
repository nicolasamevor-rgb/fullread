<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleHasPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = Role::find(1);
        $permission = Permission::all();
        $admin->SyncPermissions($permission);

        $lecteur = Role::find(2);
        $roll_back_lecteur_permissions = [
            'gerer utilisateurs',
            'gerer livres',
            'gerer reservations',
        ];
        foreach ($permission as $perm) {
            if (!in_array($perm, $roll_back_lecteur_permissions)) {
                $lecteur->SyncPermissions($perm);
            }
        }
    }
}
