<?php

namespace App\Http\Controllers\System;

use App\Dashboard;
use Illuminate\Http\Request;

class DashboardController extends \App\Http\Controllers\Controller
{
    public function getDashboard()
    {
        return view("acdm.dashboard");
    }
}
