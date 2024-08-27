const taskUpdateRoute = "{{ route('task-update', ['task' => ':taskId']) }}";
const taskCompletedRoute = "{{ route('task-completed', ['task' => ':taskId']) }}";

document.getElementById('showTaskForm').addEventListener('click', function() {
    document.getElementById('taskForm').classList.remove('hidden');
});

document.getElementById('hideTaskForm').addEventListener('click', function() {
    document.getElementById('taskForm').classList.add('hidden');
});

document.querySelectorAll('.showUpdateTaskForm').forEach(button => {

    button.addEventListener('click', function() {
        const taskId = this.dataset.id;
        const taskContent = this.dataset.content;
        const taskTimeSpent = this.dataset.time_spent;

        const updateUrl = taskUpdateRoute.replace(':taskId', taskId);
        document.getElementById('updateTaskForm').action = updateUrl;
        document.getElementById('update_id').value = taskId;
        document.getElementById('update_content').value = taskContent;
        document.getElementById('update_time_spent').value = taskTimeSpent;

        document.getElementById('updateTaskForm').classList.remove('hidden');

    });
});

document.getElementById('hideUpdateTaskForm').addEventListener('click', function() {
    document.getElementById('updateTaskForm').classList.add('hidden');
});

document.querySelectorAll('.toggleCompleted').forEach(button => {
button.addEventListener('click', function() {
    const taskId = this.dataset.id;
    const isCompleted = this.dataset.completed;
    const updateUrl = taskCompletedRoute.replace(':taskId', taskId);
    document.getElementById('updateCompleteForm').action = updateUrl;
    
    document.getElementById('update_complete_id').value = taskId;
    document.getElementById('updateCompleteForm').submit();
});
});

