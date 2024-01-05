@extends('layout')
@section('content')
    <div class="checkout-section">
        <div class="container">
            <!-- Start User Details Checkout Form -->
            <div class="checkout_form" data-aos="fade-up" data-aos-delay="400">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <form action="{{ URL::to('/save-checkout-customer') }}" method="POST">
                            {{ csrf_field() }}
                            <h3
                                style="height: 50px; display: flex; justify-content: center; align-items: center;margin-top: 60px">
                                Thông tin
                                gửi hàng</h3>
                            <div class="row">
                                <div class="col-12">
                                    <div class="default-form-box">
                                        <label>Họ và tên người nhận</label>
                                        <input type="text" name="shipping_name">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="default-form-box">
                                        <label>Địa chỉ</label>
                                        <input placeholder="Số nhà và tên đường" type="text" name="shipping_address">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="default-form-box">
                                        <label>Số điện thoại</label>
                                        <input type="text" name="shipping_phone">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="default-form-box">
                                        <label> Địa chỉ email</label>
                                        <input type="text" name="shipping_email">
                                    </div>
                                </div>
                                <div class="col-12 mt-3">
                                    <div class="order-notes">
                                        <label for="order_note">Ghi chú</label>
                                        <textarea name="shipping_notes" id="order_note" placeholder="Ghi chú về đơn hàng của bạn"></textarea>
                                    </div>
                                </div>

                                <div class="checkout_btn"
                                    style="padding: 20px 0; display:flex; justify-content: center;align-content: center">
                                    <input type="submit" class="btn btn-md btn-golden"
                                        style="width: 120px;display: flex; align-items: center; justify-content: center;height: 40px;"
                                        value="Gửi">
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
                
            </div> <!-- Start User Details Checkout Form -->
        </div>
    </div><!-- ...:::: End Checkout Section:::... -->
@endsection
