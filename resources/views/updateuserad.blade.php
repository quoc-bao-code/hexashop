@extends('layoutad')
@section('title','TRANG UPDATE SẢN PHẨM')

@section('contentad')
<section>
    <div class="container2">
        <section>
            <form action="{{route('userupdate')}}" method="POST">
                <label for="product_name">Họ Tên:</label><br>
                <input type="text" id="name" value="{{$user->name}}" name="name"><br>
                
                <label for="product_name">Email:</label><br>
                <input type="text" name="email" value="{{$user->email}}"><br>
                
                <label for="img">Quyền:</label><br>
                <select name="role">
                    @php
                        if ($user->role==1) {
                            echo '
                            <option value="1" selected >Admin</option>
                            <option value="0">User</option>';
                        }else{
                            echo '
                            <option value="1">Admin</option>
                            <option value="0" selected >User</option>';}
                    @endphp
                </select>
                <input type="hidden" name="id" value="{{$user->id}}">
                <input type="submit" value="Cập nhật">
                @csrf
            </form>
        </section>
    </div>
</section>
@endsection