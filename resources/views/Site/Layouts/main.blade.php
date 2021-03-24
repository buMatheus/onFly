<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>@yield('title')</title>
        <!-- Fonte -->
        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700&display=swap" rel="stylesheet">
        <!-- CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <!-- CSS Aplicação -->
        @yield('css_link')
        <!-- Scripts -->
        <script
            src="https://code.jquery.com/jquery-3.4.1.min.js"
            integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
            crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <script src="../../js/jquery.mask.min.js"></script>
    </head>
	<body>
    <header>
        <div class="container" id="nav-container">
            <nav class="navbar navbar-expand-lg navbar-dark">
                <a class="navbar-brand" href="index.html">
                    <img id="logo" src="/../img/logo.png" alt="On Fly">
                </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-links" aria-controls="navbar-links" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                @auth
                    <?php
                        $user = auth()->user();
                    ?>
                    <div id="mensagem">Bem vindo, {{$user->name}}</div>
                @endauth
                @guest
                    <div id="mensagem">Olá Visitante</div>
                @endguest
                <div class="collapse navbar-collapse justify-content-end" id="navbar-links">
                    <div class="navbar-nav">
                        <a class="nav-item nav-link" id="home-menu" href="/">Home</span></a>
                        @auth
                            <a class="nav-item nav-link" id="home-menu" href="/Despesa/showAll">Despesas</a>
                            <form action="/logout" method="POST">
                            @csrf
                                <a class="nav-item nav-link" id="home-menu" href="/logout" 
                                    onclick="event.preventDefault();
                                    this.closest('form').submit();">
                                    Log Out
                                </a>
                            </form>
                        @endauth
                        @guest
                            <a class="nav-item nav-link" id="about-menu" href="/login">Login</a>
                            <a class="nav-item nav-link" id="services-menu" href="/register">Registrar</a>
                        @endguest
                    </div>
                </div>
            </nav>
        </div>
    </header>
	<!-- Flash Mensage -->
	<main>
        @yield('middle')
    </div>
	</main>
	<footer>
        <p>Desenvolvido por <a target="_blank">MSA7</a> &copy; 2021</p>
    </footer>
    <!--Java Script da Aplicação  -->
    @yield('js_link')
    </body>
</html>