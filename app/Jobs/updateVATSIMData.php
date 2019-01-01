<?php

namespace App\Jobs;

use App\Departures;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class updateVATSIMData implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $jsonData = json_decode(file_get_contents('http://api.vateud.net/online/departures/egll.json'));
        foreach ($jsonData as $obj) {
            if ($obj->altitude < 500) {
                $callsignExists = Departures::where('callsign', '=', $obj->callsign)->first();
                if ($callsignExists === null) {
                    Departures::updateOrCreate(array(
                        'callsign' => $obj->callsign,
                        'route' => $obj->route,
                        'altitude' => $obj->altitude,
                        'destination' => $obj->destination,
                        'online_since' => date("Y-m-d H:i:s", strtotime($obj->online_since))
                    ));
                }
            } elseif (Departures::pluck('callsign') !== $obj->callsign) {
                Departures::destroy(array(
                    'callsign' => $obj->callsign,
                    'route' => $obj->route,
                    'altitude' => $obj->altitude,
                    'destination' => $obj->destination,
                    'online_since' => date("Y-m-d H:i:s", strtotime($obj->online_since))
                ));
            }
        }
    }
}
