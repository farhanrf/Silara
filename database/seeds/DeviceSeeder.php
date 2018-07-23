<?php

use Illuminate\Database\Seeder;

class DeviceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      if (($handle = fopen ( base_path() . '/resources/csv/stock.csv', 'r' )) !== FALSE) {
          while ( ($data = fgetcsv ( $handle, 1000, ',' )) !== FALSE ) {
             DB::table('devices')->insert([
                  'no_registration' => $data[1],
                  'name' => $data[2],
                  'cost' => 0,
                  'created_at' => date("Y-m-d H:i:s"),
                  'updated_at' => date("Y-m-d H:i:s")
             ]);
          }
          fclose ( $handle );
      }
    }
}
