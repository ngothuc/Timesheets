@extends('layouts.app')

@section('title')
<h1 class="text-2xl font-bold mb-4">Danh sách timesheet của {{$user->name}}</h1>
@endsection

@section('content')
<div class="space-y-4">
    @foreach ($timesheets as $timesheet)
    <div class="flex justify-between items-center p-4 bg-white shadow-md rounded-lg">
        <a href="{{ route('tasks-list', ['timesheet' => $timesheet]) }}" class="text-blue-600 hover:underline">{{ $timesheet->date }}</a>
        <form action="{{ route('timesheet-delete', $timesheet->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="text-red-600 hover:text-red-800">Xóa</button>
        </form>
    </div>
    @endforeach
</div>

<div class="mt-6">
    <a href="{{route('timesheets-create')}}" class="inline-block bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700">Tạo mới</a>
</div>
<div class="mt-4">
    <a href="{{route('profile')}}" class="inline-block bg-gray-600 text-white px-4 py-2 rounded-lg hover:bg-gray-700">Trở về</a>
</div>
@endsection
