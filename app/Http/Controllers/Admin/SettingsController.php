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

        return $array;
    }

    public function getProductSetting() {

        $data['categories'] = DB::table('MsSubscriberCategoryProduct')
            ->where('deleted_at',null)
            ->select('id', 'product_code','product_remark','created_by')
            ->orderBy('created_at','desc')
            ->get();

        return view('admin.settings.product',$data);

    }

    public function postProductSetting(Request $request) {
        if ($request->action == 'new') {
            $form_data =  $request->data;
            DB::table('MsSubscriberCategoryProduct')
                ->insert($form_data+$this->getAction('created'));
        }
        if ($request->action == 'delete') {
            DB::table('MsSubscriberCategoryProduct')->delete($request->id);
        }

    }
}
