<header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="{{route('home')}}" class="logo">
                        <img src="{{asset('assets/images/logo.png')}}">
                    </a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                        <li class="scroll-to-section"><a href="#top" class="active">Home</a></li>
                        <li class="submenu">
                            <a href="javascript:;">Pages</a>
                            <ul>
                                <li><a href="{{route('about')}}">About Us</a></li>
                                <li><a href="{{route('contact')}}">Contact Us</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:;">Danh mục</a>
                            <ul>
                                <li><a href="{{route('contact')}}">Best Sell</a></li>
                                @foreach ($category as $item)
                                    <li><a href="{{route('product',$item->id)}}">Thời Trang {{$item->name}}</a></li>
                                @endforeach
                                {{-- <li><a href="{{route('product')}}">Thời Trang Nam</a></li>
                                <li><a href="{{route('about')}}">Thời Trang Nữ</a></li>
                                <li><a href="{{route('contact')}}">Thời Trang Trẻ Em</a></li> --}}
                            </ul>
                        </li>
                        <li class="submenu">

                            <?php
                                if (isset($_SESSION['user'])) {
                                    if ($_SESSION['user']['role']==1) {
                                        echo
                                        '<a href="javascript:;"><i class="fa-solid fa-user"></i></a>
                                        <ul>
                                            <li><a href="'.route('homead').'">Trang Admin</a></li>
                                            <li><a href="'.route('logout').'">Đăng Xuất</a></li>
                                        </ul>';
                                    }else{
                                        echo
                                        '<a href="javascript:;"><i class="fa-solid fa-user"></i></a>
                                        <ul>
                                            <li><a href="'.route('profile',$_SESSION['user']['id']).'">Trang Cá Nhân</a></li>
                                            <li><a href="'.route('ordershistory',$_SESSION['user']['id']).'">Lịch Sử Đặt Hàng</a></li>
                                            <li><a href="'.route('logout').'">Đăng Xuất</a></li>
                                        </ul>';
                                    }
                                }else {
                                    echo 
                                    '<a href="javascript:;"><i class="fa-solid fa-arrow-right-to-bracket"></i></a>
                                    <ul>
                                        <li><a href="'.route('login').'">Đăng Nhập</a></li>
                                        <li><a href="'.route('register').'">Đăng Ký</a></li>
                                    </ul>';
                                }
                            ?>
                            
                        </li>
                        <li class="scroll-to-section"><a href="{{route('cart')}}">Giỏ Hàng</a></li>
                    </ul>        
                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
                    <!-- ***** Menu End ***** -->
                </nav>
            </div>
        </div>
    </div>
</header>