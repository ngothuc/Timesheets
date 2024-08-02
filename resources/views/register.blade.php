@extends('layouts.app')

@section('title')
<div>
    <h1>Đăng ký</h1>
</div>
@endsection
@section('content')


<div>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div>
            <label for="name">Tên người dùng</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div>
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div>
            <label for="password">Mật khẩu</label>
            <input type="password" id="password" name="password" required>
        </div>
        <div>
            <button type="submit">Đăng ký</button>
        </div>
    </form>
    <div>
        <label for="login">Bạn đã có tài khoản?</label>
        <a href="{{ route('login-form') }}">Đăng nhập</a>
    </div>
</div>
</div>
@endsection