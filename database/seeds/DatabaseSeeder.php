<?php

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
        $this->call([
           LocationSeeder::class,
           CategorySeeder::class,
           DeviceSeeder::class,
           RoleSeeder::class,
           StockSeeder::class
        ]);
    }
}
