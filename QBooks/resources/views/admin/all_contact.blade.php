@extends('admin_layout')
@section('admin_content')
<div class="noidung" style="min-height: 100vh">
    <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="panel-heading">
                 ý kiến từ người dùng
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
                                <label class="i-checks m-b-none">
                                    
                                </label>
                            </th>
                            <th>Tên người phản hồi</th>
                            <th>Email</th>
                            <th>Ý kiến</th>
                            <th style="width:30px;"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($all_contact as $key => $cate_pro)
                            <tr>
                                <td><label class="i-checks m-b-none"></label>
                                </td>
                                <td>
                                    <?php
                                        if($cate_pro->contact_name == NULL){
                                            echo 'Ẩn danh';
                                        }else{
                                            echo $cate_pro->contact_name;
                                        }
                                        ?>
                                </td>
                                <td><?php
                                    if($cate_pro->contact_email == NULL){
                                        echo 'Ẩn danh';
                                    }else{
                                        echo $cate_pro->contact_email;
                                    }
                                    ?></td>
                                <td>{{ $cate_pro->message }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
        </div>
    </div>
</div>
@endsection
