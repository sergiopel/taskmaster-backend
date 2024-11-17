<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::with('category')->get();
        return response()->json($tasks);
    }

    public function store(Request $request)
    {

        Log::info('Request data:', $request->all()); // Adiciona log para debug

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
            'completed' => 'boolean'
        ]);

        $task = Task::create($request->only(['title', 'description', 'category_id', 'completed']));
        return response()->json($task->load('category'), 201);
    }

    public function show(Task $task)
    {
        return response()->json($task->load('category'));
    }

    public function update(Request $request, Task $task)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
            'completed' => 'boolean'
        ]);

        $task->update($request->all());
        return response()->json($task->load('category'));
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return response()->json(null, 204);
    }
}
