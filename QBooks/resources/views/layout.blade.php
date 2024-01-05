<!DOCTYPE html>
<html lang="zxx">

<!-- Mirrored from htmldemo.hasthemes.com/hono/hono/shop-grid-sidebar-left.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 06 Jan 2021 00:32:23 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>QBooks</title>


    <link rel="shortcut icon" href="{{ asset('public/frontend/images/book-icon.png') }}" type="image/png">


    <link rel="stylesheet" href="{{ asset('public/frontend/css/vendor/vendor.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/frontend/css/plugins/plugins.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/frontend/css/style.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/frontend/css/style1.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>

<body>

    <header class="header-section d-none d-xl-block">
        <div class="header-wrapper">
            <div class="header-bottom header-bottom-color--golden section-fluid sticky-header sticky-color--golden">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 d-flex align-items-center justify-content-between">
                            <!-- Start Header Logo -->
                            <div class="header-logo">
                                <div class="navbar-brand">
                                    <a href="{{ URL::to('/trang-chu') }}" style="font-size: 40px;">QBooks</a>
                                </div>
                            </div>
                            <!-- End Header Logo -->

                            <!-- Start Header Main Menu -->
                            <div class="main-menu menu-color--black menu-hover-color--golden">
                                <nav>
                                    <ul>
                                        <li class="has-dropdown">
                                            <a class="active main-menu-link" href="{{ URL::to('/trang-chu') }}">Trang
                                                chủ</a>
                                        </li>
                                        <li class="has-dropdown">
                                            <a class="active main-menu-link"
                                                href="{{ URL::to('/danh-muc-san-pham/1') }}">Thể loại<i
                                                    class="fa fa-angle-down"></i></a>
                                            <!-- Sub Menu -->
                                            <ul class="sub-menu">
                                                @foreach ($category as $key => $cate)
                                                    <li><a
                                                            href="{{ URL::to('/danh-muc-san-pham/' . $cate->id) }}">{{ $cate->category_name }}</a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </li>
                                        <li class="has-dropdown">
                                            <a class="active main-menu-link" href="{{ URL::to('/lien-he') }}">Liên
                                                hệ</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                            <!-- End Header Main Menu Start -->

                            <!-- Start Header Action Link -->
                            <ul class="header-action-link action-color--black action-hover-color--golden">
                                <?php
                                    $customer_id = Session::get('customer_id');
                                    if($customer_id!=NULL){
                                ?>
                                <li>
                                    <a href="{{ URL::to('/logout-checkout') }}">
                                        <i class="fa-solid fa-right-from-bracket"></i>
                                    </a>
                                </li>
                                <?php
                                    }else {
                                    ?>
                                <li>
                                    <a href="{{ URL::to('/login-checkout') }}">
                                        <i class="icon-user"></i>
                                    </a>
                                </li>
                                <?php
                                }
                                ?>

                                <li>
                                    <a href="#offcanvas-add-cart" class="offcanvas-toggle">
                                        <i class="icon-bag"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#search">
                                        <i class="icon-magnifier"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#offcanvas-about" class="offacnvas offside-about offcanvas-toggle">
                                        <i class="icon-menu"></i>
                                    </a>
                                </li>
                            </ul>
                            <!-- End Header Action Link -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Start Header Area -->

    <!-- Start Mobile Header -->
    <div class="mobile-header mobile-header-bg-color--golden section-fluid d-lg-block d-xl-none">
        <div class="container">
            <div class="row">
                <div class="col-12 d-flex align-items-center justify-content-between">
                    <!-- Start Mobile Left Side -->
                    <div class="mobile-header-left">
                        <ul class="mobile-menu-logo">
                            <li>
                                <a href="{{ URL::to('/trang-chu') }}">
                                    <div class="navbar-brand">
                                        <a href="{{ URL::to('/trang-chu') }}" style="font-size: 40px;">QBooks</a>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- End Mobile Left Side -->

                    <!-- Start Mobile Right Side -->
                    <div class="mobile-right-side">
                        <ul class="header-action-link action-color--black action-hover-color--golden">
                            <li>
                                <a href="#search">
                                    <i class="icon-magnifier"></i>
                                </a>
                            </li>
                            <li>
                                <a href="{{ URL::to('/login-checkout') }}">
                                    <i class="icon-user"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#offcanvas-add-cart" class="offcanvas-toggle">
                                    <i class="icon-bag"></i>

                                </a>
                            </li>
                            <li>
                                <a href="#mobile-menu-offcanvas" class="offcanvas-toggle offside-menu">
                                    <i class="icon-menu"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- End Mobile Right Side -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Mobile Header -->

    <!--  Start Offcanvas Mobile Menu Section -->
    <div id="mobile-menu-offcanvas" class="offcanvas offcanvas-rightside offcanvas-mobile-menu-section">
        <!-- Start Offcanvas Header -->
        <div class="offcanvas-header text-right">
            <button class="offcanvas-close"><i class="ion-android-close"></i></button>
        </div> <!-- End Offcanvas Header -->
        <!-- Start Offcanvas Mobile Menu Wrapper -->
        <div class="offcanvas-mobile-menu-wrapper">
            <!-- Start Mobile Menu  -->
            <div class="mobile-menu-bottom">
                <!-- Start Mobile Menu Nav -->
                <div class="offcanvas-menu">
                    <ul>
                        <li>
                            <a href="{{ URL::to('/trang-chu') }}"><span>Trang chủ</span></a>
                        </li>
                        <li>
                            <a href="#"><span>Thể loại</span></a>
                            <ul class="mobile-sub-menu">
                                @foreach ($category as $key => $cate)
                                    <li><a
                                            href="{{ URL::to('/danh-muc-san-pham/' . $cate->id) }}">{{ $cate->category_name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                        <li><a href="contact-us.html">Liên hệ</a></li>
                    </ul>
                </div> <!-- End Mobile Menu Nav -->
            </div> <!-- End Mobile Menu -->

            <!-- Start Mobile contact Info -->
            <div class="mobile-contact-info">
                <div class="navbar-brand">
                    <a href="{{ URL::to('/trang-chu') }}" style="font-size: 40px;color: white;">QBooks</a>
                </div>

                <address class="address">
                    <span>Địa chỉ: K240/16 Ngô Gia Tự</span>
                    <span>Di động: 0896113113</span>
                    <span>Email: quangnt.22itb@vku.udn.vn</span>
                </address>

                <ul class="social-link">
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-github"></i></a></li>
                    <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                </ul>

                <ul class="user-link">
                    <li><a href="">Giỏ hàng</a></li>
                    <li><a href="checkout.html">Thanh toán</a></li>
                </ul>
            </div>
            <!-- End Mobile contact Info -->

        </div> <!-- End Offcanvas Mobile Menu Wrapper -->
    </div> <!-- ...:::: End Offcanvas Mobile Menu Section:::... -->

    <!-- Start Offcanvas Mobile Menu Section -->
    <div id="offcanvas-about" class="offcanvas offcanvas-rightside offcanvas-mobile-about-section">
        <!-- Start Offcanvas Header -->
        <div class="offcanvas-header text-right">
            <button class="offcanvas-close"><i class="ion-android-close"></i></button>
        </div> <!-- End Offcanvas Header -->
        <!-- Start Offcanvas Mobile Menu Wrapper -->
        <!-- Start Mobile contact Info -->
        <div class="mobile-contact-info">
            <div class="navbar-brand">
                <a href="{{ URL::to('/trang-chu') }}" style="font-size: 40px;color: white;">QBooks</a>
            </div>

            <address class="address">
                <span>Địa chỉ: K240/16 Ngô Gia Tự</span>
                <span>Di động: 0896113113</span>
                <span>Email: quangnt.22itb@vku.udn.vn</span>
            </address>

            <ul class="social-link">
                <li><a href="https://www.facebook.com/profile.php?id=100026318540286"><i
                            class="fa-brands fa-facebook"></i></a></li>
                <li><a href="https://github.com/Ngo-Thanh-Quang"><i class="fa-brands fa-github"></i></a></li>
                <li><a href="https://www.instagram.com/waq.0110/"><i class="fa-brands fa-instagram"></i></a></li>
            </ul>

            <ul class="user-link">
                <li><a href="{{ URL::to('/show-cart') }}">Giỏ hàng</a></li>
                <?php
                                    $customer_id = Session::get('customer_id');
                                    $shipping_id = Session::get('shipping_id');
                                    if($customer_id!=NULL && $shipping_id==NULL){
                ?>
                <li><a href="{{ URL::to('/checkout') }}">Thanh toán</a></li>
                <?php
                                }elseif($customer_id!=NULL && $shipping_id!=NULL){
                ?>
                <li><a href="{{ URL::to('/payment') }}">Thanh toán</a></li>
                <?php
                                    }else {
                ?>
                <li><a href="{{ URL::to('/login-checkout') }}">Thanh toán</a></li>
                <?php
                }
                ?>
            </ul>
        </div>
        <!-- End Mobile contact Info -->
    </div> <!-- ...:::: End Offcanvas Mobile Menu Section:::... -->

    <!-- Start Offcanvas Addcart Section -->
    <div id="offcanvas-add-cart" class="offcanvas offcanvas-rightside offcanvas-add-cart-section">
        <!-- Start Offcanvas Header -->
        <div class="offcanvas-header text-right">
            <button class="offcanvas-close"><i class="ion-android-close"></i></button>
        </div> <!-- End Offcanvas Header -->

        <!-- Start  Offcanvas Addcart Wrapper -->
        <div class="offcanvas-add-cart-wrapper">
            <?php
            $content = \Gloudemans\Shoppingcart\Facades\Cart::content();
            ?>
            <h4 class="offcanvas-title">Giỏ hàng</h4>
            <ul class="offcanvas-cart">
                @foreach ($content as $v_content)
                    <li class="offcanvas-cart-item-single">
                        <div class="offcanvas-cart-item-block">
                            <a href="{{ URL::to('/chi-tiet-san-pham/' . $v_content->options->image) }}"
                                class="offcanvas-cart-item-image-link">
                                <img src="{{ URL::to('public/uploads/product/' . $v_content->options->image) }}"
                                    alt="" class="offcanvas-cart-image">
                            </a>
                            <div class="offcanvas-cart-item-content">
                                <a href="{{ URL::to('/chi-tiet-san-pham/' . $v_content->options->image) }}"
                                    class="offcanvas-cart-item-link">{{ $v_content->name }}</a>
                                <div class="offcanvas-cart-item-details">
                                    <span class="offcanvas-cart-item-details-quantity">{{ $v_content->qty }} x </span>
                                    <span
                                        class="offcanvas-cart-item-details-price">{{ number_format($v_content->price) }}</span><span
                                        class="align-text-bottom"
                                        style="font-size: 12px;text-decoration: underline;">đ</span>
                                </div>
                            </div>
                        </div>
                        <div class="offcanvas-cart-item-delete text-right">
                            <a href="{{ URL::to('/delete-to-cart/' . $v_content->rowId) }}"
                                class="offcanvas-cart-item-delete"><i class="fa fa-trash-o"></i></a>
                        </div>
                    </li>
                @endforeach
            </ul>
            <div class="offcanvas-cart-total-price">
                <span class="offcanvas-cart-total-price-text">Tổng tiền:</span>
                <span class="offcanvas-cart-total-price-value">{{ number_format(Cart::subtotal()) }}</span><span
                    class="align-text-bottom" style="font-size: 12px;text-decoration: underline;">đ</span>
            </div>
            <ul class="offcanvas-cart-action-button">
                <li><a href="{{ URL::to('/show-cart') }}" class="btn btn-block btn-golden">Giỏ hàng</a></li>

                <?php
                    $customer_id = Session::get('customer_id');
                    $shipping_id = Session::get('shipping_id');
                    if($customer_id!=NULL && $shipping_id==NULL){
                ?>
                <li><a href="{{ URL::to('/checkout') }}" class=" btn btn-block btn-golden mt-5">Thanh toán</a></li>
                <?php
                    }elseif ($customer_id!=NULL && $shipping_id!=NULL) {
                ?>
                <li><a href="{{ URL::to('/payment') }}" class=" btn btn-block btn-golden mt-5">Thanh toán</a></li>
                <?php
                    }else {
                ?>
                <li><a href="{{ URL::to('/login-checkout') }}" class=" btn btn-block btn-golden mt-5">Thanh toán</a>
                </li>
                <?php
                    }
                ?>
            </ul>
        </div> <!-- End  Offcanvas Addcart Wrapper -->

    </div> <!-- End  Offcanvas Addcart Section -->

    <!-- Start Offcanvas Mobile Menu Section -->


    <!-- Start Offcanvas Search Bar Section -->
    <div id="search" class="search-modal">
        <button type="button" class="close">×</button>
        <form action="{{ URL::to('/tim-kiem') }}" method="POST">
            {{ csrf_field() }}
            <input type="search" name="keywords_submit" id="keywords" autocomplete="off"
                placeholder="Hội sách 2023 trở lại!" />
            <button type="submit" name="search_items" class="btn btn-lg btn-golden">Tìm kiếm</button>
            <div id="search_ajax" style="position: relative;">
            </div>
        </form>
    </div>
    <!-- End Offcanvas Search Bar Section -->

    <!-- Offcanvas Overlay -->
    <div class="offcanvas-overlay"></div>

    <!-- ...:::: Start Shop Section:::... -->
    <div class="noidung">
        @yield('content');
    </div>
    <!-- ...:::: End Shop Section:::... -->

    <!-- Start Footer Section -->
    <footer class="text-center text-lg-start bg-light text-muted">
        <div class="text-center p-4"
            style="    background-color: rgba(247, 238, 225);
        margin-top: 25px;
        color: rgba(86, 45, 15, 0.911);
        font-weight: 700;font-family: 'Nunito Sans';">
            © 2023 Copyright QBooks
        </div>
    </footer>
    <!-- End Footer Section -->

    <!-- material-scrolltop button -->
    <button class="material-scrolltop" type="button"></button>

    <!-- Start Modal Add cart -->




    <!-- Use the minified version files listed below for better performance and remove the files listed above -->
    <script src="{{ asset('public/frontend/js/vendor/vendor.min.js') }}"></script>
    <script src="{{ asset('public/frontend/js/plugins/plugins.min.js') }}"></script>

    <!-- Main JS -->
    <script src="{{ asset('public/frontend/js/main.js') }}"></script>
    <script src="{{ asset('public/frontend/js/script.js') }}"></script>


    {{-- đánh giá --}}
    <script>
        $(document).ready(function(){
         
         /* 1. Visualizing things on Hover - See next part for action on click */
         $('#stars li').on('mouseover', function(){
           var onStar = parseInt($(this).data('value'), 10); // The star currently mouse on
          
           // Now highlight all the stars that's not after the current hovered star
           $(this).parent().children('li.star').each(function(e){
             if (e < onStar) {
               $(this).addClass('hover');
             }
             else {
               $(this).removeClass('hover');
             }
           });
           
         }).on('mouseout', function(){
           $(this).parent().children('li.star').each(function(e){
             $(this).removeClass('hover');
           });
         });
         
         
         /* 2. Action to perform on click */
         $('#stars li').on('click', function(){
           var onStar = parseInt($(this).data('value'), 10); // The star currently selected
           var stars = $(this).parent().children('li.star');
           
           for (i = 0; i < stars.length; i++) {
             $(stars[i]).removeClass('selected');
           }
           
           for (i = 0; i < onStar; i++) {
             $(stars[i]).addClass('selected');
           }
           
           var ratingValue = parseInt($('#stars li.selected').last().data('value'), 10);
           $('.stars_value').val(ratingValue);
         });
         
         
       });

       </script>

    

    {{-- tìm kiếm --}}
    <script type="text/javascript">
        $('#keywords').keyup(function() {
            var query = $(this).val();
            if (query != '') {
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url: "{{ url('/autocomplete-ajax') }}",
                    method: "POST",
                    data: {
                        query: query,
                        _token: _token
                    },
                    success: function(data) {
                        $('#search_ajax').fadeIn();
                        $('#search_ajax').html(data);
                    }
                });
            } else {
                $('#search_ajax').fadeOut();
            }
        });
        $(document).on('click', 'li', function() {
            $('#keywords').val($(this).text());
            $('#search_ajax').fadeOut();
        });
    </script>
</body>
</html>
