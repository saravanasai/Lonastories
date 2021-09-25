<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class TeleCallerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('telecaller')->insert([
            'firstname' => "sweet",
            'lastname' => "sweet",
            'phonenumber' => "7708454539",
            'power' => "Leader",
            'adharnumber' => "787878787878",
            'password' => Hash::make('1412'),
            'status' => "ACTIVE",
        ]);
    }
}
