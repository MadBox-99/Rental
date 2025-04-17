<?php

namespace Database\Seeders;

use App\Enums\GuardName;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Artisan::call('permissions:sync');

        // User::factory(10)->create();
        $adminRole = Role::create([
            'name' => 'admin',
            'guard_name' => 'web',
        ]);

        Role::create([
            'name' => 'service',
            'guard_name' => 'web',
        ]);

        $admin = User::factory()->create([
            'name' => 'Test Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
        ]);
        foreach (['view-any', 'view', 'create', 'update', 'delete', 'delete-any', 'replicate', 'restore', 'restore-any', 'reorder', 'force-delete', 'force-delete-any'] as $value) {
            Permission::create(['guard_name' => GuardName::WEB->value, 'name' => $value.' Role']);
            Permission::create(['guard_name' => GuardName::WEB->value, 'name' => $value.' Permission']);
        }
        $admin->assignRole('admin');
        $adminRole->givePermissionTo(Permission::all());

        $this->call([
            CarSeeder::class,
            AvailabilitySeeder::class,
            LocationSeeder::class,
            CustomerSeeder::class,
            OrderSeeder::class,
        ]);
    }
}
