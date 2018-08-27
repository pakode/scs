<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use DateTime;

class CompanyController extends Controller {

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

    public function getCompany() {

        $data['company']= DB::table('MsSubscriberDetails')->where('id',Auth::user()->company_id)->first();
        $data['users']= DB::table('MsUsers')->where('id',Auth::user()->company_id)->count();
        return view('admin.company',$data);
    }

    public function postCompany(Request $request){
        $form_data =  $request->data;
        DB::table('MsSubscriberDetails')
            ->where('id',Auth::user()->company_id)
            ->update($form_data+$this->getUpdated());
    }
}
