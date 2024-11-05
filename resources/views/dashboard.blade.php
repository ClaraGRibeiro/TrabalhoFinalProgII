@extends('layouts.main')
@section('title', 'Minhas Tarefas')
@section('content')
@if(count($tasks) == 0)
<div class="body-page">
<h3>Olá, {{ explode(' ', $user->name)[0] }}!</h3>
<p>Você está sem tarefas...</p>
<a class="call" href="/tasks/create">Clique aqui para criar! >></a>
</div>
@else
<div class="filters">
    <a href="?filter=priority" class="button-blue">Ordenar por prioridade</a>
    <a href="?filter=date" class="button-blue">Ordenar por data</a>
    <a href="/dashboard" class="button-blue">Limpar Filtro</a>
</div>
<div class="tasks">
    @foreach($tasks as $task)
    <div class="card-task">
        <h3>{{$task->title}}</h3>
        <p>
            @if(\Carbon\Carbon::parse($task->deadline)->isTomorrow())
            AMANHÃ!
            @elseif(\Carbon\Carbon::parse($task->deadline)->isToday())
            <b>HOJE!</b>
            @else
                @if(\Carbon\Carbon::parse($task->deadline)->lessThan(\Carbon\Carbon::now()))
                    <span class="pending">PENDENTE!</span> -
                @endif
                {{ date('d/m/Y', strtotime($task->deadline)) }}
            @endif
        </p>
        <p>{{$task->description}}</p>
        <a href="/tasks/{{$task->id}}/seemore" class="button-blue"><i class="fa-solid fa-book-open"></i> Ler Mais</a>
        <a href="/tasks/edit/{{$task->id}}" class="button-blue"><i class="fa-solid fa-pen-to-square"></i> Editar</a>

        <form action="/tasks/{{$task->id}}" method="POST" id="delete-form-{{ $task->id }}" style="display: none">
            @csrf
            @method('DELETE')
        </form>
        <a href="#" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $task->id }}').submit();" class="button-green"><i class="fa-duotone fa-solid fa-check"></i> Marcar como Concluída</a>
    </div>
@endforeach
</div>
<div class="body-page">
    <a class="call" href="/tasks/create">Adicionar Nova Tarefa! >></a>
</div>
    
@endif
@endsection