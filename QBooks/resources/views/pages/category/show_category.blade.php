@extends('layout')
@section('content')
    <div class="shop-section">
        <div class="container">
            <div class="row flex-column-reverse flex-lg-row">

                <div class="col">
                    <!-- Start Shop Product Sorting Section -->

                    <!-- Start Tab Wrapper -->
                    <div class="sort-product-tab-wrapper">
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <div class="tab-content tab-animate-zoom">
                                        <!-- Start Grid View Product -->
                                        <div class="tab-pane active show sort-layout-single" id="layout-3-grid">
                                            <div class="row">
                                                @foreach ($category_name as $key => $name)
                                                    <div class="text-title">
                                                        {{ $name->category_name }}
                                                    </div>
                                                @endforeach
                                            </div>
                                            <div class="row">
                                                @foreach ($category_by_id as $key => $product)
                                                    <div class="col-xl-4 col-sm-6 col-12">
                                                        <!-- Start Product Default Single Item -->
                                                        <div class="product-default-single-item product-color--golden"
                                                            data-aos="fade-up" data-aos-delay="0">


                                                            <div class="image-box">
                                                                <a href="{{ URL::to('chi-tiet-san-pham/' . $product->product_image) }}"
                                                                    class="image-link">
                                                                    <img src="{{ URL::to('public/uploads/product/' . $product->product_image) }}"
                                                                        alt="">
                                                                </a>
                                                                <div class="action-link">
                                                                    <div class="action-link-left">
                                                                        <a
                                                                            href="{{ URL::to('chi-tiet-san-pham/' . $product->product_image) }}">Xem
                                                                            thông tin sản phẩm</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="content">
                                                                <div class="content-left">
                                                                    <h6 class="title"><a
                                                                            href="{{ URL::to('chi-tiet-san-pham/' . $product->product_image) }}">{{ $product->product_name }}</a>
                                                                    </h6>
                                                                
                                                                </div>
                                                                <div class="content-right">
                                                                    <span
                                                                        class="price">{{ number_format($product->product_price, 0, ',', '.') }}</span><span
                                                                        class="align-text-bottom"
                                                                        style="font-size: 12px;text-decoration: underline;">đ</span>
                                                                </div>

                                                            </div>

                                                        </div>
                                                    </div>
                                                @endforeach


                                            </div>
                                        </div> <!-- End Grid View Product -->

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- End Tab Wrapper -->


                </div>
            </div>
        </div>
    </div> <!-- ...:::: End Shop Section:::... -->
@endsection
