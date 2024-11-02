setTimeout(() => {
    const msg = document.getElementById('msg');
    msg.classList.add('hidden');
    msg.addEventListener('transitionend', () => {msg.style.display = 'none';});
}, 3000);

function confirmDelete() {
    if (confirm('Tem certeza que deseja excluir sua conta?')) {
        document.getElementById('delete-form-account').submit();
    }
}