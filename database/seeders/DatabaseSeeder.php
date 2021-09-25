<?php

namespace Database\Seeders;

use App\Models\Products;
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
        $this->call([AdminTableSeeder::class]);
        $this->call([StatusSeeder::class]);
        $this->call([TeleCallerSeeder::class]);
        $this->call([ProductSeeder::class]);
        $this->call([SubProductSeeder::class]);
    }
}
