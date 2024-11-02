@extends('layouts.main')
@section('title', 'Início')
@section('content')
<main>
    <div class="text">
        <h2>Como Usar o <span class="detail-tarefoco">Tarefoco</span></h2>
        <p>Usar o <span class="detail-tarefoco">Tarefoco</span> é super fácil e vai te ajudar a manter suas tarefas organizadas em poucos passos! Aqui vai um guia rápido para começar:</p>
        <ol>
            <li><b>Crie sua conta</b>: Cadastre-se rapidamente e faça login para acessar todas as funcionalidades do <span class="detail-tarefoco">Tarefoco</span>.</li>
            <li><b>Adicione suas tarefas</b>: No painel, clique em “Nova Tarefa” e insira o título, descrição, data de vencimento e a prioridade. Assim, fica mais fácil saber o que precisa ser feito primeiro!</li>
            <li><b>Acompanhe seu progresso</b>: Na lista de tarefas, visualize tudo que está pendente e marque as concluídas. Você pode filtrar por prioridade ou buscar tarefas específicas para não perder nada de vista.</li>
            <li><b>Mantenha o foco</b>: Veja quantas tarefas já completou e quantas ainda faltam. Com o <span class="detail-tarefoco">Tarefoco</span>, sua organização está a um clique de distância!</li>
        </ol>
        <p>Agora é só colocar em prática e aproveitar a ajuda do <span class="detail-tarefoco">Tarefoco</span> para conquistar suas metas!</p>
        <br><br>
        <a class="call" href="/register">Crie sua conta e comece já! >></a>
    </div>
    <img src="/img/students.jpg" alt="foto de Clara Ribeiro">
</main>
@endsection