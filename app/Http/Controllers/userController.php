<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use Session;
use Illuminate\Support\Facades\Hash;

class userController extends Controller
{
    public function index()
    {
        $id = Auth::user()->id;
        $list = DB::table('member')
                ->join('gender','gender.g_id','member.gender')
                ->join('department','department.dept_id','member.department')
                ->where('member.id',$id)
                ->first();
        $accn = DB::table('account')
                ->join('acc_status','acc_status.ast_id','account.acc_status')
                ->where('acc_member_id',$id)
                ->get();
        $dept = DB::table('department')->get();
        $gender = DB::table('gender')->get();
        return view('user.personal',['list'=>$list,'dept'=>$dept,'gender'=>$gender,'accn'=>$accn]);
    }

    public function update(Request $request, $id)
    {
        if(!empty($request->file('e_img'))){
            $file  = $request->file('e_img');
            $fileName  = $request->file('e_img')->getClientOriginalName();
            $file->move('img/member', $fileName);

            DB::table('member')->where('id',$id)->update([
                "username" => $request->username,
                "name" => $request->name,
                "department" => $request->dept,
                "gender" => $request->gender,
                "cid" => $request->cid,
                "address" => $request->address,
                "tel" => $request->tel,
                "email" => $request->email,
                "line_token" => $request->line_token,
                "img" => $fileName,
            ]);
        }else{
            DB::table('member')->where('id',$id)->update([
                "username" => $request->username,
                "name" => $request->name,
                "department" => $request->dept,
                "gender" => $request->gender,
                "cid" => $request->cid,
                "address" => $request->address,
                "tel" => $request->tel,
                "email" => $request->email,
                "line_token" => $request->line_token,
            ]);
        }
        return back()->with('success','แก้ไขข้อมูล : '.$request->get('name').' สำเร็จ');
    }

    public function statement()
    {
        $session = Auth::user()->id;
        $member = DB::table('member')
                ->where('id',$session)
                ->first();
        $history = DB::table('transaction')
                ->join('trans_type','trans_type.ttype_id','transaction.tran_type')
                ->join('trans_status','trans_status.t_status_id','transaction.tran_status')
                ->join('item','item.item_id','transaction.tran_item')
                ->join('account','account.acc_id','transaction.tran_acc_id')
                ->join('member','member.id','account.acc_member_id')
                ->where('member.id',$session)
                ->orderByDesc('transaction.tran_id')
                ->get();
        return view('user.statement',['history'=>$history]);
    }

    public function withdraw(Request $request)
    {
        $code = mt_rand(1000000000,9999999999);
        $session = Auth::user()->id;
        $curuser = Auth::user()->name;
        $acc = DB::table('account')->where('acc_member_id',$session)->first();

        if($request->amount <= 0 || $request->amount >= $acc->acc_amount){
            return back()->with('error','ท่านทำรายการไม่ถูกต้อง กรุณาทำรายการใหม่อีกครั้ง');
        }else{
            DB::table('transaction')->insert(
                [ 
                    "tran_code" => $code,
                    "tran_item" => 9999,
                    "tran_amount" => 1,
                    "tran_type" => 2,
                    "tran_total" => $request->amount,
                    "tran_acc_id" => $acc->acc_id,
                    "tran_create" => $curuser,
                    "tran_status" => 1,
                ]
            );
            $token = Auth::user()->line_token;
            $message = "** ท่านได้ทำรายการเบิกถอน - Trans::Code = $code **\nยอดเงิน : ".number_format($request->amount,2)." ฿\nผู้ดูแลระบบจะใช้เวลาตรวจสอบรายการภายใน 1-2 วัน\nหรือ ติดต่อผู้ดูแลระบบ เพื่อขอยกเลิกรายการ";
            line_notify($token, $message);

            return back()->with('success','ทำรายการขอเบิกถอนสำเร็จ [ '.$request->amount.' ฿ ] : กรุณารอผู้ดูแลระบบทำการอนุมัติ');
    
        }
    }
}
