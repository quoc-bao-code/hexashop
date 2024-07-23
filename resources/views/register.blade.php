@extends('layout')
@section('title','TRANG ĐĂNG KÝ')
@section('content')
<section class="main-banner">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <form action="{{route('userregister')}}" method="POST">
                  @csrf
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Họ Tên</label>
                      <input type="text" name="name" class="form-control" id="">
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Email</label>
                      <input type="email" name="email" class="form-control" id="exampleInputEmail1">
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Password</label>
                      <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                    </div>
                    <button type="submit" class="btn btn-primary">Đăng Ký</button>
                  </form>
            </div>
        </div>
    </div>
</section>
@endsection
