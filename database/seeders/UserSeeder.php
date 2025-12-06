<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $firstUser = User::factory()->create();
        $firstUser->assignRole(Role::find(1)->name);

        $sndUser = User::factory()->create();
        $sndUser->assignRole(Role::find(2)->name);
        $p = $sndUser->getPermissionsViaRoles();
        echo ($p);
    }
}
