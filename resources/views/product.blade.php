@extends('layout')
@section('title','Hexashop - Product Listing Page')
@section('content')

<!-- ***** Main Banner Area Start ***** -->
<div class="" id="top">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="inner-content">
                    <h2>Check Our Products</h2>
                    {{-- <span>Awesome &amp; Creative HTML CSS layout by TemplateMo</span> --}}
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ***** Main Banner Area End ***** -->

<!-- ***** Men Area Starts ***** -->

{{-- <section class="section" id="men">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="section-heading">
                    <h2>Men's Latest</h2>
                    <span>Details to details is what makes Hexashop different from the other themes.</span>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="men-item-carousel">
                    <div class="owl-men-item owl-carousel">
                        @foreach ($promen as $pro)
                            <div class="item">
                                <div class="thumb">
                                    <div class="hover-content">
                                        <ul>
                                            <li><a href="{{route('singleproduct', $pro->id)}}"><i class="fa fa-eye"></i></a></li>
                                            <li><a href="{{route('singleproduct', $pro->id)}}"><i class="fa fa-star"></i></a></li>
                                            <li><a href="{{route('singleproduct', $pro->id)}}"><i class="fa fa-shopping-cart"></i></a></li>
                                        </ul>
                                    </div>
                                    <img src="assets/images/{{$pro->img}}.jpg" alt="">
                                </div>
                                <div class="down-content">
                                    <h4>{{$pro->name}}</h4>
                                    <span>{{number_format($pro->price,0,'.',',')}}đ</span>
                                    <ul class="stars">
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                    </ul>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> --}}

<!-- ***** Men Area Ends ***** -->

<!-- ***** Women Area Starts ***** -->

{{-- <section class="section" id="women">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="section-heading">
                    <h2>Women's Latest</h2>
                    <span>Details to details is what makes Hexashop different from the other themes.</span>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="women-item-carousel">
                    <div class="owl-women-item owl-carousel">
                        @foreach ($prowomen as $pro1)
                            <div class="item">
                                <div class="thumb">
                                    <div class="hover-content">
                                        <ul>
                                            <li><a href="{{route('singleproduct', $pro1->id)}}"><i class="fa fa-eye"></i></a></li>
                                            <li><a href="{{route('singleproduct', $pro1->id)}}"><i class="fa fa-star"></i></a></li>
                                            <li><a href="{{route('singleproduct', $pro1->id)}}"><i class="fa fa-shopping-cart"></i></a></li>
                                        </ul>
                                    </div>
                                    <img src="assets/images/{{$pro1->img}}.jpg" alt="">
                                </div>
                                <div class="down-content">
                                    <h4>{{$pro1->name}}</h4>
                                    <span>{{number_format($pro1->price,0,'.',',')}}đ</span>
                                    <ul class="stars">
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                    </ul>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> --}}

<!-- ***** Women Area Ends ***** -->

<!-- ***** Kids Area Starts ***** -->

{{-- <section class="section" id="kids">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="section-heading">
                    <h2>Kid's Latest</h2>
                    <span>Details to details is what makes Hexashop different from the other themes.</span>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="kid-item-carousel">
                    <div class="owl-kid-item owl-carousel">
                        @foreach ($prokid as $pro2)
                            <div class="item">
                                <div class="thumb">
                                    <div class="hover-content">
                                        <ul>
                                            <li><a href="{{route('singleproduct', $pro2->id)}}"><i class="fa fa-eye"></i></a></li>
                                            <li><a href="{{route('singleproduct', $pro2->id)}}"><i class="fa fa-star"></i></a></li>
                                            <li><a href="{{route('singleproduct', $pro2->id)}}"><i class="fa fa-shopping-cart"></i></a></li>
                                        </ul>
                                    </div>
                                    <img src="assets/images/{{$pro2->img}}.jpg" alt="">
                                </div>
                                <div class="down-content">
                                    <h4>{{$pro2->name}}</h4>
                                    <span>{{number_format($pro2->price,0,'.',',')}}đ</span>
                                    <ul class="stars">
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                    </ul>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> --}}

<!-- ***** Kids Area Ends ***** -->

<!-- ***** Products Area Starts ***** -->

<section class="section" id="products">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-heading">
                    <h2>Our Latest Products</h2>
                    <span>Check out all of our products.</span>
                </div>
            </div>
            <form action="{{route('search',$categorys->id)}}" method="GET">
                <input class="form-control" type="text" name="search" placeholder="Tìm kiếm sản phẩm..." value="{{ request('search') }}">
                <button type="submit" hidden>Tìm kiếm</button><br>
            </form>
        </div>
    </div>
    <div class="container">
        <div class="row">
            @foreach ($pro as $pros)
                <div class="col-lg-4">
                            <div class="item">
                                <div class="thumb">
                                    <div class="hover-content">
                                        <ul>
                                            <li><a href="{{route('singleproduct',$pros->id)}}"><i class="fa fa-eye"></i></a></li>
                                            <li><a href="{{route('singleproduct',$pros->id)}}"><i class="fa fa-star"></i></a></li>
                                            <li><a href="{{route('singleproduct',$pros->id)}}"><i class="fa fa-shopping-cart"></i></a></li>
                                        </ul>
                                    </div>
                                    <img src="{{asset('assets/images/'.$pros->img)}}" alt="">
                                </div>
                                <div class="down-content">
                                    <h4>{{$pros->name}}</h4>
                                    <span>{{number_format($pros->price,0,'.',',')}}đ</span>
                                    <ul class="stars">
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endforeach
            <div class="col-lg-12">
                <div class="pagination">
                    <ul>
                        {{$pro ->appends(['query'=> $kyw]) ->links('pagination::default')}}
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ***** Products Area Ends ***** -->
@endsection