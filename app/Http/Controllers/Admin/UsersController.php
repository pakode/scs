<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use DateTime;

class UsersController extends Controller {

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

    public function getUsers() {

        return view('admin.users.users');
    }

    public function getRoles() {

        return view('admin.users.roles');
    }
}
