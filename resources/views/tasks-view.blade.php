@extends('layouts.app')

@section('nav-bar')
<h1>Danh sách công việc</h1>
@endsection

@section('content')
@foreach ($tasks as $task)
<div>
    <a>
        {{$task->content}}
    </a>
</div>
@endforeach
@endsection