<?php

namespace App\Console\Commands;

use App\Departures;
use Illuminate\Console\Command;

class UpdateVatsimData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'VATSIM:Download';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Download VATSIM data';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $jsonData = json_decode(file_get_contents('http://api.vateud.net/online/departures/egll.json'));
        foreach ($jsonData as $obj) {
            $result = Departures::where('callsign')->get();
            if (!$result and Departures::where('callsign', '!=', $obj->callsign)) {
                Departures::where('callsign', '=', Departures::pluck('callsign'))->delete();
            }
            elseif ($obj->altitude < 100 and $obj->longitude > -0.5 and $obj->longitude < -0.41 and $obj->latitude < 51.48 and $obj->latitude > 51.45) {

                $callsignExists = Departures::where('callsign', '=', $obj->callsign)->first();
                if ($callsignExists === null) {
                    Departures::updateOrCreate(array(
                        'callsign' => $obj->callsign,
                        'route' => $obj->route,
                        'altitude' => $obj->altitude,
                        'longitude' => $obj->longitude,
                        'latitude' => $obj->latitude,
                        'destination' => $obj->destination,
                        'online_since' => date("Y-m-d H:i:s", strtotime($obj->online_since)),
                    ));
                }

            } elseif ($obj->altitude > 100 or $obj->longitude < -0.5 or $obj->longitude > -0.41 or $obj->latitude > 51.48 or $obj->latitude < 51.45) {
                Departures::where('callsign', '=', $obj->callsign)->delete();
            }


        }
    return null;
    }
}
