@extends('layouts.admin')

@section('style')
<link rel="stylesheet" href="{{asset('/css/admin/users.css')}}">
@endsection

@section('content')
<div class="overflow-x-auto">
    <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-md">
        <thead>
            <tr>
                <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">ID</th>
                <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Tên</th>
                <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Email</th>
                <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Vai trò</th>
                <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Số lần muộn</th>
                <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Ngày tạo</th>
                <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Ngày cập nhật</th>
                <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr class="hover:bg-gray-100">
                <td class="px-6 py-4 border-b border-gray-200">{{ $user->id }}</td>
                <td class="px-6 py-4 border-b border-gray-200">{{ $user->name }}</td>
                <td class="px-6 py-4 border-b border-gray-200">{{ $user->email }}</td>
                <td class="px-6 py-4 border-b border-gray-200">{{ $user->role }}</td>
                <td class="px-6 py-4 border-b border-gray-200">{{ $user->late_count }}</td>
                <td class="px-6 py-4 border-b border-gray-200">{{ $user->created_at }}</td>
                <td class="px-6 py-4 border-b border-gray-200">{{ $user->updated_at }}</td>
                <td class="px-6 py-4 border-b border-gray-200">
                    <form method="post" action="{{route('admin-reset-password')}}">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="userId" value="{{ $user->id }}">
                        <button type="submit" class="text-green-500 hover:text-green-700">Đặt lại mật khẩu</button>
                    </form>
                    <form method="post" action="{{route('admin-delete-account')}}">
                        @csrf  
                        @method('delete')
                        <input type="hidden" name="userId" value="{{ $user->id }}">
                        <button type="submit" class="text-red-500 hover:text-red-700">Xóa tài khoản</button>
                    </form>
                    
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <nav class="mt-4">
        {{ $users->links() }}
    </nav>
    
</div>
@endsection
