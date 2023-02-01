<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class transactionController extends Controller
{
    public function deposit()
    {
        $item = DB::table('item')
                ->join('item_price','item_price.prc_item_id','item.item_id')
                ->where('item_status',1)
                ->where('prc_status',1)
                ->get();
        $member = DB::table('member')
                ->join('account','account.acc_member_id','member.id')
                ->where('account.acc_status',1)
                ->get();
        $history = DB::table('transaction')
                ->join('item','item.item_id','transaction.tran_item')
                ->join('account','account.acc_id','transaction.tran_acc_id')
                ->join('member','member.id','account.acc_member_id')
                ->where('tran_type',1)
                ->orderByDesc('tran_id')
                ->get();
        return view('admin.transaction.deposit',['item'=>$item,'member'=>$member,'history'=>$history]);
    }

    public function add_deposit(Request $request)
    {
        $acc = DB::table('account')
                ->join('member','member.id','account.acc_member_id')
                ->where('acc_member_id',$request->name)
                ->first();
        $item = DB::table('item')
                ->join('item_price','item_price.prc_item_id','item.item_id')
                ->where('item_id',$request->item)
                ->first();
        $price = $item->prc_price * $request->amount;
        $amount = $price + $acc->acc_amount;
        $code = mt_rand(1000000000,9999999999);

        DB::table('transaction')->insert(
            [ 
                "tran_code" => $code,
                "tran_type" => 1,
                "tran_item" => $request->item,
                "tran_amount" => $request->amount,
                "tran_total" => $price,
                "tran_acc_id" => $acc->acc_id,
                "tran_create" => $request->create,
             ]
        );

        DB::table('account')->where('acc_id',$acc->acc_id)->update(
            [
                "acc_amount" => $amount
            ]
        );

        $token = $acc->line_token;
        $message = "** รายการนำฝากสำเร็จ - Trans::Code = $code **\n".$item->item_name."\nจำนวน : ".$request->amount." กิโลกรัม
                    \nจำนวนเงินฝาก : ".number_format($price,2)."\nคงเหลือ : ".number_format($amount,2)."";
        line_notify($token, $message);

        return back()->with('success','บันทึกรายการนำฝากสำเร็จ [ Trans::Code - '.$code.']');
    }

    public function withdraw()
    {
        $trans = DB::table('transaction')
                ->join('account','account.acc_id','transaction.tran_acc_id')
                ->join('member','member.id','account.acc_member_id')
                ->join('trans_type','trans_type.ttype_id','transaction.tran_type')
                ->join('trans_status','trans_status.t_status_id','transaction.tran_status')
                ->where('tran_type',2)
                ->orderByDesc('tran_id')
                ->get();
        return view('admin.transaction.withdraw',['trans'=>$trans]);
    }
    
    public function show_withdraw($id)
    {
        $trans = DB::table('transaction')
                ->join('account','account.acc_id','transaction.tran_acc_id')
                ->join('member','member.id','account.acc_member_id')
                ->join('trans_type','trans_type.ttype_id','transaction.tran_type')
                ->join('trans_status','trans_status.t_status_id','transaction.tran_status')
                ->where('tran_id',$id)
                ->first();
        return view('admin.transaction.withdraw_show',['trans'=>$trans]);
    }

    public function approve_withdraw(Request $request, $id)
    {
        if(empty($request->file('e_img'))){
            return back()->with('error','กรุณาแนบสลิปการโอนเงิน หากเป็นเงินสดให้ถ่ายรูปการส่งมอบเงิน');
        }else{

            $trans = DB::table('transaction')
                    ->join('account','account.acc_id','transaction.tran_acc_id')
                    ->join('member','member.id','account.acc_member_id')
                    ->where('tran_id',$id)
                    ->first();

            $file  = $request->file('e_img');
            $fileName  = $request->file('e_img')->getClientOriginalName();
            $file->move('img/slip', $fileName);
            $total = $trans->acc_amount - $trans->tran_total;

            DB::table('transaction')->where('tran_id',$id)->update(
                [ 
                    "tran_status" => 2,
                    "tran_approve_date" => date('Y-m-d'),
                    "tran_slip" => $fileName,
                 ]
            );
            DB::table('account')->where('acc_id',$trans->acc_id)->update(
                [
                    "acc_amount" => $total
                ]
            );

            $token = $trans->line_token;
            $message = "** รายการเบิกถอน - Trans::Code = $trans->tran_code **\nยอดเงิน : ".$trans->tran_total." ฿
                    \nดำเนินการโอนสำเร็จ\nยอดคงเหลือในบัญชี : ".number_format($total,2)."";
            line_notify($token, $message);

            return back()->with('success','อนุมัติรายการสำเร็จ Trans::Code [ '.$trans->tran_code.' ]');
        }
    }
}
