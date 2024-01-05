@extends('layout')
@section('content')
@foreach($product_details as $key => $value)

<style>
    
    .rating-stars ul {
      list-style-type:none;
      padding:0;
    }
    .rating-stars ul > li.star {
      display:inline-block;
      
    }

    .rating-stars ul > li.star > i.fa {
      font-size:20px; 
      color:#ccc; 
    }
    
    .rating-stars ul > li.star.hover > i.fa {
      color:#b19361;
    }
    
    .rating-stars ul > li.star.selected > i.fa {
      color:#b19361;
    }
    
    </style>
<div class="product-details-section">
    <div class="container">
        <div class="row" style="padding-top: 40px;">
            <div class="col-xl-5 col-lg-6">
                <div class="product-details-gallery-area" data-aos="fade-up"  data-aos-delay="0">
                    <div class="product-large-image product-large-image-horaizontal swiper-container">
                            <div class="swiper-wrapper">
                                <div class="product-image-large-image swiper-slide zoom-image-hover img-responsive">
                                    <img src="{{ URL::to('/public/uploads/product/'.$value->product_image) }}" alt="">
                                </div>
                                
                            </div>
                    </div>
                    <div class="product-image-thumb product-image-thumb-horizontal swiper-container pos-relative mt-5" style="display: none">
                            <div class="swiper-wrapper">
                                <div class="product-image-thumb-single swiper-slide">
                                    <img class="img-fluid" src="{{ URL::to('/public/frontend/images/caycamngotcuatoi.webp') }}" alt="">
                                </div>
                                <div class="product-image-thumb-single swiper-slide">
                                    <img class="img-fluid" src="{{ URL::to('/public/frontend/images/caycamngotcuatoi2.jpg') }}" alt="">
                                </div>
                                <div class="product-image-thumb-single swiper-slide">
                                    <img class="img-fluid" src="{{ URL::to('/public/frontend/images/caycamngotcuatoi.webp') }}" alt="">
                                </div>
                                <div class="product-image-thumb-single swiper-slide">
                                    <img class="img-fluid" src="{{ URL::to('/public/frontend/images/caycamngotcuatoi.webp') }}" alt="">
                                </div>
                                <div class="product-image-thumb-single swiper-slide">
                                    <img class="img-fluid" src="{{ URL::to('/public/frontend/images/caycamngotcuatoi.webp') }}" alt="">
                                </div>
                                <div class="product-image-thumb-single swiper-slide">
                                    <img class="img-fluid" src="{{ URL::to('/public/frontend/images/caycamngotcuatoi.webp') }}" alt="">
                                </div>
                        </div>
                        <div class="gallery-thumb-arrow swiper-button-next"></div>
                        <div class="gallery-thumb-arrow swiper-button-prev"></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-7 col-lg-6">
                <div class="product-details-content-area product-details--golden" data-aos="fade-up"  data-aos-delay="200">
                    <div class="product-details-text">
                        <h4 class="title">{{ $value->product_name }}</h4>
                        <div class="d-flex align-items-center">
                            <ul class="review-star">
                                @for($count=1; $count<=5; $count++)
                                    @php
                                        if($count<=$star){
                                            $color = 'color:#b19361;';
                                        }else {
                                            $color = 'color:#ccc;';
                                        }
                                    @endphp
                                    <li style="{{ $color }}">
                                        <i class='fa fa-star fa-fw'></i>
                                    </li>
                                @endfor
                            </ul>
                        </div>
                        <div class="price">{{ number_format($value->product_price,0,',','.') }}<span id="unit" style="font-size: 16px;vertical-align: top; text-decoration: underline; margin-left: 3px; font-weight: 600">đ</span></div>
                        <p>{{ $value->product_desc }}</p>
                    </div> 
                    <div class="product-details-variable">
                    <form action="{{ URL::to('/save-cart') }}" method="POST">
                            {{ csrf_field() }}
                        <div class="d-flex align-items-center ">
                            <div class="variable-single-item ">
                                <span>Số lượng</span>
                                <div class="product-variable-quantity">
                                    <input name="qty" min="1" max="100" value="1" type="number">
                                    <input name="productid_hidden" value="{{ $value->product_image }}" type="hidden">
                                </div>
                            </div>

                            <div class="product-add-to-cart-btn">
                                <button type="submit" class="btn btn-block btn-lg btn-black-default-hover" data-bs-toggle="modal" data-bs-target="#modalAddcart">
                                    + Thêm Vào Giỏ Hàng</button>
                            </div>
                        </div>
                    </form>
                    </div> 
                    <div class="product-details-social">
                        <span class="title">Danh mục:</span>
                        <span>{{ $value->category_name }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> <!-- End Product Details Section -->

<div class="product-details-content-tab-section section-top-gap-100">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="product-details-content-tab-wrapper" data-aos="fade-up"  data-aos-delay="0">

                    <!-- Start Product Details Tab Button -->
                    <ul class="nav tablist product-details-content-tab-btn d-flex justify-content-center">
                        <li><a class="nav-link active" data-bs-toggle="tab" href="#description">
                                Mô tả
                            </a></li>
                        
                        <li><a class="nav-link" data-bs-toggle="tab" href="#review">
                                Đánh giá
                            </a></li>
                    </ul> <!-- End Product Details Tab Button -->

                    <!-- Start Product Details Tab Content -->
                    <div class="product-details-content-tab">
                        <div class="tab-content">
                            <!-- Start Product Details Tab Content Singel -->
                            <div class="tab-pane active show" id="description">
                                <div class="single-tab-content-item">
                                    <p>{{ nl2br(e($value->product_content))  }}</p>
                                </div>
                            </div>
                            <!-- Start Product Details Tab Content Singel -->
                            <div class="tab-pane" id="review">
                                <div class="single-tab-content-item">
                                    <!-- Start - Review Comment -->
                                    <ul class="comment">
                                        <!-- Start - Review Comment list-->
                                        <li class="comment-list">
                                            @foreach ($comment_by_id as $key => $comm)
                                            <div class="comment-wrapper">
                                                <div class="comment-img">
                                                    <img src="{{ asset('/public/frontend/images/user-avt.jpg') }}" alt="">
                                                </div>
                                                <div class="comment-content">
                                                    <div class="comment-content-top">
                                                        <div class="comment-content-left">
                                                            <h6 class="comment-name" style="font-size: 15px">{{ $comm->customer_name }}</h6>
                                                        </div>
                                                    </div>
                                
                                                    <div class="para-content">
                                                        <p style="font-size: 14px; margin-top: 20px;">{{ $comm->comment }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </li> 
                                    </ul>
                                    <?php
                                    $customer_id = Session::get('customer_id');
                                    ?>
                                    @if(isset($customer_id))
                                    <div class="review-form">
                                        <div class="review-form-text-top">
                                            <h5>VIẾT ĐÁNH GIÁ</h5>
                                            <p>Đánh giá của bạn sẽ được công khai</p>
                                        </div>

                                        <form action="{{ URL::to('/up-comment/' .$value->product_image ) }}" method="post">
                                            {{ csrf_field() }}
                                            <div class="row"> 
                                                <div class="col-12">
                                                    <div class='rating-stars'>
                                                        <input type="hidden" class="stars_value" name="stars_value">
                                                        <ul id='stars'>
                                                          <li class='star' title='Rất tệ' data-value='1'>
                                                            <i class='fa fa-star fa-fw'></i>
                                                          </li>
                                                          <li class='star' title='Tệ' data-value='2'>
                                                            <i class='fa fa-star fa-fw'></i>
                                                          </li>
                                                          <li class='star' title='Tạm ổn' data-value='3'>
                                                            <i class='fa fa-star fa-fw'></i>
                                                          </li>
                                                          <li class='star' title='Rất thích' data-value='4'>
                                                            <i class='fa fa-star fa-fw'></i>
                                                          </li>
                                                          <li class='star' title='Tuyệt vời' data-value='5'>
                                                            <i class='fa fa-star fa-fw'></i>
                                                          </li>
                                                        </ul>
                                                      </div>
                                                </div>                                               
                                                <div class="col-12">
                                                    <div class="default-form-box">
                                                        <label for="comment-review-text">Đánh giá <span>*</span></label>
                                                        <input type="hidden" name="customerId" value="{{ $customer_id }}">
                                                        <textarea id="comment-review-text" name="comment" placeholder="Viết đánh giá của bạn" required></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <button class="btn btn-md btn-black-default-hover" type="submit">Đăng</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    @endif
                                </div>
                            </div> 
                        </div>
                    </div> 

                </div>
            </div>
        </div>
    </div>
</div>
@endforeach

<div class="product-default-slider-section section-top-gap-100 section-fluid">
    <!-- Start Section Content Text Area -->
    <div class="section-title-wrapper" data-aos="fade-up"  data-aos-delay="0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-content-gap">
                        <div class="secton-content">
                            <h3  class="section-title">Sản phẩm liên quan</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Start Section Content Text Area -->
    <div class="product-wrapper" data-aos="fade-up"  data-aos-delay="0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="product-slider-default-1row default-slider-nav-arrow">
                        <!-- Slider main container -->
                        <div class="swiper-container product-default-slider-4grid-1row">
                            <!-- Additional required wrapper -->
                            <div class="swiper-wrapper">
                                @foreach($relate as $key => $lienquan)
                                <!-- Start Product Default Single Item -->
                                <div class="product-default-single-item product-color--golden swiper-slide">
                                    <div class="image-box">
                                        <a href="{{ URL::to('chi-tiet-san-pham/'.$lienquan->product_image) }}" class="image-link">
                                            <img src="{{ URL::to('/public/uploads/product/'.$lienquan->product_image) }}" alt="">
                                        </a>
                                        <div class="action-link">
                                            <div class="action-link-left">
                                                <a href="{{ URL::to('chi-tiet-san-pham/'.$lienquan->product_image) }}">xem chi tiết sản phẩm</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="content">
                                        <div class="content-left">
                                            <h6 class="title"><a href="{{ URL::to('chi-tiet-san-pham/'.$lienquan->product_image) }}">{{$lienquan->product_name}}</a></h6>
                                            
                                        </div>
                                        <div class="content-right">
                                            <span class="price">{{number_format($lienquan->product_price,0,',','.')}}</span><span id="unit" style="font-size: 12px;vertical-align: top; text-decoration: underline; margin-left: 3px; font-weight: 600">đ</span>
                                        </div>

                                    </div>
                                </div>
                                <!-- End Product Default Single Item -->
                                @endforeach
                               
                                
                                
                                
                            </div>
                        </div>
                        <!-- If we need navigation buttons -->
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> 
@endsection