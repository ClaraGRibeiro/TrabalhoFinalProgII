@extends('layouts.main')
@section('title', 'Editar')
@section('content')
<div class="form">
    <form action="/tasks/update/{{$task->id}}" method="POST" id="form">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Título da Tarefa</label>
            <input type="text" name="title" id="title" required autofocus value="{{$task->title}}">
        </div>
    
        <div class="form-group">
            <label for="description">Descrição da Tarefa</label>
            <textarea name="description" id="description" rows="3">{{$task->description}}</textarea>
        </div>
    
        <div class="form-group">
            <label for="priority">Prioridade (1 a 10)</label>
            <input type="number" name="priority" id="priority" min="1" max="10" required value="{{$task->priority}}">
        </div>
    
        <div class="form-group">
            <label for="deadline">Data e Hora de Vencimento</label>
            <input type="datetime-local" name="deadline" id="deadline" required value="{{$task->deadline}}">
        </div>
    
        <div class="form-button">
            <a href="#" onclick="document.getElementById('form').submit(); return false;" class="button-green">Editar Tarefa</a>
        </div>
    </form>
    
</div>
@endsection 