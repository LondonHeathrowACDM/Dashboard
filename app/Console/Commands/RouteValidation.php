<?php

namespace App\Console\Commands;

use App\Departures;
use Illuminate\Console\Command;

class RouteValidation extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'VATSIM:RouteValidator';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Validates VATSIM routes';

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
    return null;
    }
}
