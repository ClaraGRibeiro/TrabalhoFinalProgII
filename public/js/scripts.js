function openMenu() {
    document.getElementById("menu").classList.remove("hidden");
    document.getElementById("menu").classList.add("menu-mobile");
    document.getElementById("menu-open").classList.add("hidden");
    document.getElementById("menu-close").classList.remove("hidden");
}
function closeMenu() {
    document.getElementById("menu").classList.add("hidden");
    document.getElementById("menu").classList.remove("menu-mobile");
    document.getElementById("menu-open").classList.remove("hidden");
    document.getElementById("menu-close").classList.add("hidden");
}
document.addEventListener("click", function (event) {
    const menu = document.getElementById("menu");
    const menuOpenButton = document.getElementById("menu-open");
    const menuCloseButton = document.getElementById("menu-close");
    if (
        !menu.contains(event.target) &&
        !menuOpenButton.contains(event.target) &&
        !menuCloseButton.contains(event.target)
    ) {
        closeMenu();
    }
});

setTimeout(() => {
    const messages = document.querySelectorAll(".msg");
    messages.forEach((msg) => {
        msg.classList.add("desapear");
        msg.addEventListener("transitionend", () => {
            msg.style.display = "none";
        });
    });
}, 2500);

function confirmDelete() {
    if (confirm("Tem certeza que deseja excluir sua conta?")) {
        document.getElementById("delete-form-account").submit();
    }
}