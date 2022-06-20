@extends('layouts.app')

@section('content')
@include('layouts.nav')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-3">
                <div class="card-header">Thêm  Chức Vụ </div>
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
                    <form method="POST" action="{{route('chucvu.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Chức Vụ</label>
                          <input type="text" class="form-control" onkeyup="ChangeToSlug();" id="slug" aria-describedby="emailHelp" name="chucvu">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Slug Chức Vụ</label>
                            <input type="text" class="form-control" id="convert_slug" aria-describedby="emailHelp" name="slug_chucvu" >
                          </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Kích Hoạt danh mục</label>
                            <select class="form-select" aria-label="Default select example" name="kichhoat">
                             
                                <option value="1">Kích Hoạt</option>
                                <option value="2">Không Kích Hoạt</option>
                        
                              </select>
                          </div>
                       
                        <button type="submit" class="btn btn-primary" name="them">Thêm</button>
                
                    
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
