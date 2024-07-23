@extends('layout')
@section('title','Hexashop - Profile')
@section('content')
<!-- ***** Main Banner Area Start ***** -->
<div class="page-heading about-page-heading" id="top">
  <div class="container">
      <div class="row">
          {{-- <div class="col-lg-12">
              <div class="inner-content">
                  <h2>Contact Us</h2>
                  <span>Awesome, clean &amp; creative HTML5 Template</span>
              </div> --}}
          </div>
      </div>
  </div>
</div>
<!-- ***** Main Banner Area End ***** -->

<!-- ***** Contact Area Starts ***** -->
<div class="contact-us">
  <div class="container">
      <div class="row">
          <div class="col-lg-3">
            <div class="section-heading">
              <h3>{{$user->name}}</h3>
            </div>
            <div class="row">
              <div class="col-lg-12">
                  <a href=""><i class="fa-solid fa-bars"></i> Danh Sách Yêu Thích</a>
              </div>
              <div class="col-lg-12">
                <a href=""><i class="fa-solid fa-cart-shopping"></i> Giỏ Hàng</a>
              </div>
              <div class="col-lg-12">
                <a href=""><i class="fa-solid fa-truck-fast"></i> Trạng Thái Đơn Hàng</a>
              </div>
            </div>
          </div>
          <div class="col-lg-9">
              <div class="section-heading">
                <h4>Chỉnh Sửa Thông Tin.</h4>
              </div>
              <form id="" action="{{route('userupdateprofile')}}" method="post">
                @csrf
                  <div class="row">
                    <div class="col-lg-6">
                      <fieldset>
                        <label for="name">Họ Tên</label>
                        <input name="name" type="text" id="name" value="{{$user->name}}">
                      </fieldset>
                    </div>
                    <div class="col-lg-6">
                      <fieldset>
                        <label for="name">Email</label>
                        <input name="email" type="text" id="email" value="{{$user->email}}">
                      </fieldset>
                    </div>
                    <div class="col-lg-6">
                      <fieldset>
                        <label for="name">Mật Khẩu</label>
                        <input name="password" type="text" id="password" value="{{$user->password}}">
                      </fieldset>
                    </div>
                    <div class="col-lg-6">
                      <fieldset>
                        <label for="name">Số Điện Thoại</label>
                        <input name="dienthoai" type="text" id="dienthoai" value="{{$user->dienthoai}}">
                      </fieldset>
                    </div>
                    <div class="col-lg-6">
                      <fieldset>
                        <label for="name">Địa Chỉ</label>
                        <input name="diachi" type="text" id="diachi" value="{{$user->diachi}}">
                        <input type="hidden" name="id" value="{{$user->id}}">
                      </fieldset>
                    </div>
                    <div class="col-lg-12">
                      <fieldset>
                        <button type="submit" id="form-submit" class="main-dark-button"><i class="fa fa-paper-plane"></i></button>
                    </div>
                  </div>
                </form>
          </div>
      </div>
  </div>
</div>
<!-- ***** Contact Area Ends ***** -->
@endsection