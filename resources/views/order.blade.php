@extends('layout')
@section('title','Thanh Toán')
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
            <div class="col-8 card card-defaut text-center">
                <table class="table table-borderless table-hover">
                    <thead>
                        <table class="table table-borderless text-center">
                            <thead class="align-middle ">
                                <tr class="border-bottom">
                                    <th>Tên Sản Phẩm</th>
                                    <th>Giá</th>
                                    <th>Số Lượng</th>
                                    <th>Thành Tiền</th>
                                </tr>
                            </thead>
                            <tbody>
                                    @foreach ($cartCollection as $item)
                                    <tr class="border-bottom">
                                        <td>{{$item->name}}</td>
                                        <td>{{number_format($item->price, 0, ',', '.')}} VND</td>
                                        <td class="quantity buttons_added">
                                            <span class="quantity">{{ $item->quantity }}</span>
                                        </td>
                                        <td>{{ number_format($item->getPriceSum(), 0, ',', '.') }} VND</td>
                                    </tr>
                                    @endforeach
                            </tbody>
                          </table>
                    </thead>
                </table>
                  
            </div>
            
            <div class="col-4 card card-defaut text-center">
                @if (isset($_SESSION['user']))
                    <form action="{{route('orderadd')}}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="nguoidat_ten" class="form-label">Tên người đặt</label>
                            <input type="text" class="form-control" id="nguoidat_ten" name="nguoidat_ten" value="<?php echo $_SESSION['user']['name'] ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="nguoidat_email" class="form-label">Email người đặt</label>
                            <input type="tel" class="form-control" id="nguoidat_email" name="nguoidat_email" value="<?php echo $_SESSION['user']['email'] ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="nguoinhan_ten" class="form-label">Tên người nhận</label>
                            <input type="text" class="form-control" id="nguoinhan_ten" name="nguoinhan_ten" required>
                        </div>
                        <div class="mb-3">
                            <label for="nguoinhan_tel" class="form-label">Số điện thoại người nhận</label>
                            <input type="tel" class="form-control" id="nguoinhan_tel" name="nguoinhan_tel" required>
                        </div>
                        <div class="mb-3">
                            <label for="nguoinhan_diachi" class="form-label">Địa chỉ người nhận</label>
                            <textarea class="form-control" id="nguoinhan_diachi" name="nguoinhan_diachi" rows="3" required></textarea>
                        </div>
                        <input type="hidden" name="madh" value="HX<?php echo rand(1000,9999)?>">
                        <input type="hidden" name="total" value="{{$totalQuantity}}">
                        <input type="hidden" name="tongthanhtoan" value="{{$total}}">
                        <input type="hidden" name="user_id" value="<?php echo $_SESSION['user']['id'] ?>">
                        <button type="submit" class="btn btn-primary">Thanh toán</button>
                    </form>
                @else
                    <form action="" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="nguoidat_ten" class="form-label">Tên người đặt</label>
                            <input type="text" class="form-control" id="nguoidat_ten" name="nguoidat_ten" required>
                        </div>
                        <div class="mb-3">
                            <label for="nguoidat_email" class="form-label">Email người đặt</label>
                            <input type="tel" class="form-control" id="nguoidat_email" name="nguoidat_email" required>
                        </div>
                        <div class="mb-3">
                            <label for="nguoinhan_ten" class="form-label">Tên người nhận</label>
                            <input type="text" class="form-control" id="nguoinhan_ten" name="nguoinhan_ten" required>
                        </div>
                        <div class="mb-3">
                            <label for="nguoinhan_tel" class="form-label">Số điện thoại người nhận</label>
                            <input type="tel" class="form-control" id="nguoinhan_tel" name="nguoinhan_tel" required>
                        </div>
                        <div class="mb-3">
                            <label for="nguoinhan_diachi" class="form-label">Địa chỉ người nhận</label>
                            <textarea class="form-control" id="nguoinhan_diachi" name="nguoinhan_diachi" rows="3" required></textarea>
                        </div>
                        <input type="hidden" name="madh" value="AS<?php echo rand(1000,9999)?>">
                        <input type="hidden" name="total" value="{{$totalQuantity}}">
                        <input type="hidden" name="tongthanhtoan" value="{{$total}}">
                        <button type="submit" class="btn btn-primary">Thanh toán</button>
                    </form>
                @endif
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