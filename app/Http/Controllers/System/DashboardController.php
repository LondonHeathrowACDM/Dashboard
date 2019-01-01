<?php

namespace App\Http\Controllers\System;

use App\Departures;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Vatsimphp\VatsimData;

class DashboardController extends \App\Http\Controllers\Controller
{
    public function getDashboard()
    {
        $callsign = $this->getCurrentCallsign(auth()->user()->cid);
        if($callsign === null){
            $callsign = "NOT LOGGED IN";
        } else {
            $callsign = $this->getCurrentCallsign(auth()->user()->cid);

        }


        $departures = Departures::all(['callsign', 'destination', 'sid', 'tot', 'clrd', 'online_since']);
        $departures = Departures::orderBy('online_since', 'desc')->get();

        return view('acdm.dashboard', ['callsign' => $callsign], ['departures' => $departures]);
    }

    /**
     * @param int $cid
     * @return string|null
     */

    private function checkPilotsRoute(string $jsonDirective) {
        $str = file_get_contents($jsonDirective);
        $json = json_decode($str, true);

        foreach (Departure::pluck('route') as $obj) {

        }




    }

    private function getCurrentCallsign(int $cid): ?string
    {

        return $this->getOnlineControllers()
            ->filter(function ($value) use ($cid) {
                return (int)$value['cid'] === $cid && !preg_match('/_ATIS/', $value['callsign']);
            })->mapWithKeys(function ($item) {
                return ['callsign' => $item['callsign']];
            })->get('callsign');


    }

    /**
     * @return mixed
     */
    private function getOnlineControllers()
    {
        $vatsim = new VatsimData();
        $vatsim->loadData();

        return Cache::remember('online-controllers', 15, function () use ($vatsim) {
            return collect($vatsim->getControllers());
        });
    }
}
