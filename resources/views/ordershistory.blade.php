@extends('layout')
@section('title','Lịch Sử Đặt Hàng')
@section('content')

<div class="page-heading" id="top">
    <div class="container">
        <div class="row">
            {{-- <div class="col-lg-12">
                <div class="inner-content">
                    <h2>Check Our Products</h2>
                    <span>Awesome &amp; Creative HTML CSS layout by TemplateMo</span>
                </div>
            </div> --}}
        </div>
    </div>
</div>

<section class="section" id="top">
    <div class="container">
        <div class="row">
            <div class="col card card-defaut text-center">
                <table class="table table-borderless table-hover">
                    <thead>
                        <table class="table table-borderless text-center">
                            <thead class="align-middle ">
                                <tr class="border-bottom">
                                    <th>Mã Đơn Hàng</th>
                                    <th>Người Đặt</th>
                                    <th>Người Nhận</th>
                                    <th>Số Lượng</th>
                                    <th>Tổng Tiền</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($count==0)
                                    <tr>
                                        <th><p>Lịch Sử Trống.</p></th>
                                    </tr>
                                </tbody>
                                @else
                                    @foreach ($history as $item)
                                    <tr class="border-bottom">
                                        <td>{{$item->madh}}</td>
                                        <td>{{$item->nguoidat_ten}}</td>
                                        <td>{{$item->nguoinhan_ten}}</td>
                                        <td>{{$item->total}}</td>
                                        <td>{{ number_format($item->tongthanhtoan, 0, ',', '.') }} VNĐ</td>
                                        <td><form action="{{route('orderdetail',$item->id)}}" method="post"><button type="submit">Chi Tiết</button></form></td>
                                    </tr>
                                        @endforeach
                                </tbody>
                                @endif
                          </table>
                    </thead>
                </table>
                  
            </div>
            
        </div>
    </div>
</section>
@endsection