<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title') | Tarefoco✓</title>

        <link rel="stylesheet" href="/css/styles.css">
        <script src="/js/scripts.js"></script>
        <script src="https://kit.fontawesome.com/cc9f72a45c.js" crossorigin="anonymous"></script>
    </head>
    <body>
        @if(session('msg'))
        <p class="sucess msg">{{session('msg')}}</p>
        @endif
        @if(session('error'))
        <p class="error msg">{{session('error')}}</p>
        @endif
        <header>
            <a href="/"><img src="/img/light-logo.svg" alt="logo-CR.System"></a>
            <h1>@yield('title')</h1>
            <div class="link" id="menu-open" onclick="openMenu()"><i class="fa-solid fa-bars"></i></div>
            <div class="link" id="menu-close" onclick="closeMenu()"><i class="fa-solid fa-xmark"></i></div>
            <ul id="menu">
                <li><a class="link" href="/"><i class="fa-solid fa-house"></i><br>Início</a></li>
                <li><a class="link" href="/about"><i class="fa-solid fa-circle-info"></i><br>Sobre</a></li>
                @guest
                <li><a class="link" href="/register"><i class="fa-solid fa-user-plus"></i><br>Criar Conta</a></li>
                <li><a class="button-green" href="/login"><i class="fa-solid fa-right-to-bracket"></i> Login</a></li>
                @endguest
                @auth
                <li><a class="link" href="/tasks/create"><i class="fa-solid fa-circle-plus"></i><br>Criar</a></li>
                <li><a class="link" href="/dashboard"><i class="fa-solid fa-list-check"></i><br>Minhas</a></li>
                <li class="dropdown-button">
                    <a class="link" href="#"><i class="fa-solid fa-circle-user"></i><br><i class="fa-solid fa-chevron-down"></i></a>
                    <ul class="dropdown">
                        <li class="dropdown-item">
                            <form action="/account" method="POST" id="delete-form-account">
                                @csrf
                                @method('DELETE')
                            </form>
                            <a href="#" onclick="event.preventDefault(); confirmDelete();" class="link">
                                <i class="fa-solid fa-trash"></i> Excluir Conta
                            </a>
                        </li>
                        <li class="dropdown-item">
                            <form action="/logout" method="POST">
                                @csrf
                                <a class="button-red" href="#" onclick="event.preventDefault(); this.closest('form').submit();"><i class="fa-solid fa-right-from-bracket"></i> Logout</a>
                            </form>
                        </li>
                    </ul>
                </li>               
                @endauth
            </ul>
        </header>
        @yield('content')
        <footer>
            <p><a href="https://www.linkedin.com/in/clara-gon%C3%A7alves-ribeiro-66b07a213/" target="_blank">Clara Ribeiro &copy; 2024</a></p>
        </footer>
    </body>
</html>
