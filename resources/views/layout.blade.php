<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Dueling Decisions</title>
	<link rel="stylesheet" href="<?php echo asset('css/app.css')?>" type="text/css">
	<link rel="stylesheet" href="<?php echo asset('css/styles.css')?>" type="text/css">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
	<link href='http://fonts.googleapis.com/css?family=PT+Sans:400,700' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
	<script src="/bower_components/handlebars/handlebars.js"></script>
	<script src="http://code.jquery.com/jquery-2.1.1.min.js"></script>
	<script src="../js/main.js"></script>
</head>
<body>
	
	<header>
		<div class="nav-container">
			<div class="nav-logo"><img src="../img/muscleLogo.jpeg" alt=""></div>
			<nav>
				<a href="#">Demo</a>
				<a href="#">Products</a>
				<a href="#">About Us</a>
				<a href="#">Login</a>
			</nav>
		</div>
	</header>

		@yield('content')

		@section('footer')
		
		@show

	<footer>
		<div class="copyright">content</div>
		<div class="footer-links">
			<a href="#">Home</a>
			<a href="#">Login/Register</a>
		</div>
	</footer>
</body>
</html>