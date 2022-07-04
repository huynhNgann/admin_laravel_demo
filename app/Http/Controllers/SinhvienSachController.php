<?php

namespace App\Http\Controllers;
use App\Models\SinhvienSach;
use App\Models\Sinhvien;
use App\Models\Sach;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SinhvienSachController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $sinhvien_saches = DB::table('sinhvien_saches')
            ->join('sinh_viens', 'sinhvien_saches.MaSV', '=', 'sinh_viens.MaSV')
            ->join('saches', 'sinhvien_saches.MaSach', '=', 'saches.MaSach')
            ->select('sinhvien_saches.*', 'sinh_viens.TenSV', 'saches.TenSach')
            ->orderBy('NgayMuon','ASC')->get();        
        return view('sachsv.index',compact('sinhvien_saches'))->with('i',(request()->input('sachsv',1)-1)*5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      
        return view('sachsv.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        SinhvienSach::create($request->all());
        return redirect()->route('sachsv.index')->with('thongbao','Them thanh cong');

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
        $sinhvien=DB::table('sinh_viens')->where('MaSV')->get();
        $sach=DB::table('saches')->where('MaSach')->get();
        $sachsv=DB::table('sinhvien_saches')->where('id',$id)->get();
        return view('sachsv.edit',compact('sachsv'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $sachsv)
    {
        $sv=$request->all();
        $sachsv=SinhvienSach::find($sachsv);
        $sachsv->MaSach=$sv['MaSach'];
        $sachsv->MaSV=$sv['MaSV'];
        $sachsv->NgayMuon=$sv['NgayMuon'];
        $sachsv->NgayTra=$sv['NgayTra'];
        $sachsv->save();
        return redirect()->route('sachsv.index');
    

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
          
        
    }
      // $date=DB::table("sinhvien_saches");
        
       
// }
public function search(Request $request)
{
    $sinhvien_saches = DB::table('sinhvien_saches')
    ->join('sinh_viens', 'sinhvien_saches.MaSV', '=', 'sinh_viens.MaSV')
    ->join('saches', 'sinhvien_saches.MaSach', '=', 'saches.MaSach')
    ->select('sinhvien_saches.*', 'sinh_viens.TenSV', 'saches.TenSach')
    ->get();
    $fromdate = Carbon::parse($request->fromdate);
    $todate = Carbon::parse($request->todate);
    $data= SinhvienSach::whereDate('NgayMuon','<=',$todate->format('d-m-y'))
    ->whereDate('NgayMuon','>=',$fromdate->format('d-m-y'));
       return view('sachsv.index', compact('data','sinhvien_saches'))->with('i',(request()->input('sachsv',1)-1)*5);
}
}