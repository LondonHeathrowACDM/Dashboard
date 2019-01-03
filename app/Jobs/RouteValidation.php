<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class RouteValidation implements ShouldQueue
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
        $path = storage_path('app/public/json/routes.json');
        $str = file_get_contents($path);
        $json = json_decode($str, true);

        $sidRoute = $json['sidRoutes'];

        $route = Departures::pluck('route', 'id');
        foreach ($route as $id => $obj) {

            foreach ($sidRoute as $sroute) {

                if (stripos($obj, $sroute) !== false) {
                    Departures::where('id', $id)->update(['correctRoute'=> true]);
                }
                elseif (stripos($obj, $sroute) !== true and Departures::pluck('correctRoute') === true) {
                    Departures::where('id', $id)->update(['correctRoute'=> false]);


                }


            }

        }
    }
}
