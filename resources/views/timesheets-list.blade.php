@extends('layouts.app')

@section('title')
<h1 class="text-3xl text-gray-900 mb-6">Danh sách timesheet của {{$user->name}}</h1>
@endsection

@section('content')
<div class="space-y-6">
    @foreach ($timesheets as $timesheet)
    <div class="flex justify-between items-center p-6 bg-white shadow-lg rounded-xl border border-gray-200">
        <a href="{{ route('tasks-list', ['timesheet' => $timesheet]) }}" class="text-lg text-blue-500 hover:underline">{{ $timesheet->date }}</a>
        <form action="{{ route('timesheet-delete', $timesheet->id) }}" method="POST" class="flex items-center">
            @csrf
            @method('DELETE')
            <button type="submit" class="text-red-500 hover:text-red-700 font-medium">Xóa</button>
        </form>
    </div>
    @endforeach
</div>

<div class="mt-8 flex justify-end space-x-4">
    <a href="{{route('timesheets-create')}}" class="bg-green-600 text-white px-5 py-2.5 rounded-lg shadow hover:bg-green-700 transition ease-in-out duration-150">Tạo mới</a>
    <a href="{{route('profile')}}" class="bg-gray-600 text-white px-5 py-2.5 rounded-lg shadow hover:bg-gray-700 transition ease-in-out duration-150">Trở về</a>
</div>
@endsection
