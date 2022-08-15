<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Role;
use App\Models\User;

class UsersRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users_roles')->insert([
            'user_id' => User::select('id')->where('name', '=', 'Admin')->first()->id,
            'role_id' => Role::select('id')->where('name', '=', 'Admin')->first()->id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
