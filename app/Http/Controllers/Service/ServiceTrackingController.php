<?php

namespace App\Http\Controllers\Service;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ServiceTrackingController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function getNewOrder () {

        return view('service.service_tracking.new');
    }

    public function getAcknowledgement(){

        return view('service.service_tracking.acknowledgement');
    }
}
