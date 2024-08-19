@extends('layouts.app')

@section('style')
<link rel="stylesheet" href="{{asset('/css/login.css')}}">
<link href="https://fonts.googleapis.com/css2?family=Platypi:ital,wght@0,300..800;1,300..800&family=Raleway:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
@endsection

@section('title')
<div class="text-center my-8">
    <h1 class="text-3xl font-bold">Đăng nhập</h1>
</div>
@endsection

@section('content')
<div class="flex justify-center">
    <form method="POST" action="{{ route('login') }}" class="w-full max-w-md bg-white p-6 rounded-lg shadow-md">
        @csrf
        <div class="mb-4">
            <label for="email" class="block text-gray-700 font-bold mb-2">Email:</label>
            <input type="text" id="email" name="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
        </div>
        <div class="mb-6">
            <label for="password" class="block text-gray-700 font-bold mb-2">Password:</label>
            <input type="password" id="password" name="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" required>
        </div>
        <div class="flex items-center justify-center">
            <button type="submit" class="bg-blue-300 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Đăng nhập</button>
        </div>
    </form>
</div>
<div class="text-center mt-4">
    <label class="text-gray-600">Bạn chưa có tài khoản?</label>
    <a href="{{route('register-form')}}" class="text-blue-500 hover:underline">Đăng ký</a>
</div>
@endsection
