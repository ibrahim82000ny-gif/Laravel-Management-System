<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task List</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<div class="container mt-4">

    <h3 class="mb-4">Task List</h3>

    <!-- New Task -->
    <div class="card mb-4">

        <div class="card-header">
            New Task
        </div>

        <div class="card-body">

            <form action="{{ route('tasks.store') }}" method="POST">

                @csrf

                <label class="form-label">Task</label>

                <input type="text" name="task" class="form-control mb-3" placeholder="Enter a task">

                <button type="submit" class="btn btn-primary">
                    + Add Task
                </button>

            </form>

        </div>
    </div>

    <!-- Current Tasks -->
    <div class="card">

        <div class="card-header">
            Current Tasks
        </div>

        <div class="card-body">

            <table class="table table-striped">

                <thead>
                    <tr>
                        <th>Task</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>

                    @foreach($tasks as $task)

                    <tr>

                        <td>{{ $task->task }}</td>

                        <td>

                            <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-info btn-sm">
                                Edit
                            </a>

                            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline">

                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger btn-sm">
                                    Delete
                                </button>

                            </form>

                        </td>

                    </tr>

                    @endforeach

                </tbody>

            </table>

        </div>
    </div>

</div>

</body>
</html>
