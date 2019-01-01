<?php

use Illuminate\Database\Seeder;
use Illuminate\Http;
use App\Departures;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(VATSIMDepartureData::class);
        // $this->call(UsersTableSeeder::class);
    }
}
