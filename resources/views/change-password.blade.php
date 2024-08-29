@extends('layouts.user')

@section('style')
<link rel="stylesheet" href="{{asset('/css/change-password.css')}}">
<link href="https://fonts.googleapis.com/css2?family=Platypi:ital,wght@0,300..800;1,300..800&family=Raleway:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
@endsection

@section('title')
<h1 class="text-center text-2xl font-bold mb-4">Đổi mật khẩu</h1>
@endsection

@section('form-content')
<div class="flex flex-col items-center">
    <img src="{{ $user->avatar }}" alt="Avatar" class="w-32 h-32 rounded-full object-cover shadow-md mb-4">
</div>
<div class="flex justify-center items-center">
    <div class="w-full max-w-md bg-white p-6 rounded-lg shadow-lg">
        <form method="POST" action="{{ route('change-password') }}" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label for="old-password" class="block text-sm font-medium text-gray-700">Mật khẩu cũ</label>
                <input type="password" id="old-password" name="old-password" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>

            <div>
                <label for="new-password" class="block text-sm font-medium text-gray-700">Mật khẩu mới</label>
                <input type="password" id="new-password" name="new-password" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>

            <div>
                <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Đổi mật khẩu</button>
            </div>
        </form>
        <div class="mt-4 text-center">
            <a href="{{ route('profile') }}" class="text-blue-500 hover:underline">Trở về</a>
        </div>
    </div>
</div>
@endsection
