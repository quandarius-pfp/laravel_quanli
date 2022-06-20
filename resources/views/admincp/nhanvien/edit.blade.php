@extends('layouts.app')

@section('content')
@include('layouts.nav')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-3">
                <div class="card-header">Sửa  nhân viên </div>
                @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="POST" action="{{route('nhanvien.update',[$nhanvien->id])}}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Tên Nhân Viên</label>
                          <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="NhanVien_name" value="{{$nhanvien->NhanVien_name}}">
                        </div>
                        <div class="mb-3">
                          <label for="exampleInputPassword1" class="form-label">Username</label>
                          <input type="text" class="form-control" id="exampleInputPassword1" name="username" value="{{$nhanvien->username}}">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input type="text" class="form-control" id="exampleInputPassword1" name="password" value="{{$nhanvien->password}}">
                        </div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Chọn ảnh nhân viên</label>
                            <input class="form-control" type="file" id="formFile" name="anhdaidien" >
                        </div>
                        <img src="{{asset('public/public/uploads/truyen/'.$nhanvien->anhdaidien)}}" alt="" width="200" height="150" style="object-fit: cover;">
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Tuổi nhân viên</label>
                            <input type="text" class="form-control" id="exampleInputPassword1" name="NhanVien_age" value="{{$nhanvien->NhanVien_age}}">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Chức Vụ</label>
                            <select class="form-select" aria-label="Default select example" name="NhanVien_chucvu">
                                
                                @foreach($chucvu as $key => $muc2)
                                <option {{$muc2->id==$nhanvien->NhanVien_chucvu ? 'selected' : ''}} value="{{$muc2->id}}">{{$muc2->chucvu}}</option>
                                @endforeach
                                
                              </select>
                        </div>
                        
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">CMND</label>
                            <input type="text" class="form-control" id="exampleInputPassword1" name="NhanVien_cmnd" value="{{$nhanvien->NhanVien_cmnd}}">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Mức lương</label>
                            <input type="text" class="form-control" id="exampleInputPassword1" name="NhanVien_mucluong" value="{{$nhanvien->NhanVien_mucluong}}">
                        </div>
                        <button type="submit" class="btn btn-primary" name="them">Sửa</button>
                
                    
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
