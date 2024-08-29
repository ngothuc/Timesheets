@extends('layouts.user')

@section('title')
<div class="flex items-center mb-6">
    <img src="{{ asset('images/wibu.jpg') }}" alt="Wibu Icon" class="w-10 h-10 mr-3 rounded-full">
    <h1 class="text-4xl text-gray-900 font-semibold" style="font-family: 'Sawarabi Mincho', serif;">Danh sách timesheet của {{$user->name}}</h1>
</div>
@endsection

@section('form-content')
<div class="space-y-4 mx-6">
    @foreach ($timesheets as $timesheet)
    @php
        $dayOfWeek = \Illuminate\Support\Carbon::parse($timesheet->date)->format('l');
        $bgColor = match($dayOfWeek) {
            'Monday' => 'bg-purple-200',
            'Tuesday' => 'bg-red-200',
            'Wednesday' => 'bg-blue-200',
            'Thursday' => 'bg-green-200',
            'Friday' => 'bg-gray-200',
            'Saturday' => 'bg-yellow-200',
            'Sunday' => 'bg-orange-200',
            default => 'bg-white',
        };
    @endphp
    <div class="flex justify-between items-center p-3 {{ $bgColor }} shadow-sm rounded-lg border border-gray-300">
        <div class="flex items-center space-x-3">
            <img src="{{ asset('images/' . $dayOfWeek . '.jpg') }}" alt="Icon" class="w-8 h-8 rounded-full">
            <a href="{{ route('tasks-list', ['timesheet' => $timesheet]) }}" class="text-lg text-blue-500 hover:underline">{{ $timesheet->date }}</a>
        </div>
        <form action="{{ route('timesheet-delete', $timesheet->id) }}" method="POST" class="flex items-center">
            @csrf
            @method('DELETE')
            <button type="submit" class="text-red-500 hover:text-red-700 font-medium">Xóa</button>
        </form>
    </div>
    @endforeach
    <nav class="mt-4">
        {{ $timesheets->links() }}
    </nav>
</div>




<div class="mt-8 flex justify-end space-x-4">
    <a href="{{route('timesheets-create')}}" class="bg-green-600 text-white px-5 py-2.5 rounded-lg shadow hover:bg-green-700 transition ease-in-out duration-150">Tạo mới</a>
    <a href="{{route('profile')}}" class="bg-gray-600 text-white px-5 py-2.5 rounded-lg shadow hover:bg-gray-700 transition ease-in-out duration-150">Trở về</a>
</div>
@endsection
