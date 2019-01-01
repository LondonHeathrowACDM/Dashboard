<?php

namespace Tests\Feature;

use App\Departures;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
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
                } elseif(Departures::pluck('correctRoute') === 1 and stripos($obj, $sroute) === false) {
                    Departures::where('id', $id)->update(['correctRoute'=> false]);


                }


            }

        }

    }

}
