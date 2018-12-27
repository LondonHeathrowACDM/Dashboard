<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function checkVatsimPosition() {
        $vatsim = new \Vatsimphp\VatsimData();

        $vatsim->loadData();

        $controllers = $vatsim->getControllers()->toArray();



        dd($this->searchForPos(Auth::user()->cid, $controllers));
    }


    private function searchForPos($id, $array)
    {
        foreach ($array as $key => $val) {
            if (strpos($val['cid'], $id) !== false) {
                $selection = $array[$key];
                return [$selection['callsign'], $selection['cid']];
            };
        }
    return null;
    }
}
