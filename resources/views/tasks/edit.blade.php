<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Task</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<div class="container mt-5">

    <div class="card">

        <div class="card-header">
            Edit Task
        </div>

        <div class="card-body">

            <form action="{{ route('tasks.update', $task->id) }}" method="POST">

                @csrf
                @method('PUT')

                <label class="form-label">Task</label>

                <input type="text"
                       name="task"
                       class="form-control mb-3"
                       value="{{ $task->task }}">

                <button type="submit" class="btn btn-primary">
                    Update Task
                </button>

                <a href="{{ route('tasks.index') }}" class="btn btn-secondary">
                    Back
                </a>

            </form>

        </div>

    </div>

</div>

</body>
</html>
