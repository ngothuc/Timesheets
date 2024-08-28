@extends('layouts.admin')

@section('content')
<div class="overflow-x-auto">
    <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-lg">
        <thead class="bg-gray-200">
            <tr>
                <th class="py-3 px-4 text-left text-sm font-medium text-gray-700 w-20">ID</th>
                <th class="py-3 px-4 text-left text-sm font-medium text-gray-700 w-64">Tên</th>
                <th class="py-3 px-4 text-left text-sm font-medium text-gray-700">Email</th>
                <th class="py-3 px-4 text-left text-sm font-medium text-gray-700 w-40">Ngày</th>
                <th class="py-3 px-4 text-left text-sm font-medium text-gray-700">Khó khăn</th>
                <th class="py-3 px-4 text-left text-sm font-medium text-gray-700">Kế hoạch tiếp theo</th>
                <th class="py-3 px-4 text-left text-sm font-medium text-gray-700">Lần cập nhật cuối</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($timesheets as $timesheet)
            @php
                $nextDay = \Carbon\Carbon::parse($timesheet->date)->addDay();
                $isLate = $timesheet->updated_at >= $nextDay;
                $rowClass = $isLate ? 'bg-red-100' : 'bg-green-100';
            @endphp
            <tr class="{{ $rowClass }} border-t">
                <td class="py-2 px-4 text-sm text-gray-900">{{ $timesheet->id }}</td>
                <td class="py-2 px-4 text-sm text-gray-900 w-20">{{ $timesheet->user_name }}</td>
                <td class="py-2 px-4 text-sm text-gray-900">{{ $timesheet->email }}</td>
                <td class="py-2 px-4 text-sm text-gray-900 w-30">{{ $timesheet->date }}</td>
                <td class="py-2 px-4 text-sm text-gray-900">{{ $timesheet->difficulties }}</td>
                <td class="py-2 px-4 text-sm text-gray-900">{{ $timesheet->next_plan }}</td>
                <td class="py-2 px-4 text-sm text-gray-900">{{ $timesheet->updated_at }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
