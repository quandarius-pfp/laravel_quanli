@extends('layouts.app')

@section('content')
@include('layouts.nav')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mt-5">
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
                              <th scope="col">Tên chức vụ</th>
                              <th scope="col">Slug chức vụ</th>
                              <th scope="col">Kích Hoạt</th>
                              <th scope="col">Quản lí</th>
                            </tr>
                          </thead>
                          <tbody>
                              @foreach($chucvu as $key => $chuc)

                            <tr>
                              <th scope="row">{{$key+1}}</th>
                              <td>{{$chuc->chucvu}}</td>
                              <td>{{$chuc->slug_chucvu}}</td>
                              <td>
                                @if($chuc->kichhoat == 1)
                                <p class="text-success">Kích Hoạt</p>
                                @else
                                <p class="text-danger">Không kích hoạt</p>
                                @endif
                              </td>
                              <td>
                                <div class="d-flex">
                                <a href="{{route('chucvu.edit',[$chuc->id])}}" class="btn btn-warning ">Edit</a>
                                  <form action="{{route('chucvu.destroy',[$chuc->id])}}" method ="POST">
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
