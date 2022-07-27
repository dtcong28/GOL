<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call([
            SchoolSeeder::class,
            UserSeeder::class,
            PermissionGroupSeeder::class,
            PermissionSeeder::class,
            RoleSeeder::class,
            UsersRoleSeeder::class,
            TagSeeder::class,
            TaggableSeeder::class,
            RolesPermissionSeeder::class,
            AttachmentSeeder::class,
            MessageSeeder::class,
        ]);
    }
}
