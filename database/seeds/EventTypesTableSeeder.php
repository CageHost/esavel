<?php

use Illuminate\Database\Seeder;

class EventTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('event_types')->insert([
          'name' => 'Competitive',
          'alias' => 'competitive'
      ]);

      DB::table('event_types')->insert([
          'name' => 'Free Play',
          'alias' => 'free-play'
      ]);
    }
}
