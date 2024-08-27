@extends('layouts.app')

@section('title')
<h1>Tạo task cho timesheet ngày {{$timesheet->date}}</h1>
@endsection

@section('content')

<form method="POST" action="{{route('task-store', ['timesheet' => $timesheet])}}" class="max-w-md mx-auto p-6 bg-white rounded-lg shadow-lg">
    @csrf
    <div class="mb-4">
        <label for="content" class="block text-sm font-medium text-gray-700">Nội dung</label>
        <input type="text" id="content" name="content" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" />
    </div>
    <div class="mb-4">
        <label for="time_spent" class="block text-sm font-medium text-gray-700">Số giờ làm việc</label>
        <input type="number" id="time_spent" name="time_spent" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" />
    </div>
    <div>
        <button type="submit" class="w-full inline-flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">Tạo task</button>
    </div>
</form>


@endsection