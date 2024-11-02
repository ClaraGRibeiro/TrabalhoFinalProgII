setTimeout(() => {
    const messages = document.querySelectorAll('.msg');
    messages.forEach(msg => {
        msg.classList.add('hidden');
        msg.addEventListener('transitionend', () => {
            msg.style.display = 'none';
        });
    });
}, 2500);

function confirmDelete() {
    if (confirm('Tem certeza que deseja excluir sua conta?')) {
        document.getElementById('delete-form-account').submit();
    }
}