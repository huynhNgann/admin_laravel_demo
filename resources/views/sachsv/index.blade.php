@extends('layout_admin')

@section('header')
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-4">
            <h1 class="m-0">Danh Sách Sinh Viên Mượn Sách</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <a href="{{route('sachsv.create')}}" class="btn btn-primary">Thêm Mới</a>

            </ol>
          </div><!-- /.col -->
        </div>
        <form action="{{route('sachsv.search')}}">
            @csrf
        <div class="row mb-2">
            <div class="col-sm-4">
                <label for="date" class="col-form-label" >From: </label>
                <input type="date" class="form-control input-sm" name="date" id="fromdate" required>
            </div>
        </div>
        <div class="row mb-2">
            <div class="col-sm-4">
                <label for="">To:   </label>
                <input type="date" class="form-control input-sm" name="date" id="todate" required>
            </div>
        </div>
        <div class="row mb-2">
            <button type="submit" class="btn btn-primary">Search</button>
        </div>
        </form>
       <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
@endsection
@section('content')
<section class="content">
<div class="container">
        <div class="row">
            <div class="card-body">
                @if(Session::has('thongbao'))
                    <div class="alert alert-success">
                        {{Session::get('thongbao')}}
                    </div>
                    @endif     
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên Sinh Viên</th>
                            <th>Tên Sách</th>
                            <th>Ngày Mượn</th>
                            <th>Ngày Trả</th>
                            <th>Thao tác</th>

                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($sinhvien_saches as $sv )
                        <tr>
                            <td>{{++$i}}</td>
                            <td>{{$sv->TenSV}}</td>
                            <td>{{$sv->TenSach}}</td>
                            <td>{{$sv->NgayMuon}}</td>
                            <td>{{$sv->NgayTra}}</td>
                            <td>
                                <form action="{{route('sachsv.destroy', $sv->id)}}" method="post">
                                    <a href="{{route('sachsv.edit', $sv->id)}}" class="btn btn-info">Edit</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" href="{{route('sachsv.destroy', $sv->id)}}"class="btn btn-danger">Xoa</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>   
        </div>
    </div>


 
 
 
</section>
  @endsection