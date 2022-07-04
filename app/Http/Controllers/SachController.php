<?php

namespace App\Http\Controllers;

use App\Models\Sach;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SachController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sach=DB::table('saches')->orderBy('MaSach','ASC')->paginate(5);
        return view('sach.index',compact('sach'))->with('i',(request()->input('sach',1)-1)*5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sach.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Sach::create($request->all());
        return redirect()->route('sach.index')->with('thongbao','Them thanh cong');

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
        $sach=DB::table('saches')->where('id',$id)->get();
        return view('sach.edit',compact('sach'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $sach)
    {
        $s=$request->all();
        $sach=Sach::find($sach);
        $sach->MaSach=$s['MaSach'];
        $sach->TenSach=$s['TenSach'];
        $sach->TacGia=$s['TacGia'];
        $sach->NhaSanXuat=$s['NhaSanXuat'];
        $sach->save();
        return redirect()->route('sach.index');
    

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
            $sach=Sach::find($id);
            $sach->delete();
            return redirect()->route('sach.index',compact('sach'))->with('success','không thể xóa');
        
    }
}
