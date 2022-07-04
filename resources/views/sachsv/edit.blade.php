@extends('layout_admin')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="row">
                <div class="col-md-6">
                <h3>Edit Sach</h3>
                </div>    
                <div class="col-md-6">
                    <a href="{{route('sachsv.index')}}" class="btn btn-primary">Danh sach sach</a>
                </div>

                </div>
            </div>
            <div class="card-body">
                @foreach ($sachsv as  $s )
                    
               
              <form action="{{route('sachsv.update', $s->id)}}" method="post">
              {{csrf_field()}}
              {{ method_field('put') }}           
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <strong>Ma Sach</strong>
                            <input type="text" value="{{$s->MaSach}}" name="MaSach" class="form-control">
                        </div>
                        <div class="form-group">
                            <strong>Ma SV</strong>
                            <input type="text" value="{{$s->MaSV}}" name="MaSV" class="form-control">
                        </div>
                        <div class="form-group">
                            <strong>Ngay Muon</strong>
                            <input type="date" value="{{$s->NgayMuon}}" name="NgayMuon" class="form-control">
                        </div>
                        <div class="form-group">
                            <strong>Ngay Tra</strong>
                            <input type="date" value="{{$s->NgayTra}}" name="NgayTra" class="form-control" >
                        </div>
                    </div>
                </div>
                <button type="submit" name="update" class="btn btn-success mt-2">Update</button>
              </form>
              @endforeach
            </div>
        </div>
    </div>
@endsection