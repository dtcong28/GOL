<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Permission;
use App\Models\Role;

class RolesPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i <= 10; $i++) {
            DB::table('roles_permissions')->insert([
                'permission_id' => Permission::select('id')->orderByRaw("RAND()")->first()->id,
                'role_id' => Role::select('id')->orderByRaw("RAND()")->first()->id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
