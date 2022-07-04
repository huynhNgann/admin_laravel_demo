@extends('layout_admin')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="row">
                <div class="col-md-6">
                <h3>Them Sach</h3>
                </div>    
                <div class="col-md-6">
                    <a href="{{route('sachsv.index')}}" class="btn btn-primary">Danh sach sinh vien</a>
                </div>

                </div>
            </div>
            <div class="card-body">
              <form action="{{route('sachsv.store')}}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <strong>Ma Sach</strong>
                            <input type="text" name="MaSach" class="form-control" placeholder="Nhap Ma Sach">
                        </div>
                        <div class="form-group">
                            <strong>Ma SV</strong>
                            <input type="text" name="MaSV" class="form-control" placeholder="Nhap Ten Sach">
                        </div>
                        <div class="form-group">
                            <strong>NgayMuon</strong>
                            <input type="date" name="NgayMuon" class="form-control" placeholder="Nhap dia chi">
                        </div>
                        <div class="form-group">
                            <strong>NgayTra</strong>
                            <input type="date" name="NgayTra" class="form-control" placeholder="Nhap so dt">
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-success mt-2">Lưu</button>
              </form>
            </div>
        </div>
    </div>


@endsection