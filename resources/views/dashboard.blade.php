@extends('layouts.main')
@section('title', 'Minhas Tarefas')
@section('content')
@if(count($tasks) == 0)
<div class="body-page">
    <h3>Olá, {{ explode(' ', $user->name)[0] }}!</h3>
    <p>Você está sem tarefas...</p>
    <a class="call w-fit" href="/tasks/create">Clique aqui para criar! >></a>
</div>
@else
<div class="fixed bottom-12 mx-auto flex items-center justify-center gap-5 w-full">
    <a href="?filter=priority" class="btn border border-darkblue hover:bg-darkblue">Ordenar por prioridade</a>
    <a href="?filter=date" class="btn border border-darkblue hover:bg-darkblue">Ordenar por data</a>
    <a href="/dashboard" class="btn border border-darkblue hover:bg-darkblue">Limpar Filtro</a>
</div>
<div class="grid grid-cols-4 gap-5 m-10">
    @foreach($tasks as $task)
    <div class="h-96 text-center p-5 rounded-xl border border-darkblue flex flex-col justify-around">
        <h3 class="text-xl lg:text-2xl text-center font-bold">{{$task->title}}</h3>
        <p>
            @if(\Carbon\Carbon::parse($task->deadline)->isTomorrow())
            AMANHÃ!
            @elseif(\Carbon\Carbon::parse($task->deadline)->isToday())
            <b>HOJE!</b>
            @else
                @if(\Carbon\Carbon::parse($task->deadline)->lessThan(\Carbon\Carbon::now()))
                    <span class="text-lightred font-bold">PENDENTE!</span> -
                @endif
                {{ date('d/m/Y', strtotime($task->deadline)) }}
            @endif
        </p>
        <p>{{$task->description}}</p>
        <a href="/tasks/{{$task->id}}/seemore" class="btn border-darkblue hover:bg-darkblue"><i class="fa-solid fa-book-open"></i> Ler Mais</a>
        <a href="/tasks/edit/{{$task->id}}" class="btn border-darkblue hover:bg-darkblue"><i class="fa-solid fa-pen-to-square"></i> Editar</a>

        <form class="hidden" action="/tasks/{{$task->id}}" method="POST" id="delete-form-{{ $task->id }}">
            @csrf
            @method('DELETE')
        </form>
        <a class="btn bg-mintgreen" href="#" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $task->id }}').submit();"><i class="fa-duotone fa-solid fa-check"></i> Concluída</a>
    </div>
@endforeach
</div>
<div class="text-lg flex flex-col gap-5 w-4/5 m-10 mb-40">
    <a class="call w-fit" href="/tasks/create">Adicionar Nova Tarefa! >></a>
</div>
    
@endif
@endsection