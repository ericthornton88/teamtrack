<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Team Track</title>
	<link rel="stylesheet" href="<?php echo asset('css/app.css')?>" type="text/css">
	<link rel="stylesheet" href="<?php echo asset('css/styles.css')?>" type="text/css">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
	<link href='http://fonts.googleapis.com/css?family=PT+Sans:400,700' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Roboto:500,900,300,700,400' rel='stylesheet' type='text/css'>
	<script src="/bower_components/handlebars/handlebars.js"></script>
	<script src="http://code.jquery.com/jquery-2.1.1.min.js"></script>
	<script src="../js/main.js"></script>
</head>
<body>
	
	<header>
		<div class="nav-container">
			<div class="nav-logo"><a href="/"><i class="fa fa-users"></i></a></div>
			<div class="title">TEAM TRACK</div>
			<nav>
				<a href="/auth/login">Login</a>
			</nav>
		</div>
	</header>

		@yield('content')

	<footer>
		<div class="copyright">&copy Copyright: Eric Thornton</div>
	</footer>
</body>
</html>