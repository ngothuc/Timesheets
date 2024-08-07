@extends('layouts.app')

@section('title')
<h1>Tạo task cho timesheet ngày {{$timesheet->date}}</h1>
@endsection

@section('content')

<form method="POST" action="{{route("task-store", ['timesheet' => $timesheet])}}">
    @csrf
    <div>
        <label for="content">Nội dung</label>
        <input type="text" id="content" name="content" />
    </div>
    <div>
        <label for="time_spent">Số giờ làm việc</label>
        <input type="number" id="time_spent" name="time_spent" />
    </div>
    <div>
        <button type="submit">Tạo task</button>
    </div>
</form>

@endsection