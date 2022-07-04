<?php

namespace App\Http\Controllers;

use App\Models\SinhVien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SinhvienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sinhvien=DB::table('sinh_viens')->orderBy('MaSV','ASC')->paginate(5);
        return view('sinhvien.index',compact('sinhvien'))->with('i',(request()->input('sinhvien',1)-1)*5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sinhvien.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        SinhVien::create($request->all());
        return redirect()->route('sinhvien.index')->with('thongbao','Them thanh cong');

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
        $sinhvien=DB::table('sinh_viens')->where('id',$id)->get();
        return view('sinhvien.edit',compact('sinhvien'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $sinhvien)
    {
        $sv=$request->all();
        $sinhvien=SinhVien::find($sinhvien);
        $sinhvien->MaSV=$sv['MaSV'];
        $sinhvien->TenSV=$sv['TenSV'];
        $sinhvien->DienThoai=$sv['DienThoai'];
        $sinhvien->DiaChi=$sv['DiaChi'];
        $sinhvien->save();
        return redirect()->route('sinhvien.index');
    

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
            $sinhvien=SinhVien::find($id);
            $sinhvien->delete();
            return redirect()->route('sinhvien.index',compact('sinhvien'))->with('success','không thể xóa');
        
    }
}
