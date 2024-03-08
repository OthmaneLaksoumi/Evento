<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        $this->call(PermissionSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(CategorySeeder::class);


        $user = \App\Models\User::factory()->create([
            'name' => 'Othmane Laksoumi',
            'email' => 'laksoumi.ot@gmail.com',
            'password' => Hash::make('12345678'), 
        ]);

        $user->assignRole(['user', 'organizer']);

        $user = \App\Models\User::factory()->create([
            'name' => 'Aymen Aymen',
            'email' => 'aymen@gmail.com',
            'password' => Hash::make('12345678'), 
        ]);
        $user->assignRole(['user', 'organizer']);


        \App\Models\Event::factory(10)->create();


    }
}
