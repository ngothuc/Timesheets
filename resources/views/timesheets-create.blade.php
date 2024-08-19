@extends('layouts.app')

@section('style')
<link rel="stylesheet" href="{{ asset('/css/timesheet-create.css') }}">
@endsection

@section('title')
<h1 class="text-center text-3xl font-bold mb-8">Tạo timesheet</h1>
@endsection

@section('content')
<div class="flex justify-center">
    <div class="w-full max-w-lg bg-white p-8 rounded-lg shadow-lg">
        <form method="POST" action="{{ route('timesheets-store') }}" class="space-y-6">
            @csrf

            <div>
                <label for="date" class="block text-sm font-medium text-gray-700">Ngày</label>
                <input type="date" name="date" id="date" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>

            <div>
                <label for="difficulties" class="block text-sm font-medium text-gray-700">Khó khăn</label>
                <textarea name="difficulties" id="difficulties" cols="30" rows="4" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"></textarea>
            </div>

            <div>
                <label for="next_plan" class="block text-sm font-medium text-gray-700">Kế hoạch tiếp theo</label>
                <textarea name="next_plan" id="next_plan" cols="30" rows="4" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"></textarea>
            </div>

            <div>
                <button type="submit" class="w-full py-2 px-4 bg-blue-600 text-white font-semibold rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Tạo
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
