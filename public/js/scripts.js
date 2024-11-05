function openMenu() {
    document.getElementById('menu').style.display = 'flex';
    document.getElementById('menu-open').style.display = 'none';
    document.getElementById('menu-close').style.display = 'block';
}
function closeMenu() {
    document.getElementById('menu').style.display = 'none';
    document.getElementById('menu-open').style.display = 'block';
    document.getElementById('menu-close').style.display = 'none';
}

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