<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    // عرض المهام
    public function index()
    {
        $tasks = Task::all();

        return view('tasks.index', compact('tasks'));
    }

    // إضافة مهمة
    public function store(Request $request)
    {
        $request->validate([
            'task' => 'required'
        ]);

        Task::create([
            'task' => $request->task
        ]);

        return redirect()->route('tasks.index');
    }

    // تعديل المهمة
    public function edit($id)
    {
        $task = Task::findOrFail($id);

        return view('tasks.edit', compact('task'));
    }

    // حفظ التعديل
    public function update(Request $request, $id)
    {
        $request->validate([
            'task' => 'required'
        ]);

        $task = Task::findOrFail($id);

        $task->update([
            'task' => $request->task
        ]);

        return redirect()->route('tasks.index');
    }

    // حذف المهمة
    public function destroy($id)
    {
        $task = Task::findOrFail($id);

        $task->delete();

        return redirect()->route('tasks.index');
    }
}
