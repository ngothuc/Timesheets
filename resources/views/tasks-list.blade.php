@extends('layouts.app')

@section('title')
<div>
    <h1>Danh sách công việc ngày {{ $timesheet->date }}</h1>
</div>
<form method="POST" action={{route('')}}>
    @csrf
    @method('PUT')   
    <div>
        <label for="difficulty">Khó khăn</label>
        <textarea id="difficulty" name="difficulty" readonly>{{$timesheet->difficulty}}</textarea>
    </div>
    <div>
        <label for="next_plan">Khó khăn</label>
        <textarea id="next_plan" name="next_plan" readonly>{{$timesheet->next_plan}}</textarea>
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
            <td><a>{{$task->id}}</a></td>
            <td><a>{{$task->content}}</a></td>
            <td><a>{{$task->time_spent}}</a></td>
        </tr>
    </div>
    @endforeach
</table>
<a href="{{route('timesheets-list')}}">Trở về</a>
@endsection