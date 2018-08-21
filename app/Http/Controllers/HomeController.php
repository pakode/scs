<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('service.dashboard');
    }

    public function changeTheme(Request $request) {
        DB::table('MsUsers')
            ->where('id',Auth::id())
            ->update([
                'theme'=>$request->theme
            ]);
    }
}
