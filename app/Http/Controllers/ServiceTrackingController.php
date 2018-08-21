<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServiceTrackingController extends Controller {
    //

    public function getNewOrder () {


        return view('service.service_tracking.new');
    }
}
