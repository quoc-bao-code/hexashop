@extends('layout')
@section('title','TRANG ĐĂNG NHẬP')
@section('content')
<section class="main-banner">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <form action="{{route('userlogin')}}" method="POST">
                  @csrf
                    <div class="mb-3">
                      <label for="exampleInputEmail1"  class="form-label">Email</label>
                      <input type="email" class="form-control" name="email" id="exampleInputEmail1">
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Password</label>
                      <input type="password" class="form-control" name="pass" id="exampleInputPassword1">
                    </div>
                    <button type="submit" class="btn btn-primary">Đăng Nhập</button>
                  </form>
            </div>
        </div>
    </div>
</section>
@endsection
