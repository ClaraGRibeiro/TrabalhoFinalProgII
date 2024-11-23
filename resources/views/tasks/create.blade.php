@extends('layouts.main')
@section('title', 'Criar')
@section('content')
<div class="form-container">
    <form class="form" action="/tasks" method="POST" id="form">
        @csrf
        <div class="form-group">
            <label for="title">Título da Tarefa</label>
            <input type="text" name="title" id="title" required autofocus>
        </div>
    
        <div class="form-group">
            <label for="description">Descrição da Tarefa</label>
            <textarea name="description" id="description" rows="3"></textarea>
        </div>
    
        <div class="form-group">
            <label for="priority">Prioridade (1 a 10)</label>
            <input type="number" name="priority" id="priority" min="1" max="10" required>
        </div>
    
        <div class="form-group">
            <label for="deadline">Data e Hora de Vencimento</label>
            <input type="datetime-local" name="deadline" id="deadline" required>
        </div>
    
        <div class="form-btn">
            <a class="w-1/2 btn bg-mintgreen" href="#" onclick="document.getElementById('form').submit(); return false;">Criar Tarefa</a>
        </div>
    </form>
    
</div>
@endsection