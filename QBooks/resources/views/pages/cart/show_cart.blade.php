@extends('layout')
@section('content')
    <div class="cart-section">
        <!-- Start Cart Table -->
        <div class="cart-table-wrapper" data-aos="fade-up" data-aos-delay="0">
            <div class="container">
                <div class="row">
                    <div class="text-title" style="padding-bottom: 20px">
                        Giỏ Hàng
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="table_desc">
                            <div class="table_page table-responsive">
                                <?php
                                $content = \Gloudemans\Shoppingcart\Facades\Cart::content();
                                ?>
                                <table>
                                    <!-- Start Cart Table Head -->
                                    <thead>
                                        <tr>
                                            <th class="product_remove">Xóa</th>
                                            <th class="product_thumb">Hình ảnh</th>
                                            <th class="product_name">Tên sách</th>
                                            <th class="product-price">Giá Tiền</th>
                                            <th class="product_quantity">Số Lượng</th>
                                            <th class="product_total">Tổng Tiền</th>
                                        </tr>
                                    </thead> <!-- End Cart Table Head -->
                                    <tbody>
                                        <!-- Start Cart Single Item-->
                                        @foreach ($content as $v_content)
                                            <tr>
                                                <td class="product_remove"><a
                                                        href="{{ URL::to('/delete-to-cart/' . $v_content->rowId) }}"><i
                                                            class="fa fa-trash-o"></i></a></td>
                                                <td class="product_thumb"><a
                                                        href="{{ URL::to('/chi-tiet-san-pham/' . $v_content->options->image) }}"><img
                                                            src="{{ URL::to('public/uploads/product/' . $v_content->options->image) }}"
                                                            class="card-img-top" alt="{{ $v_content->name }}" /></a></td>
                                                <td class="product_name"><a
                                                        href="{{ URL::to('/chi-tiet-san-pham/' . $v_content->options->image) }}">{{ $v_content->name }}</a>
                                                </td>
                                                <td class="product-price">
                                                    {{ number_format($v_content->price, 0, ',', '.') }}<span id="unit"
                                                        style="font-size: 12px;vertical-align: top; text-decoration: underline; margin-left: 3px;">đ</span>
                                                </td>
                                                <td class="product_quantity">
                                                    <label>Số lượng</label>
                                                    <form action="{{ URL::to('/update-cart-quantity') }}" method="POST">
                                                        {{ csrf_field() }}
                                                        <input min="1" max="100" value="{{ $v_content->qty }}"
                                                            type="number" name="cart_quantity">
                                                        <input type="hidden" class="product_name"
                                                            value="{{ $v_content->rowId }}" name="rowId_cart">
                                                        <button class="btn btn-sm" name="update_qty" type="submit"><i
                                                                class="fa fa-check"></i></button>
                                                    </form>
                                                </td>
                                                <td class="product_total">
                                                    <?php
                                                    $subtotal = $v_content->price * $v_content->qty;
                                                    echo number_format($subtotal, 0, ',', '.');
                                                    ?><span id="unit"
                                                        style="font-size: 12px;vertical-align: top; text-decoration: underline; margin-left: 3px;">đ</span>
                                                </td>
                                            </tr> <!-- End Cart Single Item-->
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- End Cart Table -->

        <!-- Start Coupon Start -->
        <div class="coupon_area">
            <div class="container">
                <div class="row">

                    <div class="col-lg-6 col-md-6">
                        <div class="coupon_code right" data-aos="fade-up" data-aos-delay="400">
                            <h3>Tổng tiền</h3>
                            <div class="coupon_inner">
                                <div class="cart_subtotal">
                                    <p>Tổng:</p>
                                    <p class="cart_amount">{{ number_format(Cart::subtotal(), 0, ',', '.') }}<span
                                            id="unit"
                                            style="font-size: 12px;vertical-align: top; text-decoration: underline; margin-left: 3px; margin-right: 0px;">đ</span>
                                    </p>
                                </div>
                                <div class="cart_subtotal ">
                                    <p>Phí vận chuyển:</p>
                                    <p class="cart_amount"><span style="margin-right: 0px;">Miễn phí</span></p>
                                </div>

                                <div class="cart_subtotal">
                                    <p>Thành tiền:</p>
                                    <p class="cart_amount">{{ number_format(Cart::subtotal(), 0, ',', '.') }}<span
                                            id="unit"
                                            style="font-size: 12px;vertical-align: top; text-decoration: underline; margin-left: 3px; margin-right: 0px;">đ</span>
                                    </p>
                                </div>
                                <?php
                                    $customer_id = Session::get('customer_id');
                                    $shipping_id = Session::get('shipping_id');
                                    if($customer_id!=NULL && $shipping_id==NULL){
                                ?>
                                <div class="checkout_btn">
                                    <a href="{{ URL::to('/checkout') }}" class="btn btn-md btn-golden">Thanh toán</a>
                                </div>
                                <?php
                                    }elseif($customer_id!=NULL && $shipping_id!=NULL){
                                ?>
                                <div class="checkout_btn">
                                    <a href="{{ URL::to('/payment') }}" class="btn btn-md btn-golden">Thanh toán</a>
                                </div>
                                <?php
                                    }else {
                                    ?>
                                    <div class="checkout_btn">
                                        <a href="{{ URL::to('/login-checkout') }}" class="btn btn-md btn-golden">Thanh toán</a>
                                    </div>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Coupon Start -->
    </div> <!-- ...:::: End Cart Section:::... -->
@endsection
