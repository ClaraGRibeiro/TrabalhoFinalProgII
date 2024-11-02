@extends('layouts.main')
@section('title', 'Tarefa')
@section('content')
<div class="body-page">
    <h1 class="detail-tarefoco">{{$task->title}}</h1>
    <p><i class="fa-solid fa-calendar"></i> <b>Prazo:</b> {{$task->deadline}}</p>
    <p><i class="fa-solid fa-circle-info"></i> <b>Descrição:</b> {{$task->description}}</p>
    <p><i class="fa-solid fa-triangle-exclamation"></i> <b>Prioridade:</b> {{$task->priority}}</p>
    <form action="/tasks/{{$task->id}}" method="POST" id="delete-form-{{ $task->id }}">
        @csrf
        @method('DELETE')
    </form>
    <a href="#" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $task->id }}').submit();" class="button-green"><i class="fa-duotone fa-solid fa-check"></i> Marcar como Concluída</a>
</div>
@endsection