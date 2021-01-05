<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<title>Laravel</title>
	
	<!-- Fonts -->
	<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
	
	<!-- Styles -->
	<link rel="stylesheet" href="{{ asset('css/app.css') }}">
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
	
	<div class="container">
		<div class="row">
			<div class="col-sm-8 offset-sm-2">
				<h1 class="display-3">Add a Company</h1>
				<div>
					@if ($errors->any())
					<div class="alert alert-danger">
						<ul>
							@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
							@endforeach
						</ul>
					</div>
					<br>
					@endif
					<form method="POST" action="{{ route('storeCompany') }}">
						@csrf
						<div class="form-group">
							<label for="name">Company name :</label>
							<input type="text" class="form-control" name="name"/>
						</div>
						
						<div class="form-group">
							<label for="address">Address :</label>
							<input type="text" class="form-control" name="address"/>
						</div>

						<div class="form-group">
							<label for="city">City :</label>
							<input type="text" class="form-control" name="city"/>
						</div>

						<div class="form-group">
							<label for="zip_code">ZIP Code :</label>
							<input type="text" class="form-control" name="zip_code"/>
						</div>

						<div class="form-group">
							<label for="annual_sales">Annual sales :</label>
							<input type="text" class="form-control" name="annual_sales"/>
						</div>
						                        
						<button type="submit" class="btn btn-primary">Add Company</button>
						
					</form>
				</div>
			</div>
		</div>
	</div>
	<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>