<?php

use Vanguard\Role;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name' => 'Admin',
            'display_name' => 'Admin',
            'description' => 'System administrator.',
            'removable' => false
        ]);

        // Role::create([
        //     'name' => 'User',
        //     'display_name' => 'User',
        //     'description' => 'Default system user.',
        //     'removable' => false
        // ]);

        Role::create([
            'name' => 'Agent',
            'display_name' => 'Agent',
            'description' => 'Default system Agent.',
            'removable' => false
        ]);
    }
}
