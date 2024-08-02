@extends('layouts.app')

@section('title')
<h1>Đổi mật khẩu</h1>
@endsection

@section('content')
<div>
    <form method="POST" action="{{ route('change-password') }}">
        @csrf
        @method('PUT')
        <div>
            <label for="old-password">Mật khẩu cũ</label>
            <input type="password" id="old-password" name="old-password" required>
        </div>
        <div>
            <label for="new-password">Mật khẩu mới</label>
            <input type="password" id="new-password" name="new-password" required>
        </div>
        <div>
            <button type="submit">Đổi mật khẩu</button>
        </div>
    </form>
    <div>
        <a href="{{ route('profile') }}">Trở về</a>
    </div>
</div>
@endsection
