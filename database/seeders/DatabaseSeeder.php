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

        $serviceRole = Role::create([
            'name' => 'service',
            'guard_name' => 'web',
        ]);

        $admin = User::factory()->create([
            'name' => 'Test Admin',
            'email' => 'admin@admin.com',
            'phone' => '123456789',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
        ]);

        $service = User::factory()->create([
            'name' => 'Test Service',
            'email' => 'service@service.com',
            'phone' => '123456789',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
        ]);

        foreach (['view-any', 'view', 'create', 'update', 'delete', 'delete-any', 'replicate', 'restore', 'restore-any', 'reorder', 'force-delete', 'force-delete-any'] as $value) {
            Permission::create(['guard_name' => GuardName::WEB->value, 'name' => $value.' Role']);
            Permission::create(['guard_name' => GuardName::WEB->value, 'name' => $value.' Permission']);
        }
        $admin->assignRole('admin');
        $service->assignRole('service');
        $adminRole->givePermissionTo(Permission::all());
        $serviceRole->givePermissionTo([Permission::whereName('view Car')->get(), Permission::whereName('view Order')->get(), Permission::whereName('view Availability')->get(), Permission::whereName('view Location')->get(), Permission::whereName('view Customer')->get()]);
        $serviceRole->givePermissionTo([Permission::whereName('view-any Car')->get(), Permission::whereName('view-any Order')->get(), Permission::whereName('view-any Availability')->get(), Permission::whereName('view-any Location')->get(), Permission::whereName('view-any Customer')->get()]);
        $serviceRole->givePermissionTo([Permission::whereName('create Car')->get(), Permission::whereName('create Order')->get(), Permission::whereName('create Availability')->get(), Permission::whereName('create Location')->get(), Permission::whereName('create Customer')->get()]);
        $serviceRole->givePermissionTo([Permission::whereName('update Car')->get(), Permission::whereName('update Order')->get(), Permission::whereName('update Availability')->get(), Permission::whereName('update Location')->get(), Permission::whereName('update Customer')->get()]);
        $serviceRole->givePermissionTo([Permission::whereName('delete Car')->get(), Permission::whereName('delete Order')->get(), Permission::whereName('delete Availability')->get(), Permission::whereName('delete Location')->get(), Permission::whereName('delete Customer')->get()]);
        $serviceRole->givePermissionTo([Permission::whereName('delete-any Car')->get(), Permission::whereName('delete-any Order')->get(), Permission::whereName('delete-any Availability')->get(), Permission::whereName('delete-any Location')->get(), Permission::whereName('delete-any Customer')->get()]);
        $this->call([
            CarSeeder::class,
            AttributesSeeder::class,
            AvailabilitySeeder::class,
            LocationSeeder::class,
            CustomerSeeder::class,
            OrderSeeder::class,
        ]);
    }
}
