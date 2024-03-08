<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create(['name' => 'user']);
        $organizer = Role::create(['name' => 'organizer']);
        $organizer->givePermissionTo('manage events');
        Role::create(['name' => 'admin']);
    }
}
