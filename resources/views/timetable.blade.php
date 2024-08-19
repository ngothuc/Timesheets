@extends('layouts.app')

@section('style')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@endsection

@section('title')
<h1>Time table</h1>
@endsection

@section('content')
<div class="row">
    <div class="col-md-6">
        <div id="datePicker"></div>
    </div>

    <div class="col-md-6">
        <h3>Tasks on <span id="selectedDate"></span></h3>
        <div id="tasks">
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    flatpickr("#datePicker", {
        inline: true,
        onChange: function(selectedDates, dateStr, instance) {
            fetchTasks(dateStr);
        }
    });

    function fetchTasks(date) {
        document.getElementById('selectedDate').textContent = date;
        fetch(`/timesheets/tasks/${date}`)
            .then(response => response.json())
            .then(data => {
                let tasksDiv = document.getElementById('tasks');
                tasksDiv.innerHTML = '';
                if (data.length > 0) {
                    data.forEach(task => {
                        tasksDiv.innerHTML += `
                            <div class="task">
                                <h4>${task.name}</h4>
                                <p>Difficulties: ${task.difficulties}</p>
                                <p>Next Plan: ${task.next_plan}</p>
                            </div>`;
                    });
                } else {
                    tasksDiv.innerHTML = '<p>No tasks for this day.</p>';
                }
            })
            .catch(error => console.error('Error fetching tasks:', error));
    }

    let today = new Date().toISOString().split('T')[0];
    fetchTasks(today);
});
</script>
@endsection
