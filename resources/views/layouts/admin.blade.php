<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    @yield('style')
    <script src="https://cdn.tailwindcss.com/"></script>
</head>

<body class="bg-gray-100">
    <div class="flex min-h-screen">
        <div class="w-1/6 bg-gray-800 text-white p-4">
            <h1 class="text-3xl font-bold mb-6 text-center">Dashboard</h1>
            <ul class="space-y-4">
                <li>
                    <a href="{{ route('admin-dashboard') }}" class="block py-2 px-4 rounded bg-gray-700 hover:bg-gray-600 text-white transition">Tổng quan</a>
                </li>
                <li>
                    <a href="#" class="block py-2 px-4 rounded bg-gray-700 hover:bg-gray-600 text-white transition">Thông tin cá nhân</a>
                </li>
                <li>
                    <a href="{{route('admin-dashboard-users')}}" class="block py-2 px-4 rounded bg-gray-700 hover:bg-gray-600 text-white transition">Quản lý User</a>
                </li>
                <li>
                    <a href="#" class="block py-2 px-4 rounded bg-gray-700 hover:bg-gray-600 text-white transition">Quản lý Timesheet</a>
                </li>
            </ul>
        </div>

        <div class="w-5/6 p-6">
            <div class="bg-white rounded-lg shadow-lg p-6">
                @yield('content')
            </div>
        </div>
    </div>

    @yield('script')
</body>

</html>
