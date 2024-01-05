<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QBooks</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{asset('public/frontend/css/home.css')}}">
    <link rel="icon" type="images/png" href="{{asset('public/frontend/images/book-icon.png')}}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>

<body>
    <div class="contain">
        <div class="contain-navbar">
            <div class="header">
                <video autoplay loop muted plays-inline class="bg-video">
                    <source src="{{ 'public/frontend/images/book.mp4' }}" type="video/mp4">
                </video>

                <nav class="navbar">

                    <input type="checkbox" id="check">
                    <label for="check" class="icon-toggle">
                        <i class="fa-solid fa-bars" id="menu-icon"></i>
                        <i class="fa-solid fa-xmark" id="close-icon"></i>
                    </label>

                    <ul class="navbar-navv">
                        <li><a href="{{URL::to('/trang-chu') }}" id="nav-link" style="color: rgb(238, 232, 170);">Trang chủ</a></li>
                        <li><a href="{{URL::to('/danh-muc-san-pham/1') }}" id="nav-link">Thể loại</a>
                            <ul class="sub-menu">
                                @foreach($category as $key => $cate)
                                <li>
                                    <a href="{{ URL::to('/danh-muc-san-pham/'.$cate->id) }}" id="nav-link-menu">{{ $cate->category_name }}</a>
                                </li>
                                @endforeach
                            </ul>
                        </li>
                        <li><a href="{{URL::to('/lien-he') }}" id="nav-link">Liên hệ</a></li>
                        <li><a href="{{ URL::to('/login-checkout') }}" class="infor" id="nav-link">Đăng Nhập</a></li>
                        <li><a href="{{URL::to('/show-cart') }}" class="infor" id="nav-link">Giỏ Hàng</a></li>
                    </ul>
                    <div class="search_box">
                        <form action="{{ URL::to('/tim-kiem') }}" autocomplete="off" method="POST">
                            {{ csrf_field() }}
                            <input type="text" name="keywords_submit" id="keywords" placeholder="Hội sách 2023 trở lại!" />
                            
                            <button name="search_items" type="submit" id="eye"><i class="fa-solid fa-magnifying-glass"></i></button>
                            <div id="search_ajax" style="position: relative;">
                            </div>
                        </form>
                    </div>

                    <div class="icon-nav">
                        <div class="ico-nav">
                            <?php
                                $customer_id = Session::get('customer_id');
                                if($customer_id!=NULL){
                            ?>
                            <div class="ico-user">
                                <a href="{{ URL::to('/logout-checkout') }}">
                                    <i class="fa-solid fa-right-from-bracket" id="icon"></i> Đăng xuất
                                </a>
                            </div>
                            <?php
                                }else {
                            ?>
                            <div class="ico-user">
                                <a href="{{ URL::to('/login-checkout') }}">
                                    <i class="fa-solid fa-user" id="icon"></i> Đăng nhập
                                </a>
                            </div>
                            <?php
                                }
                            ?>
                            <div class="icon-cart">
                                <a href="{{URL::to('/show-cart') }}">
                                    <i class="fa-solid fa-cart-shopping" id="icon"></i> Giỏ hàng
                                </a>
                            </div>
                        </div>
                    </div>
                </nav>


                <div class="content">
                    <p>QBOOKS</p>
                    <h1>Hàng ngàn quyển sách đang chờ đợi bạn</h1>
                    <div class="btn">
                        <a href="#gth">Khám phá ngay</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="noidung">

            @yield('content')

        </div>



    </div>
    <footer class="text-center text-lg-start bg-light text-muted">
        <div class="text-center p-4" id="footer-end">
            © 2023 Copyright QBooks
        </div>
    </footer>
    <script type="text/javascript">
        $('#keywords').keyup(function(){
            var query = $(this).val();
            if (query != ''){
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url:"{{ url('/autocomplete-ajax') }}",
                    method:"POST",
                    data:{query:query, _token:_token},
                    success:function(data){
                        $('#search_ajax').fadeIn();
                        $('#search_ajax').html(data);
                    }
                });
            }else{
                $('#search_ajax').fadeOut();
            }
        });
        $(document).on('click', 'li', function(){
            $('#keywords').val($(this).text());
            $('#search_ajax').fadeOut();
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

    
</body>

</html>
