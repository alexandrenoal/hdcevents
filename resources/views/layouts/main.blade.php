<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <!-- Fonte do Google -->        
        <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">

        <!-- CSS Bootstrap-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

        <!-- CSS da aplicação-->

        <link rel="stylesheet" href="/css/styles.css">
        <script src="/js/scripts.js"></script>
    </head>
    <body>
        <header>
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="collapse navbar-collapse id="navbar">
                    <a href="/" class="navbar-brand">
                        <img src="/img/duo.png" alt="HDC Events">
                    </a>
                    <ul Class="navbar-nav">
                        <li class="nav-item">
                            <a href="/" class="nav-link">Eventos</a>
                        </li>      
                        <li class="nav-item">
                            <a href="/events/create" class="nav-link">Criar Eventos</a>
                        </li>              
                          
                        <li class="nav-item">
                            <a href="/convidados" class="nav-link">Convidados</a>
                        </li>   
                                                   
                                                
                        @auth
                        <li class="nav-item">
                            <a href="/dashboard" class="nav-link">Meus eventos</a>
                        </li> 
                        <li class="nav-item">
                            <form action="/logout" method="post">
                            @csrf
                            <a href="/logout" class="nav-link" onclick="event.preventDefault();
                                this.closest('form').submit();">Sair</a>
                            </form>
                        </li> 
                        @endauth
                        @guest
                        <li class="nav-item">
                            <a href="/login" class="nav-link">Entrar</a>
                        </li> 
                        <li class="nav-item">
                            <a href="/register" class="nav-link">Cadastrar</a>
                        </li>        
                        @endguest
                    </ul>
                </div>
            </nav> 
        </header>
        <main>
            <div class"container-fluid">
                <div class="row">
                    @if(session('msg'))
                        <p class="msg">{{ session('msg') }}</p>
                    @endif
                    @yield('content')
                </div>
            </div>
        <footer>
         <p>HDC Events &copy; 2023</p>
        </footer>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    </body>
</html>
