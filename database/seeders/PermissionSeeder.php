<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    public function run()
    {
        $role_service = Role::updateOrCreate(
            ['name' => 'Service Desk'],
            ['name' => 'Service Desk']
        );

        $role_client = Role::updateOrCreate(
            ['name' => 'Client'],
            ['name' => 'Client']
        );

        $permission = Permission::updateOrCreate(
            ['name' => 'view_dashboard'],
            ['name' => 'view_dashboard']
        );

        $permission2 = Permission::updateOrCreate(
            ['name' => 'view_chart_on_dashboard'],
            ['name' => 'view_chart_on_dashboard']
        );

        $role_service->givePermissionTo($permission);
        $role_service->givePermissionTo($permission2);
        $role_client->givePermissionTo($permission2);

        $user = User::find(1);
        $user2 = User::find(2);

        $user->assignRole('Service Desk');
        $user2->assignRole('Client');
    }

}
