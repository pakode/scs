<?php

namespace App\Http\Controllers\Service;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MaterialInformationController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }
}
