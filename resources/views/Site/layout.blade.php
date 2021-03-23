<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="widith=device-widith, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>@yield('title')</title>
		<!-- Fonte do Google -->
		<script src="https://kit.fontawesome.com/9b4964feb4.js" crossorigin="anonymous"></script>
		<!-- CSS BootStrap -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
		<!--Java Script da Aplicação  -->
		@yield('js_link')
		<!-- CSS Aplicação -->
		@yield('css_link')
	</head>
	<body>
		<header>
			<div class="total">
	            <div class="cabecalho">
	                <div class="cabecalho">
	                    <img src="/img/logo.png">
	                </div>
	                <div class="cabecalho">
						@auth
							<?php
								$user = auth()->user();
							?>
							<div id="mensagem">Bem vindo, {{$user->name}}</div>
						@endauth
						@guest
							<div id="mensagem">Olá Visitante</div>
						@endguest
	                </div>
					<div class="cabecalho">
        				<ul>
            				<li><a href="/">Home</a></li>
							@auth
                				<li><a href="/Despesa/showAll">Despesas</a></li>
                				<li>
									<form action="/logout" method="POST">
									@csrf
									<a href="/logout" 
										onclick="event.preventDefault();
										this.closest('form').submit();">
										Log Out
									</a>
									</form>
								</li>
            				@endauth
            				@guest
								<li><a href="/login">Log in</a></li>
                				<li><a href="/register">Registrar</a></li>
            				@endguest
        				</ul>
    				</div>
	            </div>
        	</div>
    	</header>
	<!-- Flash Mensage -->
		<main>
			<div class="container-fluid">
			<div class="row">
				@if(session('msg'))
					<p class="msg">{{ session('msg')}}</p>
				@endif
			</div>
			</div>
		</main>
		@yield('middle')
		<footer>
		<p>MSA7 &copy; 2021</p>
		</footer>
	</body>
</html>