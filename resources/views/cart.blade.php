@extends('layout')
@section('title','Giỏ Hàng')
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
                                    <th>Giá</th>
                                    <th>Số Lượng</th>
                                    <th>Thành Tiền</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (Cart::isEmpty())
                                    <tr>
                                        <th><p>Giỏ hàng trống.</p></th>
                                    </tr>
                                </tbody>
                                @else
                                    @foreach ($cartCollection as $item)
                                    <tr class="border-bottom">
                                        <td>{{$item->name}}</td>
                                        <td>{{number_format($item->price, 0, ',', '.')}} VND</td>
                                        <td class="quantity buttons_added">
                                            <form action="{{ route('cart.decrease', $item->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                <button type="submit">-</button>
                                            </form>
                                            <span class="quantity">{{ $item->quantity }}</span>
                                            <form action="{{ route('cart.increase', $item->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                <button type="submit">+</button>
                                            </form>
                                        </td>
                                        <td>{{ number_format($item->getPriceSum(), 0, ',', '.') }} VND</td>
                                        <td>
                                            <form action="{{ route('cart.remove') }}" method="post">
                                                @csrf
                                                <input type="hidden" name="id" value="{{$item->id}}">
                                                <button class="main-border-button"><i class="fa-solid fa-trash-can"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                        <input type="hidden" name="madh" value="{{$item->madh}}">
                                        @endforeach
                                </tbody>
                                    <tfoot class="align-middle">
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <?php $madh = 'HX'.rand(1000,9999) ?>
                                                <form action="{{route('orderform')}}" method="post">
                                                    <button type="submit">thanh toán</button>
                                                </form>
                                            </td>
                                    </tr>
                                </tfoot>
                                @endif
                          </table>
                    </thead>
                </table>
                  
            </div>
            
        </div>
    </div>
</section>
<script>
    document.querySelectorAll('.update-cart').forEach(button => {
            button.addEventListener('click', function () {
                const id = this.getAttribute('data-id');
                const quantity = this.getAttribute('data-quantity');

                if (quantity <= 0) {
                    alert('Số lượng phải lớn hơn 0');
                    return;
                }

                fetch('{{ route("cart.update") }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({ id: id, quantity: quantity })
                })
                .then(response => response.json())
                .then(data => {
                    const itemRow = document.getElementById(`item-${id}`);
                    itemRow.querySelector('.quantity').innerText = data.item.quantity;
                    itemRow.querySelector('.item-total').innerText = new Intl.NumberFormat('vi-VN').format(data.item.quantity * data.item.price) + ' VND';
                    document.getElementById('totalQuantity').innerText = data.totalQuantity;
                    document.getElementById('total').innerText = new Intl.NumberFormat('vi-VN').format(data.total) + ' VND';
                })
                .catch(error => console.error('Error:', error));
            });
        });
</script>
@endsection