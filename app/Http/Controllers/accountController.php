<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use Session;
use Illuminate\Support\Facades\Hash;

class accountController extends Controller
{
    public function list()
    {
        $list = DB::table('account')
                ->join('member','member.id','account.acc_member_id')
                ->join('acc_status','acc_status.ast_id','account.acc_status')
                ->get();
        return view('admin.account.list',['list'=>$list]);
    }
}
