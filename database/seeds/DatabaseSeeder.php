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
        $this->call(PerfisSeeder::class);
        $this->call(TimeSeeder::class);
        $this->call(UsersTableSeeder::class);
    }
}
