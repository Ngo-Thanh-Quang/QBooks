@extends('admin_layout')
@section('admin_content')
<div class="noidung" style="min-height: 100vh">
    <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="panel-heading">
                đơn hàng
            </div>
            
            <div class="table-responsive">
                <?php
                $message = Session::get('message');
                if ($message) {
                    echo '<span class="text-alert">' . $message . '</span>';
                    Session::put('message', null);
                }
                ?>
                <table class="table table-striped b-t b-light">
                    <thead>
                        <tr>
                            <th style="width:20px;">
                                
                            </th>
                            <th>Tên khách hàng</th>
                            <th>Tổng giá tiền</th>
                            <th>Tình trạng</th>
                            <th>Hiển thị</th>
                            <th style="width:30px;"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($all_order as $key => $order)
                            <tr>
                                <td>
                                </td>
                                <td>{{ $order->customer_name }}</td>
                                <td>{{ number_format($order->order_total,0,',','.') }}</td>
                                <td>{{ $order->order_status }}</td>
                                <td>
                                    <a href="{{ URL::to('/view-order/'.$order->order_id) }}" class="active styling-edit" ui-toggle-class="">
                                        <i class="fa-thumb-styling fa fa-eye"></i></a>
                                    <a onclick="return confirm('Bạn có muốn hủy đơn hàng này không?')" href="{{ URL::to('/delete-order/'.$order->order_id) }}" class="active styling-edit" ui-toggle-class="">
                                        <i class="fa fa-times text-danger text"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
        </div>
    </div>
</div>
@endsection
