@extends('layoutad')
@section('title','TRANG QUẢN LÝ USERS')

@section('contentad')
@php
    use App\Models\Users;
    $users = Users::all();
@endphp
<section>
    <div class="container">
        <div class="col3">
            <h2>Thêm Mới</h2>
            <form action="{{route('usersadd')}}" method="POST">
                @csrf
                <input type="text" name="name" placeholder="Họ Tên">
                <input type="text" name="email" placeholder="Email">
                <input type="text" name="password" placeholder="Mật Khẩu">
                <select name="role">
                    <option value="1">Admin</option>
                    <option value="0">User</option>
                </select>
                <input type="submit" value="Thêm">
            </form>
        </div>
        <div class="col9">
            <h2>Danh Sách</h2>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên</th>
                        <th>Email</th>
                        <th>Quyền</th>
                        <th>Thao tác</th> <!-- Thêm cột mới -->
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $users)
                        <tr>
                        <td>{{$users->id}}</td>
                        <td>{{$users->name}}</td>
                        <td>{{$users->email}}</td>
                        <td>@php
                            if ($users->role==1) {
                                echo 'Admin';
                            }else{
                                echo 'User';
                            }
                        @endphp</td>
                        <td class="action-icons">
                            <a href="{{route('userupdateform',$users->id)}}"><i class="fas fa-edit"></i></a>
                            <a href="#"><i class="fas fa-trash-alt"></i></a>
                        </td>
                    </tr>
                    @endforeach
                    
                    <!-- Các hàng khác -->
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection