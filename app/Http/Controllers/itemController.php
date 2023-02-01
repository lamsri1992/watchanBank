<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use Session;
use Illuminate\Support\Facades\Hash;

class itemController extends Controller
{
    public function list()
    {
        $list = DB::table('item')
                ->join('acc_status','acc_status.ast_id','item.item_status')
                ->get();
        return view('admin.item.list',['list'=>$list]);
    }

    public function add(Request $request)
    {
        DB::table('item')->insert(
            [ "item_name" => $request->item_name ]
        );

        return back()->with('success','สร้างรายการสำเร็จ : '.$request->get('item_name'));
    }

    public function show($id)
    {
        $list = DB::table('item')->where('item_id',$id)->first();
        $price = DB::table('item_price')
                ->where('prc_item_id',$id)
                ->get();
        $stat = DB::table('acc_status')->get();
        return view('admin.item.show',['list'=>$list,'price'=>$price,'stat'=>$stat]);
    }

    public function update(Request $request, $id)
    {
        DB::table('item')->where('item_id',$id)->update(
            [ 
                "item_name" => $request->item_name,
                "item_status" => $request->item_status
            ]
        );

        return back()->with('success','แก้ไขรายการสำเร็จ : '.$request->get('item_name'));
    }

    public function price(Request $request)
    {
        DB::table('item_price')->insert(
            [ 
                "prc_item_id" => $request->item_id,
                "prc_price" => $request->prc_price,
             ]
        );

        return back()->with('success','สร้างรายการสำเร็จ : '.$request->get('item_name'));
    }

    public function set_price($id)
    {
        $price = DB::table('item_price')->where('prc_id',$id)->first();

        DB::table('item_price')->where('prc_item_id',$price->prc_item_id)->update([
            "prc_status" => 2,
        ]);

        DB::table('item_price')->where('prc_id',$id)->update([
            "prc_status" => 1,
        ]);

        return back()->with('success','กำหนดราคารับซื้อแล้ว : '.$price->prc_price." ฿");
    }
}
