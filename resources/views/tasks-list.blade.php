@extends('layouts.app')

@section('title')
<div>
    <h1>Chi tiết timesheet</h1>
</div>
<form method="POST" action="{{route('timesheet-update', ['timesheet' => $timesheet])}}">
    @csrf
    @method('PUT')   
    <div>
        <label for="date">Ngày</label>
        <input type="date" id="date" name="date" value="{{$timesheet->date}}">
    </div>
    <div>
        <label for="difficulties">Khó khăn</label>
        <textarea id="difficulties" name="difficulties">{{$timesheet->difficulties}}</textarea>
    </div>
    <div>
        <label for="next_plan">Kế hoạch</label>
        <textarea id="next_plan" name="next_plan">{{$timesheet->next_plan}}</textarea>
    </div>
    <div>
        <button type="submit">Sửa timesheet</button>
    </div>
</form>
@endsection

@section('content')
<table>
    <tr>
        <th>ID</th>
        <th>Nội dung</th>
        <th>Thời gian</th>
    </tr>
    @foreach ($tasks as $task)
    <div>
        <tr>
            <td>{{$task->id}}</td>
            <td>{{$task->content}}</td>
            <td>{{$task->time_spent}}</td>
            <td><a href="{{route('task-view', ['task' => $task])}}">Chi tiết</a></td>
        </tr>
    </div>
    @endforeach
</table>
<a href="{{route('timesheets-list')}}">Trở về</a>
<a href="{{route('task-create', ['timesheet' => $timesheet])}}">Tạo task</a>

@endsection