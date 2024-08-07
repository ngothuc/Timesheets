@extends('layouts.app')

@section('title')

<h1>Chi tiết task {{$task->content}}</h1>

@endsection

@section('content')
@csrf
<div>
<form method="POST" action="{{route("task-update", ['task' => $task])}}">
    @csrf
    @method('PUT')
    <div>
        <label for="id">ID</label>
        <input type="text" id="id" name="id" value='{{$task->id}}' readonly/>
    </div>
    <div>
        <label for="content">Nội dung</label>
        <input type="text" id="content" name="content" value="{{$task->content}}"/>
    </div>
    <div>
        <label for="time_spent">Thời gian</label>
        <input type="text" id="time_spent" name="time_spent" value="{{$task->time_spent}}"/>
    </div>
    <div>
        <button type="submit">Cập nhật</button>
    </div>
</form>
<form method="POST" action="{{route('task-delete', ['task' => $task])}}">
    @csrf
    @method('DELETE')
    <button type="submit">Xóa</button>
</form>
</div>
<a href="{{route('tasks-list', ['timesheet' => $task->timesheet_id])}}">Trở về</a>

@endsection