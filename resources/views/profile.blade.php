@extends('layouts.user')

@section('form-content')
<form method="POST" action="{{ route('update-profile') }}" class="bg-white p-8 rounded-lg shadow-lg">
    @csrf
    @method('PUT')
    <div class="mb-4">
        <label for="name" class="block text-gray-700 font-bold mb-2">Tên</label>
        <input type="text" id="name" name="name" value="{{ $user->name }}" class="form-input">
    </div>
    <div class="mb-4">
        <label for="email" class="block text-gray-700 font-bold mb-2">Email</label>
        <input type="email" value="{{ $user->email }}" disabled class="form-input bg-gray-200 cursor-not-allowed">
    </div>
    <div class="mb-4">
        <label for="avatar" class="block text-gray-700 font-bold mb-2">Avatar</label>
        <input type="text" id="avatar" name="avatar" value="{{ $user->avatar }}" class="form-input">
    </div>
    <div class="mb-4">
        <label for="description" class="block text-gray-700 font-bold mb-2">Mô tả</label>
        <input type="text" id="description" name="description" value="{{ $user->description }}" class="form-input">
    </div>
    <div class="mb-6">
        <label for="role" class="block text-gray-700 font-bold mb-2">Vai trò</label>
        <input type="text" value="{{ $user->role }}" disabled class="form-input bg-gray-200 cursor-not-allowed">
    </div>
    <div class="flex justify-center">
        <button type="submit" class="submit-btn">Sửa thông tin</button>
    </div>
</form>
@endsection
