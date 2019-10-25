<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Collection;


class AdminNewsController extends Controller
{   public function AddNews(){
        $listDes = DB::table('tb_diemden')
            ->orderBy('name','asc')
            ->get();
        $data = ['listDes'=>$listDes];
        return view('admin.add-news',$data);

    }
    public function SaveNews(Request $request){
        if ($request->isMethod('post')){

            $file_name= $request->file('avatar');
            $new_name = rand().'.'.$file_name->getClientOriginalExtension();
            $file_path_upload = $request->file('avatar')->store('public/news/avatar/');
            Storage::move($file_path_upload,'public/news/avatar/'.$new_name);
            $link_save_db = $new_name;

            $checkRules = [
                'tieude'=>'required|max:100',
                'tomtat'=>'required|max:255',
                'noidung'=>'required',
                'diemden'=>'required',
                'avatar'=>'required|image',
            ];
            $messages = [
                'tieude.required' => 'Tiêu đề không được để trống!',
                'tieude.max' => 'Tiêu đề không được quá 100 ký tự!',
                'tomtat.required' => 'Tóm tắt không được để trống!',
                'tomtat.max' => 'Tóm tắt không được quá 255 ký tự!',
                'noidung.required' => 'Giá tour không được để trống!',
                'diemden.required' => 'Điểm đến không được để trống!',
                'avatar.required' => 'Avatar không được để trống!',
                'avatar.image' => 'Avatar phải là file ảnh!',
            ];
            $resValidator = Validator::make($request->all(), $checkRules,$messages);

            if ($resValidator->fails()) {
                return redirect(route('admin_news_add'))
                    ->withErrors($resValidator)
                    ->withInput();
            }
//      Ghi DB
            $dataInsert = [];
            $dataInsert['tieude'] = $request->get('tieude');
            $dataInsert['tomtat'] = $request->get('tomtat');
            $dataInsert['noidung'] = $request->get('noidung');
            $dataInsert['id_user'] = 1;
            $dataInsert['id_diemden'] = $request->get('diemden');
            $dataInsert['avatar'] = $link_save_db;
            $dataInsert['ngaydang'] = date("Y-m-d H:i:s");

            $resInsert = DB::table('tb_news')->insertGetId($dataInsert);

            return redirect(route('admin_news_add'))
                ->with(['msg'=>'Thêm mới thành công bài viết']);
        }
    }

    public function  ListNews(){
        // List tour
        $listnews = DB::table('tb_news')
        ->get();
        return view('admin.manage-news',compact('listnews'));
    }

    public function  GetChange($id){
        // List tour
    $news = DB::table('tb_news')
        ->where('id',$id)
        ->first();
    return view('admin.update-news',compact('news'));
    }

    public function UpdateNews(Request $request,$id){
        if ($request->isMethod('post')){
            if ($request->get('avatar')){
                $file_name= $request->file('avatar');
                $new_name = rand().'.'.$file_name->getClientOriginalExtension();
                $file_path_upload = $request->file('avatar')->store('public/news/avatar/');
                Storage::move($file_path_upload,'public/news/avatar/'.$new_name);
                $link_save_db = $new_name;

            }
            


            $checkRules = [
                'tieude'=>'required|max:100',
                'tomtat'=>'required|max:255',
                'noidung'=>'required',
                'diemden'=>'required'
            ];
            $messages = [
                'tieude.required' => 'Tiêu đề không được để trống!',
                'tieude.max' => 'Tiêu đề không được quá 100 ký tự!',
                'tomtat.required' => 'Tóm tắt không được để trống!',
                'tomtat.max' => 'Tóm tắt không được quá 255 ký tự!',
                'noidung.required' => 'Giá tour không được để trống!',
                'diemden.required' => 'Điểm đến không được để trống!'
            ];
            $resValidator = Validator::make($request->all(), $checkRules,$messages);

            if ($resValidator->fails()) {
                return redirect(route('getchangenews',$id))
                    ->withErrors($resValidator)
                    ->withInput();
                }
      // Ghi DB
            $dataInsert = [];
            $dataInsert['tieude'] = $request->get('tieude');
            $dataInsert['tomtat'] = $request->get('tomtat');
            $dataInsert['noidung'] = $request->get('noidung');
            $dataInsert['id_user'] = 1;
            $dataInsert['id_diemden'] = $request->get('diemden');
            if (isset($link_save_db)) {
                $dataInsert['avatar'] = $link_save_db;
            }
            $dataInsert['ngaydang'] = date("Y-m-d H:i:s");

            $resInsert = DB::table('tb_news')
                ->where('id',$id)
                ->update($dataInsert);

            return redirect(route('getchangenews',$id))
                ->with(['msg'=>'Cập nhật thành công bài viết id = ' . $id]);
        }
    }

    public function  DeleteNews($id){
//        List tour
        $res = DB::table('tb_news')
            ->where('id',$id)
            ->delete();
        return redirect(route('listnews'))
            ->with(['msg'=>'Xóa thành công bài viết id = ' . $id]);
    }

}