@extends('layout')
@section('title','Hexashop - Product Detail Page')
@section('content')
<!-- ***** Main Banner Area Start ***** -->
<div class="page-heading" id="top">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="inner-content">
                    <h2>Single Product Page</h2>
                    <span>Awesome &amp; Creative HTML CSS layout by TemplateMo</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ***** Main Banner Area End ***** -->


<!-- ***** Product Area Starts ***** -->
<section class="section" id="product">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
            <div class="left-images">
                <img src="{{asset('assets/images/'. $product->img)}}" alt="">
            </div>
        </div>
        <div class="col-lg-4">
            <div class="right-content">
                <h4>{{ $product->name }}</h4>
                <span class="price">{{number_format($product->price,0,'.',',')}}đ</span>
                <ul class="stars">
                    <li><i class="fa fa-star"></i></li>
                    <li><i class="fa fa-star"></i></li>
                    <li><i class="fa fa-star"></i></li>
                    <li><i class="fa fa-star"></i></li>
                    <li><i class="fa fa-star"></i></li>
                </ul>
                <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod kon tempor incididunt ut labore.</span>
                <div class="quote">
                    <i class="fa fa-quote-left"></i><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiuski smod.</p>
                </div>
                <div class="quantity-content">
                    <div class="left-content">
                        <h6><span class="quote" id="totalPrice"></span>Đ</h6>
                    </div>
                    <div class="right-content">
                        <div class="quantity buttons_added">
                            <form action="{{route('cart.add')}}" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{ $product->id }}"><br>
                                <input type="hidden" name="name" value="{{ $product->name }}"><br>
                                <input type="hidden" name="price" value="{{ $product->price }}"><br>
                                <input type="hidden" name="img" value="{{$product->img }}"><br>
                                <input type="button" value="-" class="minus"><input type="number" step="1" min="1" max="10" name="quantity" value="1" title="Qty" class="input-text qty text" size="4" pattern="" inputmode=""><input type="button" value="+" class="plus">
                                <button class="main-border-button" type="submit"><i class="fa-solid fa-cart-plus"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
                {{-- <div class="total ">
                    
                </div> --}}
            </div>
        </div>
        </div>
    </div>
</section>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Lấy ra các phần tử cần thiết
        var minusButton = document.querySelector('.minus');
        var plusButton = document.querySelector('.plus');
        var quantityInput = document.querySelector('input[name="quantity"]');
        var totalPriceElement = document.querySelector('#totalPrice');

        // Xử lý sự kiện khi nhấn nút "-"
        minusButton.addEventListener('click', function() {
            var currentQuantity = parseInt(quantityInput.value);
            if (currentQuantity > 1) {
                quantityInput.value = currentQuantity - 1;
                updateTotalPrice();
            }
        });

        // Xử lý sự kiện khi nhấn nút "+"
        plusButton.addEventListener('click', function() {
            var currentQuantity = parseInt(quantityInput.value);
            var maxQuantity = parseInt(quantityInput.max);
            if (currentQuantity < maxQuantity) {
                quantityInput.value = currentQuantity + 1;
                updateTotalPrice();
            }
        });

        // Hàm cập nhật tổng tiền
        function updateTotalPrice() {
            var pricePerItem = {{ $product->price }};
            var currentQuantity = parseInt(quantityInput.value);
            var totalPrice = pricePerItem * currentQuantity;
            totalPriceElement.textContent = totalPrice.toFixed(2);
        }

        // Gọi hàm cập nhật tổng tiền khi trang được tải
        updateTotalPrice();
    });
</script>

<!-- ***** Product Area Ends ***** -->
@endsection