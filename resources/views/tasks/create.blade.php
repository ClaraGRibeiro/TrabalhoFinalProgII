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
            <button type="button" class="w-1/2 btn bg-mintgreen" id="createTaskBtn">Criar Tarefa</button>
        </div>
        <div id="message" class="hidden text-center"></div>
        
    </form>
</div>
<script>
    document.getElementById('createTaskBtn').addEventListener('click', function () {
        const form = document.getElementById('form');
        const formData = new FormData(form);
        const message = document.getElementById('message');

        axios.post('/tasks', {
            title: formData.get('title'),
            description: formData.get('description'),
            priority: formData.get('priority'),
            deadline: formData.get('deadline'),
        })
        .then(response => {
            const taskId = response.data.id;
            message.classList.remove('hidden');
            message.classList.remove('text-lightred');
            message.classList.add('text-mintgreen');
            message.innerHTML = `
                Tarefa criada com sucesso! 
                <a class="detail-tarefoco" href="/tasks/${taskId}/seemore" class="text-blue-500 underline">Visualizar</a>
                `;
            form.reset();
            setTimeout(() => {
                message.classList.add('hidden');
            }, 3000);
        })
        .catch(error => {
            console.error('Erro ao criar tarefa: ', error);
            message.classList.remove('hidden');
            message.classList.remove('text-mintgreen');
            message.classList.add('text-lightred');
            message.textContent = 'Erro ao criar a tarefa. Tente novamente.';
            setTimeout(() => {
                message.classList.add('hidden');
            }, 3000);
        });
    });
</script>
@endsection