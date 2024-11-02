@extends('layouts.main')
@section('title', 'Tarefa')
@section('content')
<div class="body-page">
    <h1 class="detail-tarefoco">{{$task->title}}</h1>
    <p><i class="fa-solid fa-calendar"></i> <b>Prazo:</b> {{$task->deadline}}</p>
    <p><i class="fa-solid fa-circle-info"></i> <b>Descrição:</b> {{$task->description}}</p>
    <p><i class="fa-solid fa-triangle-exclamation"></i> <b>Prioridade:</b> {{$task->priority}}</p>
    <a href="#" class="button-green">Concluir</a>
</div>
@endsection