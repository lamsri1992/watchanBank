<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use Session;
use Illuminate\Support\Facades\Hash;

class memberController extends Controller
{
    public function list()
    {
        $list = DB::table('member')
                ->join('gender','gender.g_id','member.gender')
                ->join('department','department.dept_id','member.department')
                ->get();
        $dept = DB::table('department')->get();
        $gender = DB::table('gender')->get();
        return view('admin.member.list',['list'=>$list,'dept'=>$dept,'gender'=>$gender]);
    }

    public function add(Request $request)
    {
        $pswd = substr($request->tel,6,5);
        $file  = $request->file('e_img');
        $fileName  = $request->file('e_img')->getClientOriginalName();
        $path = public_path('img/member');
        $file->move(public_path('img/member'), $fileName);

        DB::table('member')->insert(
            [
                "name" => $request->name,
                "department" => $request->dept,
                "gender" => $request->gender,
                "cid" => $request->cid,
                "address" => $request->address,
                "tel" => $request->tel,
                "email" => $request->email,
                "line_token" => $request->line_token,
                "img" => $fileName,
                "password" => Hash::make($pswd),
            ]
        );

        $accno = mt_rand(1000000,9999999);
        $acc_id = DB::getPdo()->lastInsertId();;
        DB::table('account')->insert(
            [
                "acc_no" => $accno,
                "acc_member_id" => $acc_id,
                "acc_open" => date('Y-m-d'),
                "acc_note" => 'เปิดบัญชีอัตโนมัติ จากการลงทะเบียนครั้งแรก',
            ]
        );

        return back()->with('success','ลงทะเบียนสมาชิกสำเร็จ : '.$request->get('name'));
    }

    public function show($id)
    {
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
        return view('admin.member.show',['list'=>$list,'dept'=>$dept,'gender'=>$gender,'accn'=>$accn]);
    }

    public function update(Request $request, $id)
    {
        if(!empty($request->file('e_img'))){
            $file  = $request->file('e_img');
            $fileName  = $request->file('e_img')->getClientOriginalName();
            $file->move('img/member', $fileName);

            DB::table('member')->where('id',$id)->update([
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
}
