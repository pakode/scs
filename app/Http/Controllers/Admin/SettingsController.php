<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use DateTime;


class SettingsController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function getAction($act) {

        $dtm = new DateTime();
        $first = $act."_at";
        $second = $act."_by";
        $array = [
            $first => $dtm->format('Y-m-d H:i:s'),
            $second => Auth::user()->name
        ];
        if ($act == 'created') {
            $array += ['company_id' => Auth::user()->company_id];
        }

        return $array;
    }

    public function getProductSetting() {

        $data['products'] = DB::table('MsSubscriberProduct')
            ->where('company_id',Auth::user()->company_id)
            ->where('deleted_at',null)
            ->select('id', 'category_code','model_code','model_remark','created_by')
            ->orderBy('created_at','desc')
            ->get();

        $data['categories'] = DB::table('MsSubscriberCategoryProduct')
            ->where('company_id',Auth::user()->company_id)
            ->where('deleted_at',null)
            ->select('id', 'category_code','category_remark','created_by')
            ->orderBy('created_at','desc')
            ->get();

        return view('admin.settings.product',$data);

    }

    public function postProductSetting(Request $request) {
        if ($request->action == 'new') {
            $form_data =  $request->data;
            DB::table($request->table)
                ->insert($form_data+$this->getAction('created'));
        }

        if ($request->action == 'delete') {
            DB::table($request->table)
                ->where('id',$request->id)
                ->update($this->getAction('deleted'));
        }

    }
}
