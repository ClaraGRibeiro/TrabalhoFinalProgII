@extends('layouts.main')
@section('title', 'Editar')
@section('content')
<div class="form-container">
    <form class="form" action="/tasks/update/{{$task->id}}" method="POST" id="form">
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
    
        <div class="form-btn">
            <button type="button" class="w-1/2 btn bg-mintgreen" id="updateTaskBtn">Editar Tarefa</button>
        </div>
        <div id="message" class="hidden text-center"></div>

    </form>
</div>

<script>
    document.getElementById('updateTaskBtn').addEventListener('click', function () {
    const form = document.getElementById('form');
    const formData = new FormData(form);
    const taskId = form.getAttribute('action').split('/').pop();
    const message = document.getElementById('message');

    axios.put(`/tasks/update/${taskId}`, {
        title: formData.get('title'),
        description: formData.get('description'),
        priority: formData.get('priority'),
        deadline: formData.get('deadline'),
    })
    .then(response => {
        message.classList.remove('hidden');
        message.classList.remove('text-lightred');
        message.classList.add('text-mintgreen');
        message.innerHTML = `
                Tarefa editada com sucesso! 
                <a class="detail-tarefoco" href="/tasks/${taskId}/seemore" class="text-blue-500 underline">Visualizar</a>
                `;
        setTimeout(() => {
            message.classList.add('hidden');
        }, 3000);
    })
    .catch(error => {
        console.error('Erro ao editar tarefa: ', error);
        message.classList.remove('hidden');
        message.classList.remove('text-mintgreen');
        message.classList.add('text-lightred');
        message.textContent = 'Erro ao editar a tarefa. Tente novamente.';
        setTimeout(() => {
            message.classList.add('hidden');
        }, 3000);
    });
});
</script>
@endsection 