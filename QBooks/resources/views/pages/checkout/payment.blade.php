@extends('layout')
@section('content')
    <div class="checkout-section">
        <div class="container">
            <!-- Start User Details Checkout Form -->
            <div class="checkout_form" data-aos="fade-up" data-aos-delay="400">
                <div class="row">
                    <div class="text-title" style="padding-bottom: 20px">
                        Thanh toán
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <form action="{{ URL::to('/order-place') }}" method="POST">
                            {{ csrf_field() }}
                            <h3 style="height: 50px; display: flex; justify-content: center; align-items: center;">Kiểm tra
                                giỏ hàng</h3>
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
                            <div class="payment_method">
                                <h4 style="margin-top: 10px">Phương thức thanh toán:</h4>
                                <div class="panel-default">
                                    <label class="checkbox-default" for="currencyCod" data-bs-toggle="collapse"
                                        data-bs-target="#methodCod">
                                        <input name="payment_option" value="2" type="checkbox" id="currencyCod">
                                        <span>Thanh toán khi nhận hàng</span>
                                    </label>

                                    <div id="methodCod" class="collapse" data-parent="#methodCod">
                                        <div class="card-body1">
                                            <p>Khách hàng không phải thanh toán trước khi nhận hàng, có thể kiểm tra đơn
                                                hàng trước khi thanh toán</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-default">
                                    <label class="checkbox-default" for="currencyCard" data-bs-toggle="collapse"
                                        data-bs-target="#methodCard">
                                        <input name="payment_option" value="1" type="checkbox" id="currencyCard">
                                        <span>Thanh toán bằng ví điện tử</span>
                                    </label>
                                    <div id="methodCard" class="collapse " data-parent="#methodCard">
                                        <div class="card-body1">
                                            <p>Khách hàng có thể thanh toán dễ dàng ở bất kỳ đâu, giúp tiết kiệm thời gian
                                                và công sức.</p>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="order_button pt-3">
                                    <button name="send_order_place" class="btn btn-md btn-black-default-hover" type="submit">Thanh toán</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div> <!-- Start User Details Checkout Form -->
        </div>
    </div><!-- ...:::: End Checkout Section:::... -->
@endsection
