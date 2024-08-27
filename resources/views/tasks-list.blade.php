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
                <label for="update_at" class="block text-sm font-medium text-gray-700">Cập nhật lúc</label>
                <input id="update_at" name="update_at" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" readonly value="{{$timesheet->updated_at}}"></input>
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
                    <th class="py-2 px-4 text-left text-sm font-medium text-gray-700">Hoàn thành</th>
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
                        @if($task->completed)
                        <button class="toggleCompleted text-green-500 font-bold" data-id="{{ $task->id }}" data-completed="1">✓</button>
                        @else
                        <button class="toggleCompleted text-red-500 font-bold" data-id="{{ $task->id }}" data-completed="0">✗</button>
                        @endif
                    </td>
                    <td class="py-2 px-4">
                        <div class="flex justify-end mt-4">
                            <button class="showUpdateTaskForm bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700"
                                data-id="{{ $task->id }}"
                                data-content="{{ $task->content }}"
                                data-time_spent="{{ $task->time_spent }}">
                                Chi tiết
                            </button>
                        </div>
                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>


        <div class="flex justify-end mt-4">
            <button id="showTaskForm" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">Tạo task</button>
        </div>


        <form id="taskForm" method="post" action="{{route('task-store', ['timesheet' => $timesheet])}}" class="hidden mt-6 max-w-md mx-auto p-6 bg-white rounded-lg shadow-lg">
            @csrf
            <div class="mb-4">
                <label for="content" class="block text-sm font-medium text-gray-700">Nội dung</label>
                <input type="text" id="content" name="content" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" />
            </div>
            <div class="mb-4">
                <label for="time_spent" class="block text-sm font-medium text-gray-700">Số giờ làm việc</label>
                <input type="number" id="time_spent" name="time_spent" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" />
            </div>
            <div class="flex justify-between">
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg shadow-sm hover:bg-blue-700">Lưu task</button>
                <button type="button" id="hideTaskForm" class="text-red-500 hover:underline">Đóng</button>
            </div>
        </form>

        <form id="updateTaskForm" method="POST" class="hidden mt-6 max-w-md mx-auto p-6 bg-white rounded-lg shadow-lg">
            @csrf
            @method('PUT')
            <div class="mb-4 hidden">
                <label for="id" class="block text-sm font-medium text-gray-700">ID</label>
                <input type="text" id="update_id" name="id" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" />
            </div>
            <div class="mb-4">
                <label for="update_content" class="block text-sm font-medium text-gray-700">Nội dung</label>
                <input type="text" id="update_content" name="content" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" />
            </div>
            <div class="mb-4">
                <label for="update_time_spent" class="block text-sm font-medium text-gray-700">Số giờ làm việc</label>
                <input type="number" id="update_time_spent" name="time_spent" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" />
            </div>
            <div class="flex justify-between">
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg shadow-sm hover:bg-blue-700">Cập nhật task</button>
                <button type="button" id="hideUpdateTaskForm" class="text-red-500 hover:underline">Đóng</button>
            </div>
        </form>

        <div class="hidden">
            <form id="updateCompleteForm" method="post">
                @csrf
                @method('PUT')
                <input type="hidden" name="id" id="update_complete_id" />
            </form>
        </div>

    </div>
</div>


@section('script')
<script>
    const taskUpdateRoute = "{{ route('task-update', ['task' => ':taskId']) }}";
    const taskCompletedRoute = "{{ route('task-completed', ['task' => ':taskId']) }}";

    document.getElementById('showTaskForm').addEventListener('click', function() {
        document.getElementById('taskForm').classList.remove('hidden');
    });

    document.getElementById('hideTaskForm').addEventListener('click', function() {
        document.getElementById('taskForm').classList.add('hidden');
    });

    document.querySelectorAll('.showUpdateTaskForm').forEach(button => {

        button.addEventListener('click', function() {
            const taskId = this.dataset.id;
            const taskContent = this.dataset.content;
            const taskTimeSpent = this.dataset.time_spent;

            const updateUrl = taskUpdateRoute.replace(':taskId', taskId);
            document.getElementById('updateTaskForm').action = updateUrl;
            document.getElementById('update_id').value = taskId;
            document.getElementById('update_content').value = taskContent;
            document.getElementById('update_time_spent').value = taskTimeSpent;

            document.getElementById('updateTaskForm').classList.remove('hidden');

        });
    });

    document.getElementById('hideUpdateTaskForm').addEventListener('click', function() {
        document.getElementById('updateTaskForm').classList.add('hidden');
    });

    document.querySelectorAll('.toggleCompleted').forEach(button => {
        button.addEventListener('click', function() {
            const taskId = this.dataset.id;
            const isCompleted = this.dataset.completed;
            const updateUrl = taskCompletedRoute.replace(':taskId', taskId);
            document.getElementById('updateCompleteForm').action = updateUrl;

            document.getElementById('update_complete_id').value = taskId;
            document.getElementById('updateCompleteForm').submit();
        });
    });
</script>
@endsection
@endsection