<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

class HocsinhController extends Controller
{
    public function create()
        {
            //Hiển thị trang thêm học sinh
            return view('hocsinh.create');
        }

    public function store(Request $request)
        {
            //Them moi hoc sinh
            //Set timezone
            date_default_timezone_set("Asia/Ho_Chi_Minh");
            
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
            
            //Insert vào bảng tbl_hocsinh
            $insertData = DB::table('hocsinh')->insert($dataInsertToDatabase);
            
            //Kiểm tra Insert để trả về một thông báo
            if ($insertData) {
                Session::flash('success', 'Thêm mới học sinh thành công!');
            }else {                        
                Session::flash('error', 'Thêm thất bại!');
            }
            
            //Thực hiện chuyển trang
            return redirect('hocsinh');
        }
        public function index()
            {
                //Lấy danh sách học sinh từ database
                $getData = DB::table('hocsinh')->select('HS_MA','HS_TEN','HS_DIACHI','HS_SDT')->get();
                
                //Gọi đến file list.blade.php trong thư mục "resources/views/hocsinh" với giá trị gửi đi tên listhocsinh = $getData
                return view('hocsinh.list')->with('listhocsinh',$getData);
            }
        public function edit($HS_MA)
            {
                //Lấy dữ liệu từ Database với các trường được lấy và với điều kiện id = $id
                $getData = DB::table('hocsinh')->select('HS_MA','HS_TEN','HS_DIACHI','HS_SDT')->where('HS_MA',$HS_MA)->get();
                
                //Gọi đến file edit.blade.php trong thư mục "resources/views/hocsinh" với giá trị gửi đi tên getHocSinhById = $getData
                return view('hocsinh.edit')->with('getHocSinhById',$getData);
            }

        public function update(Request $request)
            {
            
                //Thực hiện câu lệnh update với các giá trị $request trả về
                $updateData = DB::table('hocsinh')->where('HS_MA', $request->HS_MA)->update([
                    'HS_MA' => $request->HS_MA,
                    'HS_TEN' => $request->HS_TEN,
                    'HS_DIACHI' => $request->HS_DIACHI,
                    'HS_SDT' => $request->HS_SDT,
                ]);
                
                //Kiểm tra lệnh update để trả về một thông báo
                if ($updateData) {
                    Session::flash('success', 'Sửa học sinh thành công!');
                }else {                        
                    Session::flash('error', 'Sửa thất bại!');
                }
                
                //Thực hiện chuyển trang
                return redirect('hocsinh');
            }
            public function destroy($id)
                {
                    //Xoa hoc sinh
                    //Thực hiện câu lệnh xóa với giá trị id = $id trả về
                    $deleteData = DB::table('hocsinh')->where('HS_MA', '=', $id)->delete();
                    
                    //Kiểm tra lệnh delete để trả về một thông báo
                    if ($deleteData) {
                        Session::flash('success', 'Xóa học sinh thành công!');
                    }else {                        
                        Session::flash('error', 'Xóa thất bại!');
                    }
                    
                    //Thực hiện chuyển trang
                    return redirect('hocsinh');
                }
}
