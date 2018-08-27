<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use DateTime;

class OutletsController extends Controller {
    public function __construct() {
        $this->middleware('auth');
    }
    public function getUpdated() {
        $dtm = new DateTime();
        $array = [
            "updated_at" => $dtm->format('Y-m-d H:i:s'),
            "updated_by" => Auth::user()->name
        ];

        return $array;
    }

    public function getCreated() {
        $dtm = new DateTime();
        $array = [
            "created_at" => $dtm->format('Y-m-d H:i:s'),
            "created_by" => Auth::user()->name
        ];

        return $array;
    }

    public function getDeleted() {
        $dtm = new DateTime();
        $array = [
            "deleted_at" => $dtm->format('Y-m-d H:i:s'),
            "deleted_by" => Auth::user()->name
        ];

        return $array;
    }

    public function getOutlets(){
        $data['outlets']=DB::table('MsSubscriberOutlets')->get();

        return view('admin.outlets.outlets',$data)->with('hasTable',true);

    }

    public function getNewOutlets() {
        return view('admin.outlets.new-outlet');
    }
}
