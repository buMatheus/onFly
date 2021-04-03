@extends('Site.Layouts.main')
@section('css_link')
    <link rel="stylesheet" href="/css/Login/login.css">
@endsection
@section('title', 'Registrar')
@section('usuario', 'Olá Visitante')
@section('middle')
	<div class="container-middle">
		<div class="content first-content">
			<div class="first-column">
				<h2 class="title title-primary">Bem vindo de volta</h2>
				<p class="description description-primary">Para continuar conectado com a gente</p>
				<p class="description description-primary">por favor, entre com suas informações pessoais</p>
				<buttom id="signin" class="btn btn-primary"> Log in</buttom>
			</div><!-- First column -->
			<!--Registrar-->
			<div class="second-column">
				<h2 class="title title-second">Criar conta</h2>
				<div class="social-media">
					<ul class="list-social-media">
						<a class="link-social-media" href="#">
							<li class="item-social-media">
								<i class="fab fa-google"></i>
							</li>
						</a>
						<a class="link-social-media" href="#">
							<li class="item-social-media">
								<i class="fab fa-facebook"></i>
							</li>
						</a>
						<a class="link-social-media" href="#">
							<li class="item-social-media">
								<i class="fab fa-linkedin"></i>
							</li>
						</a>
					</ul>
				</div><!-- Social Media -->
				<p class="description description-second">ou use seu e-mail para se registrar</p>
				<form class="form" method="POST" action="{{ route('register') }}">
					@csrf
						<label class="label-input">
							<i class="far fa-user icon-modify"></i>
							<input placeholder="Nome" type="text" id="name" class="block mt-1 w-full" name="name" :value="old('name')" required autofocus autocomplete="name">
						</label>
                        <label class="label-input">
							<i class="far fa-envelope icon-modify"></i>
							<input type="email" placeholder="Email"id="email" class="block mt-1 w-full" name="email" :value="old('email')" required>
						</label>
						<label class="label-input">
							<i class="fas fa-key icon-modify"></i>
							<input type="password" placeholder="Senha" id="password" class="block mt-1 w-full" name="password" required autocomplete="new-password">
						</label>
                        <label class="label-input">
							<i class="fas fa-key icon-modify"></i>
							<input type="password" placeholder="Confirme sua senha" id="password_confirmation" class="block mt-1 w-full" name="password_confirmation" required autocomplete="new-password">
						</label>
						<button class="btn btn-second">
							{{ __('Registrar') }}
						</button>
				</form>
			</div> <!-- Second Column -->
		</div><!-- First content -->
		<div class="content second-content">
			<div class="first-column">
				<h2 class="title title-primary">Olá, visitante</h2>
				<p class="description description-primary">Entre com seus dados pessoais</p>
				<p class="description description-primary">Comece sua viagem com a gente!</p>
				<buttom  id="signup" class="btn btn-primary"> Registre-se</buttom>
			</div><!-- First column -->
			<div class="second-column">
				<h2 class="title title-second">Entre no sistema</h2>
				<div class="social-media">
					<ul class="list-social-media">
						<a class="link-social-media" href="#">
							<li class="item-social-media">
								<i class="fab fa-google"></i>
							</li>
						</a>
						<a class="link-social-media" href="#">
							<li class="item-social-media">
								<i class="fab fa-facebook"></i>
							</li>
						</a>
						<a class="link-social-media" href="#">
							<li class="item-social-media">
								<i class="fab fa-linkedin"></i>
							</li>
						</a>
					</ul>
				</div><!-- Social Media -->
				<p class="description">Ou use seu email:</p>
				<form class="form" method="POST" action="{{ route('login') }}">
					@csrf
						<label class="label-input">
						<i class="far fa-envelope icon-modify"></i>
							<input type="email" placeholder="Email" id="email" class="block mt-1 w-full" name="email" :value="old('email')" required autofocus>
						</label>
						<label class="label-input">
							<i class="fas fa-key icon-modify"></i>
							<input type="password" placeholder="Senha" id="password" class="block mt-1 w-full" name="password" required autocomplete="current-password">
						</label>
						@if (Route::has('password.request'))
							<a href="{{ route('password.request') }}">
								{{ __('Esqueceu sua senha?') }}
							</a>
						@endif
                        <div id="entrar">
						    <button class="btn btn-second">Entrar</button>
                        </div>
				</form>
			</div> <!-- Second Column -->
		</div><!-- Second content -->
	</div><!-- Container -->
@endsection
@section('js_link')
    <script src="/js/jsCadastro.js"></script>
@endsection