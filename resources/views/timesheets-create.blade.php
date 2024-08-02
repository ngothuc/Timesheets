@extends('layouts.app')

@section('title')
<h1>Tạo timesheet</h1>
@endsection

@section('content')
<form method="POST" action="{{route('timesheets-store')}}">
    @csrf
    <div>
        <label for="date">Ngày</label>
        <input type="date" name="date" id="date">
    </div>
    <div>
        <label for="difficulties">Khó khăn</label>
        <textarea name="difficulties" id="difficulties" cols="30" rows="10"></textarea>
    </div>
    <div>
        <label for="next_plan">Kế hoạch tiếp theo</label>
        <textarea name="next_plan" id="next_plan" cols="30" rows="10"></textarea>
    </div>
    <div>
        <button type="submit">Tạo</button>
    </div>
</form>
@endsection