@extends('layouts.main')
@section('title', 'Início')
@section('content')
<main class="flex flex-col lg:flex-row items-center justify-center my-8">
    <div class="m-8 text-lg lg:w-1/2">
        <h2 class="text-2xl font-bold mb-4">Como Usar o <span class="detail-tarefoco">Tarefoco</span></h2>
        <p>Usar o <span class="detail-tarefoco">Tarefoco</span> é super fácil e vai te ajudar a manter suas tarefas organizadas em poucos passos! Aqui vai um guia rápido para começar:</p>
        <ol class="mx-8 my-4">
            <li class="list-decimal indent-4"><b>Crie sua conta</b>: Cadastre-se rapidamente e faça login para acessar todas as funcionalidades do <span class="detail-tarefoco">Tarefoco</span>.</li>
            <li class="list-decimal indent-4"><b>Adicione suas tarefas</b>: No painel, clique em “Criar” e insira o título, descrição, data de vencimento e a prioridade. Assim, fica mais fácil saber o que precisa ser feito primeiro!</li>
            <li class="list-decimal indent-4"><b>Acompanhe seu progresso</b>: Na lista de tarefas, visualize tudo que está pendente e marque as concluídas. Você pode filtrar por prioridade ou por data para não perder nada de vista.</li>
            <li class="list-decimal indent-4"><b>Mantenha o foco</b>: Com o <span class="detail-tarefoco">Tarefoco</span>, sua organização está a um clique de distância!</li>
        </ol>
        <p>Agora é só colocar em prática e aproveitar a ajuda do <span class="detail-tarefoco">Tarefoco</span> para conquistar suas metas!</p>
        <br><br>
        <a class="call" href="/register">Crie sua conta e comece já! >></a>
    </div>
    <img class="image mb-8 w-4/5 lg:w-2/6 lg:mb-0" src="/img/students.jpg" alt="foto de estudantes">
</main>
@endsection