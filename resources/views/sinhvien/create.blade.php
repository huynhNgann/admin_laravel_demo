@extends('layout_admin')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="row">
                <div class="col-md-6">
                <h3>Them Sinh Vien</h3>
                </div>    
                <div class="col-md-6">
                    <a href="{{route('sinhvien.index')}}" class="btn btn-primary">Danh sách sinh viên</a>
                </div>

                </div>
            </div>
            <div class="card-body">
              <form action="{{route('sinhvien.store')}}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <strong>Ma SV</strong>
                            <input type="text" name="MaSV" class="form-control" placeholder="Nhap Ma SV">
                        </div>
                        <div class="form-group">
                            <strong>Ho ten</strong>
                            <input type="text" name="TenSV" class="form-control" placeholder="Nhap ten Sinh vien">
                        </div>
                        <div class="form-group">
                            <strong>Dia Chi</strong>
                            <input type="text" name="DiaChi" class="form-control" placeholder="Nhap dia chi">
                        </div>
                        <div class="form-group">
                            <strong>Dien Thoai</strong>
                            <input type="text" name="DienThoai" class="form-control" placeholder="Nhap so dt">
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-success mt-2">Lưu</button>
              </form>
            </div>
        </div>
    </div>
@endsection