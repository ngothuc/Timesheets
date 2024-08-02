@extends('layouts.app')

@section('title')
<h1>Xin chào {{$user->name}}</h1>
@endsection

@section('content')
<form method="POST" action="{{route('update-profile')}}">
    @csrf
    @method('PUT')
    <div>
        <label>Tên</label>
        <input type="text" id="name" name="name" value={{$user->name}}></input>
    </div>
    <div>
        <label>Email</label>
        <input type="email" value="{{$user->email}}" disabled>
    </div>
    <div>
        <label>Avatar</label>
        <input type="text" id="avatar" name="avatar" value="{{$user->avatar}}"></input>
    </div>
    <div>
        <label>Mô tả: </label>
        <input type="text" id="description" name="description" value="{{$user->description}}"></input>
    </div>
    <div>
        <label>Vai trò</label>
        <input type="text" value="{{$user->role}}" disabled>
    </div>
    <div>
        <button type="submit">Sửa thông tin</button>
    </div>
</form>
<div>
    <a href="{{ route('timesheets-list') }}">Danh sách timesheet</a>
    <a href="{{ route('change-password-form') }}">Đổi mật khẩu</a>
    <a href="{{ route('logout') }}">Đăng xuất</a>
</div>
@endsection