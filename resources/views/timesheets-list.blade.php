@extends('layouts.app')

@section('title')
<h1>Danh sách timesheet của {{$user->name}}</h1>
@endsection

@section('content')
@foreach ($timesheets as $timesheet)
<div>
    <a href="{{ route('tasks-list', ['timesheet' => $timesheet]) }}">{{ $timesheet->date }}</a>
    <div>
        <form action="{{ route('timesheet-delete', $timesheet->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">Delete</button>
        </form>
    </div>
</div>
@endforeach
<div>
    <a href="{{route('timesheets-create')}}">Tạo mới</a>
</div>
<div>
    <a href="{{route('profile')}}">Trở về</a>
</div>
@endsection