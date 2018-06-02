<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(EventTypesTableSeeder::class);
        // TODO: Don't code seed, just build it
        //$this->call(EventsTableSeeder::class);
    }
}
