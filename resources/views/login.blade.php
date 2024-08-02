@extends('layouts.app')

@section('title')
<div>
    <h1>Đăng nhập</h1>
</div>
@endsection

@section('content')
<form method="POST" action="{{ route('login') }}">
    @csrf
    <div>
        <label for="email">Email:</label>
        <input type="text" id="email" name="email">
    </div>
    <div>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password">
    </div>
    <div>
        <button type="submit">Đăng nhập</button>
    </div>
</form>
<div>
    <label>Bạn chưa có tài khoản?</label>
    <a href="{{route('register-form')}}">Đăng ký</a>
</div>
@endsection