@extends('layout_admin')
@section('header')
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-4">
            <h1 class="m-0">Sửa</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <a href="{{route('sachsv.create')}}" class="btn btn-primary">Danh Sách Sinh Viên</a>

            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
@endsection
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                @foreach ($sinhvien as  $sinhvien )
                    
               
              <form action="{{route('sinhvien.update', $sinhvien->id)}}" method="post">
              {{csrf_field()}}
              {{ method_field('put') }}           
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <strong>Mã SV</strong>
                            <input type="text" value="{{$sinhvien->MaSV}}" name="MaSV" class="form-control">
                        </div>
                        <div class="form-group">
                            <strong>Họ Tên</strong>
                            <input type="text" value="{{$sinhvien->TenSV}}" name="TenSV" class="form-control">
                        </div>
                        <div class="form-group">
                            <strong>Địa Chỉ</strong>
                            <input type="text" value="{{$sinhvien->DiaChi}}" name="DiaChi" class="form-control">
                        </div>
                        <div class="form-group">
                            <strong>Điện Thoại</strong>
                            <input type="text" value="{{$sinhvien->DienThoai}}" name="DienThoai" class="form-control" >
                        </div>
                    </div>
                </div>
                <button type="submit" name="update" class="btn btn-success mt-2">Cập Nhật</button>
              </form>
              @endforeach
            </div>
        </div>
    </div>


@endsection