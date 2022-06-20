@extends('layouts.app')

@section('content')
@include('layouts.nav')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md mt-5">
            <div class="card ">
                <div class="card-header">Liệt kê các chức vụ</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                      <table class="table table-dark  table-striped">
                        <thead>
                            <tr>
                              <th scope="col">#</th>
                              <th scope="col">Tên Nhân viên</th>
                              <th scope="col">username</th>
                              <th scope="col">password</th>
                              <th scope="col">ảnh đại diện</th>
                              <th scope="col">tuổi</th>
                              <th scope="col">cmnd</th>
                              <th scope="col">chức vụ</th>
                              <th scope="col">mức lương</th>
                              <th scope="col">Quản lí</th>
                            </tr>
                          </thead>
                          <tbody>
                              @foreach($list_chucvu as $key => $list)

                            <tr>
                              <th scope="row">{{$key+1}}</th>
                              <td>{{$list->NhanVien_name}}</td>
                              <td>{{$list->username}}</td>
                              <td>{{$list->password}}</td>
                              <td>
                                <img src="{{asset('public/public/uploads/truyen/'.$list->anhdaidien)}}" alt="" width="200" height="150" style="object-fit: cover;">
                              </td>
                              <td>{{$list->NhanVien_age}}</td>
                              <td>{{$list->NhanVien_cmnd}}</td>
                              <td>{{$list->chucvunhanvien->chucvu}}</td>
                              <td>{{$list->NhanVien_mucluong}} tr/tháng</td>
                              <td>
                                <div class="d-flex">
                                <a href="{{route('nhanvien.edit',[$list->id])}}" class="btn btn-warning ">Edit</a>
                                  <form action="{{route('nhanvien.destroy',[$list->id])}}" method ="POST">
                                  @method('DELETE')
                                    @csrf
                                    <button class="btn btn-danger ms-2" onclick="return confirm('Bạn muốn xóa danh mục này hay không')">Delete</button>
                                </form></div>
                              </td>
                            </tr>
                            @endforeach
                            
                            
                          </tbody>
                      </table>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
