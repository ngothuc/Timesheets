@extends('layouts.app')

@section('title')
<h1>Xin chào {{$user->name}}</h1>
@endsection

@section('content')
<form>
    <div>
        <label>Tên</label>
        <input type="text" value={{$user->name}}></input>
    </div>
    <div>
        <label>Email</label>
        <input type="email" value="{{$user->email}}" disabled>
    </div>
    <div>
        <label>Avatar</label>
        <input type="text" value="{{$user->avatar}}"></input>
    </div>
    <div>
        <label>Mô tả: </label>
        <input type="text" value="{{$user->description}}"></input>
    </div>
    <div>
        <label>Vai trò</label>
        <input type="text" value="{{$user->role}}" disabled>
    </div>
</form>
<div>
    <a>Danh sách timesheet</a>
    <a>Sửa thông tin</a>
    <a>Đổi mật khẩu</a>
    <a href="{{ route('login-form') }}">Đăng xuất</a>
</div>
@endsection