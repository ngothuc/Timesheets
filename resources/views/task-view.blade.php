@extends('layouts.app')

@section('title')
<h1 class="text-2xl font-bold mb-4">Chi tiết task: {{ $task->content }}</h1>
@endsection

@section('content')
<div class="space-y-6">
    <form method="POST" action="{{ route('task-update', ['task' => $task]) }}" class="space-y-4 bg-white p-6 rounded-lg shadow-lg">
        @csrf
        @method('PUT')

        <div>
            <label for="id" class="block text-sm font-medium text-gray-700">ID</label>
            <input type="text" id="id" name="id" value="{{ $task->id }}" readonly class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
        </div>

        <div>
            <label for="content" class="block text-sm font-medium text-gray-700">Nội dung</label>
            <input type="text" id="content" name="content" value="{{ $task->content }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
        </div>

        <div>
            <label for="time_spent" class="block text-sm font-medium text-gray-700">Thời gian</label>
            <input type="text" id="time_spent" name="time_spent" value="{{ $task->time_spent }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
        </div>

        <div>
            <button type="submit" class="w-full bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700">Cập nhật</button>
        </div>
    </form>

    <form method="POST" action="{{ route('task-delete', ['task' => $task]) }}" class="mt-4">
        @csrf
        @method('DELETE')
        <button type="submit" class="w-full bg-red-600 text-white py-2 px-4 rounded-lg hover:bg-red-700">Xóa</button>
    </form>

    <div class="mt-4">
        <a href="{{ route('tasks-list', ['timesheet' => $task->timesheet_id]) }}" class="text-blue-500 hover:underline">Trở về</a>
    </div>
</div>
@endsection
