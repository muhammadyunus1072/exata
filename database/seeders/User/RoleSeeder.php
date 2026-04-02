<?php

namespace Database\Seeders\User;

use App\Helpers\PermissionHelper;
use App\Models\AlurPencairan\AlurPencairan;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $roles = [];

        foreach (AlurPencairan::ROLE_ALIASE as $role) {
            $roles[] = [
                'name' => $role
            ];
        }

        foreach ($roles as $index => $role) {
            $roles[$index] = Role::create($role);
        }
        foreach (PermissionHelper::ACCESS_TYPE_ALL as $access => $types) {
            foreach ($types as $type) {
                foreach ($roles as $role) {
                    $role->givePermissionTo(PermissionHelper::transform($access, $type));
                }
            }
        }
    }
}
