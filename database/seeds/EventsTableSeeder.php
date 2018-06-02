<?php

use Illuminate\Database\Seeder;

class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('events')->insert([
          'name' => 'SpraYnPray'
      ]);

      DB::table('events')->insert([
          'name' => 'Scrub Practice'
      ]);
    }
}
