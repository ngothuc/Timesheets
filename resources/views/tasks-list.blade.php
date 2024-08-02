@extends('layouts.app')

@section('title')
<h1>Danh sách công việc ngày {{ $timesheet->date }}</h1>
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