@extends('Site/Layouts/main')
@section('css_link')
    <link rel="stylesheet" href="/css/Login/login.css">
@endsection
@section('title', 'Registrar')
@section('usuario', 'Olá Visitante')
@section('middle')
    <mid>
		<div class="container">
			<div class="content first-content">
				<div class="first-column">
					<h2 class="title title-primary">Bem vindo de volta</h2>
					<p class="description description-primary">Para continuar conectado com a gente</p>
					<p class="description description-primary">por favor, entre com suas informações pessoais</p>
					<buttom id="signin" class="btn btn-primary"> Log in</buttom>
				</div><!-- First column -->
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
					<form class="form">
						<label class="label-input">
							<i class="far fa-user icon-modify"></i>
							<input type="text" placeholder="Usuario">
						</label>
						<label class="label-input">
							<i class="fas fa-key icon-modify"></i>
							<input type="password" placeholder="Senha">
						</label>
						<label class="label-input">
							<i class="far fa-envelope icon-modify"></i>
							<input type="email" placeholder="Email">
						</label>
						<button class="btn btn-second">Sing up</button>
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
					<p class="description">Ou use seu nome de usuário:</p>
					<form class="form">
						<label class="label-input">
							<i class="far fa-user icon-modify"></i>
							<input type="text" placeholder="Usuario">
						</label>
						<label class="label-input">
							<i class="fas fa-key icon-modify"></i>
							<input type="password" placeholder="Senha">
						</label>
						<a class="password" href="#">Esqueceu sua senha?</a>
						<button class="btn btn-second">Sing in</button>
					</form>
				</div> <!-- Second Column -->
			</div><!-- Second content -->
		</div><!-- Container -->
    </mid>
@endsection
@section('js_link')
    <script src="/js/jsCadastro.js"></script>
@endsection