<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

class HocsinhController extends Controller
{
    public function create()
        {
            return view('hocsinh.create');
        }

    public function store(Request $request)
        {
            
            //Lấy giá trị học sinh đã nhập
            $allRequest  = $request->all();
            $HS_MA  = $allRequest['HS_MA'];
            $HS_TEN  = $allRequest['HS_TEN'];
            $HS_DIACHI  = $allRequest['HS_DIACHI'];
            $HS_SDT = $allRequest['HS_SDT'];
            
            //Gán giá trị vào array
            $dataInsertToDatabase = array(
                'HS_MA'  => $HS_MA,
                'HS_TEN'  => $HS_TEN,
                'HS_DIACHI'  => $HS_DIACHI,
                'HS_SDT' => $HS_SDT,
            );
            
            $insertData = DB::table('hocsinh')->insert($dataInsertToDatabase);
            
            if ($insertData) {
                Session::flash('success', 'Thêm mới học sinh thành công!');
            }else {                        
                Session::flash('error', 'Thêm thất bại!');
            }
            
            return redirect('hocsinh');
        }
        public function index()
            {
                $getData = DB::table('hocsinh')->select('HS_MA','HS_TEN','HS_DIACHI','HS_SDT')->get();
                
                return view('hocsinh.list')->with('listhocsinh',$getData);
            }
        public function edit($HS_MA)
            {
                $getData = DB::table('hocsinh')->select('HS_MA','HS_TEN','HS_DIACHI','HS_SDT')->where('HS_MA',$HS_MA)->get();
                
                return view('hocsinh.edit')->with('getHocSinhById',$getData);
            }

        public function update(Request $request)
            {
            
                $updateData = DB::table('hocsinh')->where('HS_MA', $request->HS_MA)->update([
                    'HS_MA' => $request->HS_MA,
                    'HS_TEN' => $request->HS_TEN,
                    'HS_DIACHI' => $request->HS_DIACHI,
                    'HS_SDT' => $request->HS_SDT,
                ]);
                
                if ($updateData) {
                    Session::flash('success', 'Sửa học sinh thành công!');
                }else {                        
                    Session::flash('error', 'Sửa thất bại!');
                }
                
                return redirect('hocsinh');
            }
            public function destroy($id)
                {
                    $deleteData = DB::table('hocsinh')->where('HS_MA', '=', $id)->delete();
                    
                    if ($deleteData) {
                        Session::flash('success', 'Xóa học sinh thành công!');
                    }else {                        
                        Session::flash('error', 'Xóa thất bại!');
                    }
                    
                    return redirect('hocsinh');
                }
}
