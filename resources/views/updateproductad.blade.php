@extends('layoutad')
@section('title','TRANG UPDATE SẢN PHẨM')

@section('contentad')
<section>
    <div class="container2">
        <section>
            <form action="{{route('productadupdate')}}" method="POST" enctype="multipart/form-data">
                <label for="product_name">Tên sản phẩm:</label><br>
                <input type="text" id="name" value="{{$product->name}}" name="name"><br>
                
                <label for="product_name">Danh mục sản phẩm:</label><br>
                <select name="Categories_id" id="Categories_id">
                    @foreach ($cata as $category)
                        @if ($category->id==$product->Categories_id)
                            <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                            @else
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endif
                    @endforeach
                </select><br>

                <label for="product_price">Giá:</label><br>
                <input type="text" id="price" value="{{$product->price}}" name="price"><br>
                
                <label for="img">Hình ảnh:</label><br>
                <img src="{{asset('uploads/'.$product->img)}}" alt="">
                <input type="file" id="img"  name="img"><br>
                <input type="hidden" name="id" value="{{$product->id}}">
                <input type="submit" value="Cập nhật">
                @csrf
            </form>
        </section>
    </div>
</section>
@endsection