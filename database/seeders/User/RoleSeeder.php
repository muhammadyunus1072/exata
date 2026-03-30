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
                ['name' => "Super Admin"],
                ['name' => "Member"],
                ['name' => "ACC Japan"],
                ['name' => "Pak Novi"],
                ['name' => "Acc Exata"],
                ['name' => "HS"],
                ['name' => "CC"],
                ['name' => "Acc"],
                ['name' => "Finance"],
                ['name' => "Sales"],
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
