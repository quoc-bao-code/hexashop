@extends('layoutad')
@section('title','TRANG QUẢN LÝ SẢN PHẨM')

@section('contentad')
<section>
    <div class="container">
        <div class="col3">
            <h2>Thêm Mới Sản Phẩm</h2>
            <form method="POST" enctype="multipart/form-data">
                @csrf
                <input type="text" name="name" placeholder="Tên sản phẩm">
                <input type="text" name="price" placeholder="Giá">
                <select name="Categories_id" id="Categories_id">
                    @foreach ($cata as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                <input type="file" name="img"> <!-- Thêm trường nhập hình ảnh -->
                <input type="submit" value="Thêm">
            </form>
        </div>
        <div class="col9">
            <h2>Danh Sách Sản Phẩm</h2>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Hình ảnh</th>
                        <th>Tên Sản Phẩm</th>
                        <th>Giá</th>
                        <th>Lượt xem</th>
                        <th>Lượt bán</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pro as $pro)
                        <tr>
                            <td>{{$pro->id}}</td>
                            <td><img src="{{asset('uploads/'.$pro->img)}}" alt=""></td>
                            <td>{{$pro->name}}</td>
                            <td>{{$pro->price}}vnđ</td>
                            <td>{{$pro->view}}</td>
                            <td>{{$pro->bestseller}}</td>
                            <td class="action-icons">
                                <a href="{{route('productadupdateform',$pro->id)}}"><i class="fas fa-edit"></i></a>
                                <a href="{{route('productaddel',$pro->id)}}"><i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    <!-- Các hàng khác -->
                </tbody>
            </table>
            {{-- <div class="pagination">
                <ul>
                    {{$pro ->appends(['query'=> $kyw]) ->links('pagination::default')}}
                </ul>
            </div> --}}
        </div>
    </div>
</section>
@endsection