<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function index() {
        return view('home');
    }

    public function dashboard(Request $request) {

        $user = auth()->user();

        $tasksQuery = $user->tasks();
        
        if ($request->has('filter')) {
            if ($request->filter === 'priority') {
                $tasksQuery->orderBy('priority', 'asc');
            } elseif ($request->filter === 'date') {
                $tasksQuery->orderBy('deadline', 'asc');
            }
        }

        $tasks = $tasksQuery->get();
    
        return view('dashboard', ['tasks' => $tasks, 'user' => $user]);
    }

    public function about(){
        return view('about');
    }

    public function create(){
        return view('tasks.create');
    }

    public function store(Request $request){
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'priority' => 'required|integer|min:1|max:10',
            'deadline' => 'required|date',
        ]);
    
        $task = new Task();
        $task->fill($validated);
        $task->user_id = auth()->id();
        $task->status = 0;
        $task->save();
    
        if ($request->expectsJson()) {
            return response()->json(['success' => true, 'task' => $task, 'id' => $task->id]);
        }
    
        return redirect('/dashboard')->with('msg', 'Tarefa criada!');
    }

    public function show($id){
        $task = Task::findOrFail($id);
        return view('tasks.show', ['task' => $task]);
    }

    public function edit($id) {
        $task = Task::findOrFail($id);
    
        return view('tasks.edit', ['task' => $task]);
    }

    public function update(Request $request) {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'priority' => 'required|integer|min:1|max:10',
            'deadline' => 'required|date',
        ]);
    
        $task = Task::findOrFail($request->id);
        $task->update($validated);
    
        if ($request->expectsJson()) {
            return response()->json(['success' => true, 'message' => 'Tarefa editada com sucesso!']);
        }
    
        return redirect('/dashboard')->with('msg', 'Tarefa editada!');
    }

    public function destroy($id) {
        $task = Task::findOrFail($id);

        if ($task->user_id == auth()->id()) {
            $task->delete();
            return redirect('/dashboard')->with('msg', 'Tarefa marcada como concluída!');
        }
    
        return redirect('/dashboard')->with('error', 'Acesso negado.');
    }
    
    public function status($id){
        $msg = '';
        $task = Task::findOrFail($id);
        if($task->status == 0){
            $task->status = 1;
            $msg = 'Tarefa marcada como concluída!';
        } else{
            $task->status = 0;
            $msg = 'Tarefa marcada como não concluída!';
        }

        $task->save();
        return redirect('/dashboard')->with('msg', $msg);
    }
}
