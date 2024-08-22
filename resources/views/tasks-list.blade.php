@extends('layouts.app')

@section('title')
<div class="text-center mb-6">
    <h1 class="text-3xl font-bold">Chi tiết timesheet</h1>
</div>
@endsection

@section('content')
<div class="flex flex-row space-x-6">

    <div class="w-1/2 p-6 bg-white rounded-lg shadow-lg">
        <form method="POST" action="{{ route('timesheet-update', ['timesheet' => $timesheet]) }}" class="space-y-6">
            @csrf
            @method('PUT')

            <div>
                <label for="date" class="block text-sm font-medium text-gray-700">Ngày</label>
                <input type="date" id="date" name="date" value="{{ $timesheet->date }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>

            <div>
                <label for="difficulties" class="block text-sm font-medium text-gray-700">Khó khăn</label>
                <textarea id="difficulties" name="difficulties" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">{{ $timesheet->difficulties }}</textarea>
            </div>

            <div>
                <label for="next_plan" class="block text-sm font-medium text-gray-700">Kế hoạch</label>
                <textarea id="next_plan" name="next_plan" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">{{ $timesheet->next_plan }}</textarea>
            </div>

            <div>
                <button type="submit" class="w-full py-2 px-4 bg-blue-600 text-white font-semibold rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Sửa timesheet</button>
            </div>
        </form>
    </div>


    <div class="w-1/2 p-6 bg-white rounded-lg shadow-lg">
        <table class="min-w-full bg-white rounded-md shadow-md">
            <thead class="bg-gray-100">
                <tr>
                    <th class="py-2 px-4 text-left text-sm font-medium text-gray-700">ID</th>
                    <th class="py-2 px-4 text-left text-sm font-medium text-gray-700">Nội dung</th>
                    <th class="py-2 px-4 text-left text-sm font-medium text-gray-700">Thời gian</th>
                    <th class="py-2 px-4 text-left text-sm font-medium text-gray-700">Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tasks as $task)
                <tr class="border-t">
                    <td class="py-2 px-4">{{ $task->id }}</td>
                    <td class="py-2 px-4">{{ $task->content }}</td>
                    <td class="py-2 px-4">{{ $task->time_spent }}</td>
                    <td class="py-2 px-4">
                        <a href="{{ route('task-view', ['task' => $task]) }}" class="text-blue-500 hover:underline">Chi tiết</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="flex justify-between mt-4">
            <a href="{{ route('timesheets-list') }}" class="text-blue-500 hover:underline">Trở về</a>
            <a href="{{ route('task-create', ['timesheet' => $timesheet]) }}" class="text-blue-500 hover:underline">Tạo task</a>
        </div>
    </div>
</div>
@endsection
