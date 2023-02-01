<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class homeController extends Controller
{
    public function index()
    {
        $mem_num = DB::table('member')->count();
        $item = DB::table('item')
                ->join('item_price','item_price.prc_item_id','item.item_id')
                ->where('item_status',1)
                ->where('prc_status',1)
                ->get();
        $chart = DB::select(DB::raw("SELECT `transaction`.tran_item,item.item_name,
                SUM(`transaction`.tran_amount) AS total
                FROM `transaction`
                LEFT JOIN item ON item.item_id = `transaction`.tran_item
                WHERE `transaction`.tran_type = 1
                GROUP BY item.item_id"));
        return view('index',['mem_num'=>$mem_num,'item'=>$item,'chart'=>$chart]);
    }
}
