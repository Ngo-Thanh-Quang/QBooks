@extends('admin_layout')
@section('admin_content')
    <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="panel-heading">
                Thông tin khách hàng
            </div>
            
            <div class="table-responsive">

                <table class="table table-striped b-t b-light">
                    <thead>
                        <tr>
                            
                            <th>Tên khách hàng</th>
                            <th>Số điện thoại</th>
                            <th>Email</th>
                            <th style="width:30px;"></th>
                        </tr>
                    </thead>
                    <tbody>
                        
                            <tr>
                                
                                <td>{{ $order_by_id_a->customer_name }}</td>
                                <td>{{ $order_by_id_a->customer_phone }}</td>
                                <td>{{ $order_by_id_a->customer_email }}</td>
                            </tr>
                        
                    </tbody>
                </table>
            </div>
            
        </div>
    </div><br>
    <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="panel-heading">
                Thông tin vận chuyển
            </div>
            
            <div class="table-responsive">

                <table class="table table-striped b-t b-light">
                    <thead>
                        <tr>
                            
                            <th>Tên người nhận hàng</th>
                            <th>Địa chỉ</th>
                            <th>Số điện thoại</th>
                            <th>Email</th>
                            <th style="width:30px;"></th>
                        </tr>
                    </thead>
                    <tbody>
                        
                            <tr>
                                
                                <td>{{ $order_by_id_a->shipping_name }}</td>
                                <td>{{ $order_by_id_a->shipping_address }}</td>
                                <td>{{ $order_by_id_a->shipping_phone }}</td>
                                <td>{{ $order_by_id_a->shipping_email }}</td>
                            </tr>
                            
                    </tbody>
                </table>
            </div>
            
        </div>
    </div>
    <br><br>
    <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="panel-heading">
                Chi tiết đơn hàng
            </div>
            
            <div class="table-responsive">

                <table class="table table-striped b-t b-light">
                    <thead>
                        <tr>
                            <th style="width:20px;">
                                
                            </th>
                            <th>Tên sản phẩm</th>
                            <th>Số lượng</th>
                            <th>Giá</th>
                            <th>Tổng tiền</th>
                            <th style="width:30px;"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order_by_id as $v_content)
                            <tr>
                                
                                <td>
                                </td>
                                <td>{{ $v_content->product_name }}</td>
                                <td>{{ $v_content->product_sales_quantity }}</td>
                                <td>{{ number_format($v_content->product_price, 0, ',', '.') }}</td>
                                <td>{{ number_format($v_content->product_price*$v_content->product_sales_quantity, 0, ',', '.') }}</td>
                                
                            </tr>
                        @endforeach    
                    </tbody>
                </table>
            </div>
            
        </div>
    </div>
@endsection
