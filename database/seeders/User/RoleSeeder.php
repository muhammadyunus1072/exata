<?php

namespace Database\Seeders\User;

use App\Helpers\PermissionHelper;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role =
            $roles = [
                ['name' => "Super Admin"], // 1
                ['name' => "Pak Novi"], // 2
                ['name' => "Acc Exata"], // 3
                ['name' => "HS"], // 4
                ['name' => "CC"], // 5
                ['name' => "Finance"], // 6
                ['name' => "Sales"], // 7
                ['name' => "Member"], // 8
            ];
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
