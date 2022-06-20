@extends('layouts.app')

@section('content')
@include('layouts.nav')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-3">
                <div class="card-header">Thêm  Phòng</div>
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
                    <form method="POST" action="{{route('nhanvien.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Mã Phòng</label>
                          <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="maPhong">
                        </div>
                        <div class="mb-3">
                          <label for="exampleInputPassword1" class="form-label">Vị trí</label>
                          <input type="text" class="form-control" id="exampleInputPassword1" name="vị trí">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Công Dụng</label>
                            <textarea class="form-control" id="exampleInputPassword1" name="congdung"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Loại Phòng</label>
                            <select class="form-select" aria-label="Default select example" name="loaiphong">
                                <option value="1">Phòng nghỉ  thường ( đơn ) </option>
                                <option value="2">Phòng nghỉ thường ( đôi ) </option>
                                <option value="3">Phòng nghỉ  VIP ( đơn ) </option>
                                <option value="4">Phòng nghỉ  VIP ( đôi ) </option>
                                <option value="5">Phòng nghỉ tổng thống </option>
                                <option value="6">Phòng bếp </option>
                                <option value="7">Phòng sảnh </option>
                                <option value="8">Phòng tiếp  khách </option>
                                <option value="9">Phòng làm việc  </option>
                                <option value="10">Phòng họp </option>
                                <option value="11">Phòng nghỉ nhân viên </option>
                                <option value="12">Phòng nghỉ bảo vệ </option>
                                <option value="13">Phòng ăn chung </option>
                                <option value="14">Phòng ăn riêng</option>
                                <option value="15">Phòng ăn nhân viên </option>
                                <option value="16">Phòng kĩ thuật</option>
                                <option value="17">Phòng kho</option>
                                <option value="18">Phòng y tế</option>

                                
                              </select>
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Tình trạng</label>
                            <select class="form-select" aria-label="Default select example" name="tinhtrang">
                                <option value="1">Sử Dụng Được </option>
                                <option value="2">Không sử dụng được</option>
                              </select>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Giá tiền </label>
                            <input type="text" class="form-control" id="exampleInputPassword1" name="giatien">
                        </div>
                        
                        <button type="submit" class="btn btn-primary" name="them">Thêm</button>
                
                    
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
