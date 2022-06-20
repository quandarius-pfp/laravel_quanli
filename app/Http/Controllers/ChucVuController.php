<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ChucVu;

class ChucVuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $chucvu = ChucVu::orderBy('id','desc')->get();
        return view('admincp.chucvu.index')->with(compact('chucvu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admincp.chucvu.create');
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
            'chucvu' => 'required|unique:tbl_chucvu|max:255',
            'slug_chucvu' => 'required|unique:tbl_chucvu|max:255',
            'kichhoat' => 'required',
           ],
           [
            'chucvu.unique' => 'Chức Vụ Đã có , xin điền chức  khác',
            'slug_chucvu.unique' => 'SLUG chức vụ Đã có , xin điền SLUG khác',
            'chucvu.required' => 'Chức vụ Phải có',
           ]
        
        );
        $data = $request->all();
        
        $chuc  = new ChucVu();
        $chuc->chucvu = $data['chucvu'];
        $chuc->slug_chucvu = $data['slug_chucvu'];
        $chuc->kichhoat = $data['kichhoat'];
        $chuc->save();
        return redirect()->back()->with('status','Thêm Chức vụ Truyện Thành Công');
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
        $chucvu = ChucVu::find($id);
        return view('admincp.chucvu.edit')->with(compact('chucvu'));
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
            'chucvu' => 'required|max:255',
            'slug_chucvu' => 'required|max:255',
            'kichhoat' => 'required',
           ],
           [
            'chucvu.required' => 'Chức Vụ phải có',
            'slug_chucvu.required' => 'SLUG chức vụ phải có',
           
           ]
        
        );
        $data = $request->all();
        
        $chuc  = ChucVu::find($id);
        $chuc->chucvu = $data['chucvu'];
        $chuc->slug_chucvu = $data['slug_chucvu'];
        $chuc->kichhoat = $data['kichhoat'];
        $chuc->save();
        return redirect()->back()->with('status','Cập Nhật Chức vụ Truyện Thành Công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ChucVu::find($id)->delete();
        return redirect()->back()->with('status','Xóa Chức vụ  Thành Công');
    }
}
