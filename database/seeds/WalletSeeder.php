<?php

use Vanguard\Wallet;
use Vanguard\Role;
use Illuminate\Database\Seeder;

class WalletSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $agent = Role::where('name', 'Agent')->first();

        Wallet::create([
            'balance' => 0.00,
            'agent_id' => $agent->id
            
        ]);
    }
}
