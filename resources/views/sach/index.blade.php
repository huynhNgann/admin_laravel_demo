@extends('layout_admin')
@section('header')
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-4">
            <h1 class="m-0">Sách</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <a href="{{route('sach.create')}}" class="btn btn-primary">Thêm Mới</a>

            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
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
                            <th>Mã Sách</th>
                            <th>Tên Sách</th>
                            <th>Tác Giả</th>
                            <th>Nhà Sản Xuất</th>
                            <th>Thao tác</th>

                        </tr>
                    </thead>
                    <tbody>
                      
                    @foreach ($sach as $s )
                        <tr>
                            <td>{{++$i}}</td>
                            <td>{{$s->MaSach}}</td>
                            <td>{{$s->TenSach}}</td>
                            <td>{{$s->TacGia}}</td>
                            <td>{{$s->NhaSanXuat}}</td>
                            <td>
                                <form action="{{route('sach.destroy', $s->id)}}" method="post">
                                    <a href="{{route('sach.edit', $s->id)}}" class="btn btn-info">Edit</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" href="{{route('sach.destroy', $s->id)}}"class="btn btn-danger">Xoa</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{$sach->links()}}
            
        </div>
    </div>


 
 
 
</section>
  @endsection