<?php

use Vanguard\Role;
use Vanguard\Support\Enum\UserStatus;
use Vanguard\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */


    public function run()
    {
        $admin = Role::where('name', 'Admin')->first();
        $agent = Role::where('name', 'Agent')->first();

        User::create([
            
            'first_name' => 'Vanguard',
            'email' => 'admin@example.com',
            'username' => 'admin',
            'password' => 'admin123',
            'avatar' => null,
            'country_id' => null,
            'role_id' => $admin->id,
            'status' => UserStatus::ACTIVE,
            'email_verified_at' => now(),
        ]);

        User::create([

            'first_name' => 'Agent',
            'email' => 'agent@example.com',
            'username' => 'agent',
            'password' => 'agent123',
            'avatar' => null,
            'country_id' => null,
            'role_id' => $agent->id,
            'status' => UserStatus::ACTIVE,
            'email_verified_at' => now(),
            
        ]);

    }
}
