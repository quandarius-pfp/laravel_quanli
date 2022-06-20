@extends('layouts.app')

@section('content')
@include('layouts.nav')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-3">
                <div class="card-header">Sửa  Chức Vụ </div>
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
                    <form method="POST" action="{{route('chucvu.update',[$chucvu->id])}}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Chức Vụ</label>
                          <input type="text" class="form-control" onkeyup="ChangeToSlug();" id="slug" aria-describedby="emailHelp" name="chucvu" value="{{$chucvu->chucvu}}">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Slug Chức Vụ</label>
                            <input type="text" class="form-control" id="convert_slug" aria-describedby="emailHelp" name="slug_chucvu" value="{{$chucvu->slug_chucvu}}">
                          </div>
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Kích Hoạt Chức vụ</label>
                            <select class="form-select" aria-label="Default select example" name="kichhoat">
                                @if($chucvu->kichhoat==1)
                                <option value="1" selected>Kích Hoạt</option>
                                <option value="2">Không Kích Hoạt</option>
                                @else
                                <option value="1" >Kích Hoạt</option>
                                <option value="2" selected>Không Kích Hoạt</option>
                                @endif
                              </select>
                          </div>
                       
                        <button type="submit" class="btn btn-primary" name="them">Cập nhật</button>
                
                    
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
