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
            <a href="{{route('sachsv.index')}}" class="btn btn-primary">Danh Sách </a>

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
                @foreach ($sach as  $s )
                    
               
              <form action="{{route('sach.update', $s->id)}}" method="post">
              {{csrf_field()}}
              {{ method_field('put') }}           
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <strong>Mã Sách</strong>
                            <input type="text" value="{{$s->MaSach}}" name="MaSach" class="form-control">
                        </div>
                        <div class="form-group">
                            <strong>Tên Sách</strong>
                            <input type="text" value="{{$s->TenSach}}" name="TenSach" class="form-control">
                        </div>
                        <div class="form-group">
                            <strong>Tác Giả</strong>
                            <input type="text" value="{{$s->TacGia}}" name="TacGia" class="form-control">
                        </div>
                        <div class="form-group">
                            <strong>Nhà Sản Xuất</strong>
                            <input type="text" value="{{$s->NhaSanXuat}}" name="NhaSanXuat" class="form-control" >
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