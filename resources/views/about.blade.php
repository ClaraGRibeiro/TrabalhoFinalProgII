@extends('layouts.main')
@section('title', 'Sobre')
@section('content')
<main class="flex flex-col-reverse lg:flex-row items-center justify-center my-8">
    <img class="image mb-8 w-4/5 lg:w-1/4 lg:mb-0" src="/img/clara.png" alt="foto de Clara Ribeiro">
    <div class="m-8 text-lg lg:w-1/2">
        <h2 class="text-2xl font-bold mb-4">Seja bem-vindo ao <span class="detail-tarefoco">Tarefoco</span>!</h2>
        <p>E aí, galera! Eu sou <a href="https://www.linkedin.com/in/clara-gon%C3%A7alves-ribeiro-66b07a213/" target="_blank">Clara Ribeiro</a>, estudante de Sistemas de Informação na Unimontes, e criei este projeto como trabalho final da disciplina Programação II.</p>
        <br>
        <p>Sabendo como a vida de estudante pode ser corrida e cheia de tarefas, a ideia do <span class="detail-tarefoco">Tarefoco</span> é facilitar sua organização e te ajudar a manter o foco no que realmente importa: aprender e brilhar!</p>
        <br>
        <p>Com o <span class="detail-tarefoco">Tarefoco</span>, você pode adicionar suas tarefas, definir prioridades e acompanhar seu progresso de forma simples e divertida. Então, vamos juntos nessa jornada! Organize suas tarefas e conquiste suas metas com o <span class="detail-tarefoco">Tarefoco</span>!</p>
        <br><br>
        <a class="call" href="/register">Crie sua conta e comece já! >></a>
    </div>
</main>
@endsection