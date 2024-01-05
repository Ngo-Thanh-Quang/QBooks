@extends('welcome')
@section('content')
    

<div class="gth" id="gth">
    <div class="left">
        Sản phẩm bán chạy
    </div>
    <div class="align-text-top" id="right">
        <a href="danh-muc-san-pham/1" class="more">
            Xem thêm <i class="fa-solid fa-chevron-right" id="ico-next"></i><i class="fa-solid fa-chevron-right"
                id="ico-next"></i>
        </a>
    </div>
</div>
<div class="sanpham">
    <div class="container">
        <div class="row">
            @foreach ($all_product as $key => $product)
                
            <div class="col">
                <div class="card"><a href="{{ URL::to('chi-tiet-san-pham/'.$product->product_image) }}" class="book-detail">
                        <img src="{{URL::to('public/uploads/product/'.$product->product_image)}}" class="card-img-top" alt="{{ $product->product_name }}">
                        <div class="card-body">
                            <p class="card-text">
                                {{ $product->product_name }}
                            {{-- <div class="rate">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <span class="view">
                                    Đã bán 5k+
                                </span>
                            </div> --}}
                            </p>
                            <h5 class="card-price">{{ number_format($product->product_price,0,',','.') }}<span class="align-text-bottom" id="unit">đ</span>
                                
                            </h5>
                        </div>
                        <div class="cart-ico-container">
                            <i class="fa-solid fa-cart-plus" id="cart-ico"></i>
                        </div>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
        
    </div>
</div>

<div class="banner">
    <div class="container">
        <div class="row">
            <div class="col-sm-4" id="img-banner-contain">
                <img src="{{ ('public/frontend/images/tuoitredanggiabaonhieu.jpg') }}" alt="Tuổi Trẻ Đáng Giá Bao Nhiêu?"
                    class="img-banner">
            </div>
            <div class="col-sm-8" id="banner-content">
                <div class="banner-title">
                    Tuổi Trẻ Đáng Giá Bao Nhiêu?
                </div>
                <div class="banner-content">
                    “Tuổi trẻ đáng giá bao nhiêu?” của tác giả Rosie Nguyễn là một trong những cuốn sách
                    self-help “gối đầu giường” của nhiều bạn trẻ hiện nay. Với lời văn bình dị, gần gũi, cuốn
                    sách miêu tả một cách chân thật, rõ nét về tâm lý của giới trẻ, giúp các bạn tự tin chuẩn bị
                    hành trang cho những trải nghiệm thời thanh xuân của mình.
                </div>
                
                <a href="chi-tiet-san-pham/tuoitredanggiabaonhieu188.webp" class="btn-info">Tìm hiểu thêm</a>

            </div>
        </div>
    </div>
</div>

<div class="gth">
    <div class="left">
        Văn học và hơn thế nữa
    </div>
    <div class="align-text-top" id="right">
        <a href="danh-muc-san-pham/1" class="more">
            Xem thêm <i class="fa-solid fa-chevron-right" id="ico-next"></i><i class="fa-solid fa-chevron-right"
                id="ico-next"></i>
        </a>
    </div>
</div>
<div class="sanpham">
    <div class="container">
        <div class="row">
            @foreach ($van_hoc as $key => $product)
            <div class="col">
                <div class="card"><a href="{{ URL::to('chi-tiet-san-pham/'.$product->product_image) }}" class="book-detail">
                        <img src="{{URL::to('public/uploads/product/'.$product->product_image)}}" class="card-img-top" alt="{{ $product->product_name }}">
                        <div class="card-body">
                            <p class="card-text">
                                {{ $product->product_name }}
                            
                            </p>
                            <h5 class="card-price">{{ number_format($product->product_price,0,',','.') }}<span class="align-text-bottom" id="unit">đ</span>
                                
                            </h5>

                        </div>
                        <div class="cart-ico-container">
                            <i class="fa-solid fa-cart-plus" id="cart-ico"></i>
                        </div>
                    </a>
                </div>
            </div>
            @endforeach
    </div>
</div>

<div class="gth">
    <div class="left">
        Bí quyết kinh doanh
    </div>
    <div class="align-text-top" id="right">
        <a href="danh-muc-san-pham/4" class="more">
            Xem thêm <i class="fa-solid fa-chevron-right" id="ico-next"></i><i class="fa-solid fa-chevron-right"
                id="ico-next"></i>
        </a>
    </div>
</div>
<div class="sanpham">
    <div class="container">
        <div class="row">
            @foreach ($kinh_te as $key => $product)
            <div class="col">
                <div class="card"><a href="{{ URL::to('chi-tiet-san-pham/'.$product->product_image) }}" class="book-detail">
                        <img src="{{URL::to('public/uploads/product/'.$product->product_image)}}" class="card-img-top" alt="Nghĩ Giàu Và Làm Giàu">
                        <div class="card-body">
                            <p class="card-text">
                                {{ $product->product_name }}
                            
                            </p>
                            <h5 class="card-price">{{ number_format($product->product_price,0,',','.') }}<span class="align-text-bottom" id="unit">đ</span>
                                
                            </h5>

                        </div>
                        <div class="cart-ico-container">
                            <i class="fa-solid fa-cart-plus" id="cart-ico"></i>
                        </div>
                    </a>
                </div>
            </div>
            @endforeach
        </div>

    </div>
</div>

<div class="container-fluid pt-5">
    <div class="row px-xl-5 pb-3">
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="d-flex align-items-center border-custom mb-4" style="padding: 30px;">
                <h2 class="fa fa-check custom-check m-0 mr-3"></h2>
                <h5 class="font-weight-semi-bold m-0">&ensp;Sản Phẩm Chất Lượng</h5>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="d-flex align-items-center border-custom mb-4" style="padding: 30px;">
                <h2 class="fa fa-shipping-fast custom-check m-0 mr-2"></h2>
                <h5 class="font-weight-semi-bold m-0">&ensp;Vận Chuyển Miễn Phí</h5>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="d-flex align-items-center border-custom mb-4" style="padding: 30px;">
                <h2 class="fas fa-exchange-alt custom-check m-0 mr-3"></h2>
                <h5 class="font-weight-semi-bold m-0">&ensp;Hoàn Trả Dễ Dàng</h5>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="d-flex align-items-center border-custom mb-4" style="padding: 30px;">
                <h2 class="fa fa-phone-volume custom-check m-0 mr-3"></h2>
                <h5 class="font-weight-semi-bold m-0">&ensp;Hỗ Trợ 24/7</h5>
            </div>
        </div>
    </div>
</div>

<div class="gth" id="gth">
    <div class="left">
        Ngoại ngữ không khó đã có từ điển lo
    </div>
    <div class="align-text-top" id="right">
        <a href="danh-muc-san-pham/5" class="more">
            Xem thêm <i class="fa-solid fa-chevron-right" id="ico-next"></i><i class="fa-solid fa-chevron-right"
                id="ico-next"></i>
        </a>
    </div>
</div>
<div class="sanpham">
    <div class="container">
        <div class="row">
            @foreach ($tu_dien as $key => $product)
            <div class="col">
                <div class="card"><a href="{{ URL::to('chi-tiet-san-pham/'.$product->product_image) }}" class="book-detail">
                        <img src="{{URL::to('public/uploads/product/'.$product->product_image)}}" class="card-img-top" alt="Từ Điển Việt Anh">
                        <div class="card-body">
                            <p class="card-text">
                                {{ $product->product_name }}
                            
                            </p>
                            <h5 class="card-price">{{ number_format($product->product_price,0,',','.') }}<span class="align-text-bottom" id="unit">đ</span>
                                
                            </h5>
                        </div>
                        <div class="cart-ico-container">
                            <i class="fa-solid fa-cart-plus" id="cart-ico"></i>
                        </div>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection