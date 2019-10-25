<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
class SaveController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function LuuDon(Request $request,$id){
        if ($request->isMethod('post')){

            $checkRules = [
                'name'=>'required',
                'email'=>'required',
                'phone'=>'required',
                'pay'=>'required',
            ];
            $messages = [
                'name.required' => 'Tên không được để trống!',
                'email.required' => 'Email không được để trống!',
                'phone.required' => 'Điện thoại không được để trống!',
                'pay.required' => 'Phương thức thanh toán không được để trống!',
            ];
            $resValidator = Validator::make($request->all(),$checkRules,$messages);

            if ($resValidator->fails()) {
                return redirect(route('dattour',$id))
                    ->withErrors($resValidator)
                    ->withInput();
            }
//      Ghi DB
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $dataInsert = [];
            $dataInsert['name'] = $request->get('name');
            $dataInsert['email'] = $request->get('email');
            $dataInsert['phone'] = $request->get('phone');
            $dataInsert['address'] = $request->get('address');
            $dataInsert['pay'] = $request->get('pay');
            $dataInsert['id_tour'] = $id;
            $dataInsert['id_user'] = 1;
            $dataInsert['time'] = date('Y-m-d H:i:s',time());
            $dataInsert['id_status'] = 1;

            $resInsert = DB::table('tb_detail_booking')->insertGetId($dataInsert);

            return redirect(route('dattour',$id))
                ->with(['msg'=>'Cảm Ơn Bạn Đã Liên Hệ Đặt Tour Chúng Tôi Sẽ Liên Hệ Với Bạn Sớm Nhất Có Thể ' . $resInsert]);
        }
    }
}
