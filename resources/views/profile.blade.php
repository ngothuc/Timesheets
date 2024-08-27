@extends('layouts.app')

@section('style')
<link rel="stylesheet" href="{{asset('/css/profile.css')}}">
<link href="https://fonts.googleapis.com/css2?family=Platypi:ital,wght@0,300..800;1,300..800&family=Raleway:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
@endsection

@section('title')
<h1 class="text-3xl font-bold text-center mt-8">Xin chào {{$user->name}}</h1>
@endsection

@section('content')
<div class="flex flex-col items-center space-y-6">
    <img src="{{ $user->avatar }}" alt="Avatar" class="w-32 h-32 rounded-full object-cover shadow-md">
</div>
<div class="flex justify-center mt-8">
    <form method="POST" action="{{route('update-profile')}}" class="w-full max-w-lg bg-white p-8 rounded-lg shadow-md">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="name" class="block text-gray-700 font-bold mb-2">Tên</label>
            <input type="text" id="name" name="name" value='{{$user->name}}' class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>
        <div class="mb-4">
            <label for="email" class="block text-gray-700 font-bold mb-2">Email</label>
            <input type="email" value="{{$user->email}}" disabled class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline bg-gray-100 cursor-not-allowed">
        </div>
        <div class="mb-4">
            <label for="avatar" class="block text-gray-700 font-bold mb-2">Avatar</label>
            <input type="text" id="avatar" name="avatar" value="{{$user->avatar}}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>
        <div class="mb-4">
            <label for="description" class="block text-gray-700 font-bold mb-2">Mô tả</label>
            <input type="text" id="description" name="description" value="{{$user->description}}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>
        <div class="mb-6">
            <label for="role" class="block text-gray-700 font-bold mb-2">Vai trò</label>
            <input type="text" value="{{$user->role}}" disabled class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline bg-gray-100 cursor-not-allowed">
        </div>
        <div class="flex items-center justify-center">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Sửa thông tin</button>
        </div>
    </form>
</div>
<div class="text-center mt-8">
    <a href="{{ route('timetable', ['date' => '2024-08-15']) }}" class="text-orange-500 hover:underline mx-2">Timetable</a>
    <a href="{{ route('timesheets-list') }}" class="text-orange-500 hover:underline mx-2">Danh sách timesheet</a>
    <a href="{{ route('change-password-form') }}" class="text-orange-500 hover:underline mx-2">Đổi mật khẩu</a>
    <a href="{{ route('logout') }}" class="text-orange-500 hover:underline mx-2">Đăng xuất</a>
</div>
@endsection
