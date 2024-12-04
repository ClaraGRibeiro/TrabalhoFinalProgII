<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/x-icon" href="/img/icon-logo.svg">
        <title>@yield('title') | Tarefoco✓</title>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100..900&display=swap" rel="stylesheet">
        @vite('resources/css/app.css')
        <link rel="stylesheet" href="/css/styles.css">
        <script src="/js/scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
        <script src="https://kit.fontawesome.com/cc9f72a45c.js" crossorigin="anonymous"></script>
    </head>
    <body>

        @if(session('msg'))
        <p class="msg bg-mintgreen">{{session('msg')}}</p>
        @endif
        @if(session('error'))
        <p class="msg bg-lightred">{{session('error')}}</p>
        @endif

        <header class="bg-darkblue text-lightgrey h-14 flex justify-around items-center relative text-center">

            <a href="/">
                <img class="h-10 lg:h-12" src="/img/light-logo.svg" alt="logo-CR.System">
            </a>

            <h1 class="text-2xl lg:text-4xl text-center font-bold">@yield('title')</h1>

            <div class="link lg:hidden" id="menu-open" onclick="openMenu()"><i class="fa-solid fa-bars"></i></div>
            <div class="link hidden" id="menu-close" onclick="closeMenu()"><i class="fa-solid fa-xmark"></i></div>
            
            <ul id="menu" class="hidden lg:flex lg:items-center lg:gap-6">
                <li><a class="link" href="/"><i class="fa-solid fa-house"></i><br>Início</a></li>
                <li><a class="link" href="/about"><i class="fa-solid fa-circle-info"></i><br>Sobre</a></li>
                @guest
                <li><a class="link" href="/register"><i class="fa-solid fa-user-plus"></i><br>Criar Conta</a></li>
                <li><a class="btn bg-mintgreen" href="/login"><i class="fa-solid fa-right-to-bracket"></i> Login</a></li>
                @endguest
                @auth
                <li><a class="link" href="/tasks/create"><i class="fa-solid fa-circle-plus"></i><br>Criar</a></li>
                <li><a class="link" href="/dashboard"><i class="fa-solid fa-list-check"></i><br>Minhas</a></li>
                <li class="relative group">
                    <a class="link" href="#">
                        <i class="fa-solid fa-circle-user"></i> 
                        <i class="fa-solid fa-chevron-down"></i>
                    </a>
                    <ul class="bg-darkblue absolute z-[999] right-0 top-0 hidden flex-col justify-around w-40 h-28 py-4 px-0 group-hover:flex">
                        <li>
                            <form action="/account" method="POST" id="delete-form-account">
                                @csrf
                                @method('DELETE')
                            </form>
                            <a class="link" href="#" onclick="event.preventDefault(); confirmDelete();">
                                <i class="fa-solid fa-trash"></i> Excluir Conta
                            </a>
                        </li>
                        <li>
                            <form action="/logout" method="POST">
                                @csrf
                                <a class="btn bg-lightred" href="#" onclick="event.preventDefault(); this.closest('form').submit();"><i class="fa-solid fa-right-from-bracket"></i> Logout</a>
                            </form>
                        </li>
                    </ul>
                </li>
                @endauth
            </ul>
        </header>
        @yield('content')
        <footer class="fixed bottom-0 w-full bg-darkblue flex justify-center items-center h-10">
            <p><a class="text-lightgrey transition duration-500 hover:transition hover:duration-300 hover:text-mintgreen" href="https://www.linkedin.com/in/clara-gon%C3%A7alves-ribeiro-66b07a213/" target="_blank">Clara Ribeiro &copy; 2024</a></p>
        </footer>
    </body>
</html>
