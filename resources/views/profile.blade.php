@extends('layouts.app')

@section('title')
<h1>Xin chào {{$user->name}}</h1>
@endsection

@section('content')
<form>
    <div>
        <label>Tên</label>
        <textarea>{{$user->name}}</textarea>
    </div>
    <div>
        <label>Email</label>
        <input type="email" value="{{$user->email}}" disabled>
    </div>
    <div>
        <label>Ngày tạo</label>
        <label>{{$user->created_at}}</label>
    </div>
</form>
@endsection