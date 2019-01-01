<?php

use Illuminate\Database\Seeder;
use Illuminate\Http;
use App\Departures;

class VATSIMDepartureData extends DatabaseSeeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $jsonData = json_decode(file_get_contents('http://api.vateud.net/online/departures/egll.json'));
        foreach ($jsonData as $obj) {
            $result = Departures::where('callsign')->get();
            if(!$result and Departures::where('callsign', '!=', $obj->callsign)){
                Departures::where('callsign', '=', Departures::pluck('callsign'))->delete();
            }
            elseif ($obj->altitude < 100) {
                $callsignExists = Departures::where('callsign', '=', $obj->callsign)->first();
                if ($callsignExists === null) {
                    Departures::updateOrCreate(array(
                        'callsign' => $obj->callsign,
                        'route' => $obj->route,
                        'altitude' => $obj->altitude,
                        'destination' => $obj->destination,
                        'online_since' => date("Y-m-d H:i:s", strtotime($obj->online_since)),
                    ));
                }
            }elseif ($obj->altitude > 100) {
                Departures::where('callsign', '=', $obj->callsign)->delete();
            }


        }
    }

}
