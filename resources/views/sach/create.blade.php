@extends('layout_admin')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="row">
                <div class="col-md-6">
                <h3>Thêm Sach</h3>
                </div>    
                <div class="col-md-6">
                    <a href="{{route('sach.index')}}" class="btn btn-primary">Danh sách sinh vien</a>
                </div>

                </div>
            </div>
            <div class="card-body">
              <form action="{{route('sach.store')}}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <strong>Mã Sách</strong>
                            <input type="text" name="MaSach" class="form-control" placeholder="Nhap Ma Sach">
                        </div>
                        <div class="form-group">
                            <strong>Tên Sách</strong>
                            <input type="text" name="TenSach" class="form-control" placeholder="Nhap Ten Sach">
                        </div>
                        <div class="form-group">
                            <strong>Tác Giả</strong>
                            <input type="text" name="TacGia" class="form-control" placeholder="Nhap dia chi">
                        </div>
                        <div class="form-group">
                            <strong>Nhà Sản Xuất</strong>
                            <input type="text" name="NhaSanXuat" class="form-control" placeholder="Nhap so dt">
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-success mt-2">Lưu</button>
              </form>
            </div>
        </div>
    </div>


@endsection