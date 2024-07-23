@extends('layout')
@section('title','Chi Tiết Đơn Hàng')
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
                                    <th>Tên Sản Phẩm</th>
                                    <th>Số Lượng</th>
                                    <th>Tổng Tiền</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                    @foreach ($getdetail as $item)
                                    <tr class="border-bottom">
                                        <td>{{$item->name}}</td>
                                        <td>{{$item->soluong}}</td>
                                        <td>{{$item->thanhtien}}</td>
                                        <td><a href="{{route('singleproduct',$item->idpro)}}">Chi Tiết</a></td>
                                    </tr>
                                        @endforeach
                            </tbody>
                          </table>
                    </thead>
                </table>
                  
            </div>
            
        </div>
    </div>
</section>
@endsection