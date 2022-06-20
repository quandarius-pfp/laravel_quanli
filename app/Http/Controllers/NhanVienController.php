<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NhanVien;
use App\Models\ChucVu;
class NhanVienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $list_chucvu = NhanVien::with('chucvunhanvien')->orderBy('id','desc')->get();
        return view('admincp.nhanvien.index')->with(compact('list_chucvu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   $chucvu = ChucVu::orderBy('id','desc')->get();
        return view('admincp.nhanvien.create')->with(compact('chucvu'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request -> validate([
            'NhanVien_name' => 'required|max:255',
            'username' => 'required|unique:tbl_nhanvien|max:255',
            'password' => 'required|min:6|max:255',
            'anhdaidien'=>'required|image|mimes:jpeg,png,jpg,gif,svg,JPG|max:2048|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000',
            'NhanVien_age' => 'required',
            'NhanVien_cmnd' => 'required|unique:tbl_nhanvien|max:255',
            'NhanVien_chucvu' => 'required',
            'NhanVien_mucluong' =>'required',
           ],
           [
            'username.unique' => 'username Đã có , xin điền tên khác',
            'NhanVien_cmnd.unique' => 'CMND đã có Đã có , xin điền SLUG khác',
            'NhanVien_name.required' => 'Tên nhân viên Phải có',
            'NhanVien_age.required' => 'tuổi Phải có',
            'NhanVien_chucvu.required' => 'chức vụ phải có',
            'NhanVien_mucluong.required' => 'mức lương truyện phải có',
            'anhdaidien.reqiured' => 'Hình ảnh nhân viên phải có',
           ]
        
        );
        $data = $request->all();
        
        $truyen = new NhanVien();
        $truyen->NhanVien_name = $data['NhanVien_name'];
        $truyen->username = $data['username'];
        $truyen->password = $data['password'];
        $truyen->NhanVien_age = $data['NhanVien_age'];
        $truyen->NhanVien_cmnd = $data['NhanVien_cmnd'];
        $truyen->NhanVien_chucvu = $data['NhanVien_chucvu'];
        $truyen->NhanVien_mucluong = $data['NhanVien_mucluong'];
        /* them hinh anh */
        $get_image = $request->anhdaidien;
        $path =   'public/public/uploads/truyen/';
        $get_name_image = $get_image->getClientOriginalName();
        $name_image = current(explode('.',$get_name_image));
        $new_image =  $name_image.rand(0,999).'.'.$get_image->getClientOriginalExtension();
        $get_image->move($path,$new_image);
        $truyen->anhdaidien = $new_image;
        $truyen->save();
        return redirect()->back()->with('status','Thêm  nhân viên Thành Công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $nhanvien = NhanVien::find($id);
        $chucvu = ChucVu::orderBy('id','desc')->get();
        return view('admincp.nhanvien.edit')->with(compact('nhanvien','chucvu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request -> validate([
            'NhanVien_name' => 'required|max:255',
            'username' => 'required|max:255',
            'password' => 'required|min:6|max:255',
            
            'NhanVien_age' => 'required',
            'NhanVien_cmnd' => 'required|max:255',
            'NhanVien_chucvu' => 'required',
            'NhanVien_mucluong' =>'required',
           ],
           [
            'username.unique' => 'username Đã có , xin điền tên khác',
            'NhanVien_cmnd.unique' => 'CMND đã có Đã có , xin điền SLUG khác',
            'NhanVien_name.required' => 'Tên nhân viên Phải có',
            'NhanVien_age.required' => 'tuổi Phải có',
            'NhanVien_chucvu.required' => 'chức vụ phải có',
            'NhanVien_mucluong.required' => 'mức lương truyện phải có',
            'anhdaidien.reqiured' => 'Hình ảnh nhân viên phải có',
           ]
        
        );
        $data = $request->all();
        
        $truyen = NhanVien::find($id);
        $truyen->NhanVien_name = $data['NhanVien_name'];
        $truyen->username = $data['username'];
        $truyen->password = $data['password'];
        $truyen->NhanVien_age = $data['NhanVien_age'];
        $truyen->NhanVien_cmnd = $data['NhanVien_cmnd'];
        $truyen->NhanVien_chucvu = $data['NhanVien_chucvu'];
        $truyen->NhanVien_mucluong = $data['NhanVien_mucluong'];
        /* them hinh anh */
        $get_image = $request->anhdaidien;
        if($get_image){
        $path =   'public/public/uploads/truyen/';
        $get_name_image = $get_image->getClientOriginalName();
        $name_image = current(explode('.',$get_name_image));
        $new_image =  $name_image.rand(0,999).'.'.$get_image->getClientOriginalExtension();
        $get_image->move($path,$new_image);
        $truyen->anhdaidien = $new_image;
        }
        $truyen->save();
        return redirect()->back()->with('status','Sửa nhân viên Thành Công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
