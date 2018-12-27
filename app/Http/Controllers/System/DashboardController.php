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
        $controllers = $this->getOnlineControllers()
            ->filter(function ($value) {
                return preg_match('/EGLL_/', $value['callsign']);
            })->pluck('callsign')->toArray();

        $removeATIS = array_search('EGLL_ATIS', $controllers);
        if($removeATIS !== FALSE){
            unset($controllers[$removeATIS]);
        }



        dd($controllers); // pass $controllers collection to view and within the blade template have some conditional on $controllers->contains(auth()->cid)
    }

    private function getOnlineControllers()
    {
        $vatsim = new VatsimData();
        $vatsim->loadData();

        $controllers = Cache::remember('online-controllers', 15, function () use ($vatsim) {
            return collect($vatsim->getControllers()->toArray());
        });

        return $controllers;
    }
}
