@extends('layout')
@section('content')
    
        
<div class="bodyy">
    <div class="container-loginn" id="container-loginn">
        <div class="form-containerr sign-up">
            <form action="{{ URL::to('/add-customer') }}" method="POST">
                {{ csrf_field() }}
                <h1 id="h1b">Tạo tài khoản</h1>
                <input type="text" name="customer_name" placeholder="Họ và tên">
                <input type="email" name="customer_email" placeholder="Địa chỉ email">
                <input type="phone" name="customer_phone" placeholder="Số điện thoại">
                <input type="password" name="customer_password" placeholder="Mật khẩu">
                <button id="btn-loginn">Đăng ký</button>
            </form>
        </div>
        <div class="form-containerr sign-inn">
            <form action="{{ URL::to('/login-customer') }}" method="POST">
                {{ csrf_field() }}
                <h1 id="h1b">Đăng nhập</h1>
                <input type="text" name="email_account" placeholder="Tên đăng nhập">
                <input type="password" name="password_account" placeholder="Mật khẩu">
                <div style="width: 100%; margin-bottom: 10px">
                    <span style="font-size: 13px">
                        <input type="checkbox" class="checkbox" style="height: 13px; width: 13px;" />&nbsp;Ghi nhớ đăng nhập
                    </span>
                    <a href="#">&emsp;&emsp;&emsp;&ensp;Quên mật khẩu?</a>
                </div>
                <button id="btn-loginn">Đăng nhập</button>
            </form>
        </div>
        <div class="togglee-container">
            <div class="togglee">
                <div class="togglee-panel togglee-left">
                    <h1 id="h1a">QBooks</h1>
                    <p>Bạn đã có tài khoản? Đăng nhập ngay!</p>
                    <button class="hidden" id="loginn">Đăng nhập ngay</button>
                </div>
                <div class="togglee-panel togglee-right">
                    <h1 id="h1a">QBooks</h1>
                    <p>Bạn chưa có tài khoản? Nhanh tay đăng ký ngay!</p>
                    <button class="hidden" id="registerr">Đăng ký bây giờ</button>
                </div>
            </div>
        </div>
    </div>
</div>
        
    
@endsection
