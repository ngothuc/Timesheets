@extends('layouts.app')

@section('style')
<link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900&display=swap" rel="stylesheet">
@endsection

@section('title')
<div class="text-center mt-8">
    <h1 class="text-4xl font-bold text-gray-900">Xin chào, @yield('user-name', $user->name)</h1>
</div>
@endsection

@section('content')
<div class="flex justify-center mt-8">
    <div class="w-full max-w-xs bg-gray-800 text-white p-6 rounded-lg shadow-lg">
        <div class="flex flex-col items-center">
            <img src="@yield('user-avatar', $user->avatar)" alt="Avatar" class="avatar mb-4">
            <h2 class="text-2xl font-semibold mb-6">@yield('user-name', $user->name)</h2>
        </div>
        <nav class="space-y-4">
            <div class="hidden">
                <a href="{{ route('timetable', ['date' => '2024-08-15']) }}" class="sidebar-link">Timetable</a>
            </div>
            <div>
                <a class="block py-2 px-4 rounded bg-gray-700 hover:bg-gray-600 text-white transition" href="{{ route('timesheets-list') }}" class="sidebar-link">Danh sách timesheet</a>
            </div>
            <div>
                <a class="block py-2 px-4 rounded bg-gray-700 hover:bg-gray-600 text-white transition" href="{{ route('change-password-form') }}" class="sidebar-link">Đổi mật khẩu</a>
            </div>
            <div>
                <a class="block py-2 px-4 rounded bg-gray-700 hover:bg-gray-600 text-white transition" href="{{ route('logout') }}" class="sidebar-link">Đăng xuất</a>
            </div>
        </nav>
    </div>

    <div class="w-full max-w-3xl ml-8">
        @yield('form-content')
    </div>
</div>
@endsection
