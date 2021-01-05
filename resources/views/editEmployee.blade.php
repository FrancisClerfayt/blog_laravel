<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<title>Laravel</title>
	
	<!-- Fonts -->
	<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
	
	<!-- Styles -->
	<link rel="stylesheet" href="{{asset('css/app.css')}}">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<style>
		html, body {
			background-color: #fff;
			color: #636b6f;
			font-family: 'Nunito', sans-serif;
			font-weight: 200;
			margin: 0;
		}
		
		table {
			border: 1px solid black;
			margin: 2% 0;
		}
		
		.full-height {
			height: 100vh;
		}
		
		.flex-center {
			align-items: center;
			display: flex;
			flex-direction: column;
			justify-content: center;
		}
		
		.position-ref {
			position: relative;
		}
		
		.top-right {
			position: absolute;
			right: 10px;
			top: 18px;
		}
		
		.content {
			text-align: center;
		}
		
		.title {
			font-size: 84px;
		}
		
		.links > a {
			color: #636b6f;
			padding: 0 25px;
			font-size: 13px;
			font-weight: 600;
			letter-spacing: .1rem;
			margin: 2% 0;
			text-decoration: none;
			text-transform: uppercase;
		}
		
		.m-b-md {
			margin-bottom: 30px;
		}
	</style>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-3">
		<a href="" class="navbar-brand">Navbar</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item mx-2">
					<a href="{{ route('home') }}" class="text-white">Accueil</a>
				</li>
				<li class="nav-item mx-2">
					<a href="{{ route('products') }}" class="text-white">Produits</a>
					
				</li>
				<li class="nav-item mx-2">
					<a href="{{ route('employees') }}" class="text-white">Employés</a>
					
				</li>
				<li class="nav-item mx-2">
					<a href="{{ route('companies') }}" class="text-white">Entreprises</a>
				</li>
			</ul>
		</div>
	</nav>
	
	<form action="{{ route('updateEmployee', ['id' => $employee->id]) }}" method="POST">
		@csrf
		<div class="form-group">
			<label for="first_name">Prénom : </label>
			<input type="text" name="first_name" id="first_name" value="{{ $employee->first_name }}">
		</div>
		
		<br>
		<div class="form-group">
			<label for="last_name">Nom : </label>
			<input type="text" name="last_name" id="last_name" value="{{ $employee->last_name }}">
		</div>
		
		<br>
		<div class="form-group">
			<label for="position">Poste : </label>
			<input type="text" name="position" id="position" value="{{ $employee->position }}">
		</div>
		
		<br>
		<div class="form-group">
			<label for="phone">Téléphone : </label>
			<input type="text" name="phone" id="phone" value="{{ $employee->phone }}">
		</div>
		
		<br>
		<div class="form-group">
			<label for="mail">E-mail : </label>
			<input type="email" name="mail" id="mail" value="{{ $employee->mail }}">
		</div>
		
		<br>
		<div class="form-group">
			<label for="company_id">Entreprise : </label>
			<select name="company_id" id="company_id">
				@foreach ($companies as $company)
				@if ($employee->company_id == $company->id)
				<option value=" {{ $company->id }} " selected>
					{{ $company->name }}
				</option>
				@else
				<option value=" {{ $company->id }} ">
					{{ $company->name }}
				</option>
				@endif
				@endforeach
			</select>
		</div>
		<br>
		<input type="submit" value="Envoyer">
	</form>
</body>
</html>