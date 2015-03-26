<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Dueling Decisions</title>
	<link rel="stylesheet" href="<?php echo asset('css/app.css')?>" type="text/css">
	<link rel="stylesheet" href="<?php echo asset('css/styles.css')?>" type="text/css">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
	<link href='http://fonts.googleapis.com/css?family=PT+Sans:400,700' rel='stylesheet' type='text/css'>
	<script src="/bower_components/handlebars/handlebars.js"></script>
	<script src="/bower_components/Chart.js/Chart.js"></script>
	<script src="http://code.jquery.com/jquery-2.1.1.min.js"></script>
	<script src="../js/main.js"></script>
</head>
<body>
	
	<!-- <header>
		<div class="nav-container">
			<div class="nav-logo"><a href="/"><img src="../img/muscleLogo.jpeg" alt=""></a></div>
			<nav>
				<a href="#">Demo</a>
				<a href="#">Products</a>
				<a href="#">About Us</a>
				<a href="/auth/login">Login</a>
			</nav>
		</div>
	</header> -->

	<div class="user-nav">
		<img src="" alt="">
		<div class="name">{{ Auth::User()->first_name }}</div>
		<div class="line"></div>
		<div class="nav-container">
			@section('time-player')
			<div class="container-title">Time</div>
			<div class="content">
				<form action="">
					<input type="radio" name="time">Week
					<input type="radio" name="time">30 Days
					<input type="radio" name="time">60 Days
				</form>
			</div>	
			@show
		</div>
		<div class="line"></div>
		<div class="nav-container">
			<div class="container-title">Categories</div>
			<div class="overall">
				<input type="radio" name='category' value="overall">Overall
			</div>
			<div class="sleep_length">
				<input type="radio" name='category' value="sleep_length">Sleep Length
			</div>
			<div class="sleep_quality">
				<input type="radio" name='category' value="sleep_quality">Sleep Quality
			</div>
			<div class="tiredness_sensation">
				<input type="radio" name='category' value="tiredness_sensation">Tiredness Sensation
			</div>
			<div class="training_willingness">
				<input type="radio" name='category' value="training_willingness">Training Willingness
			</div>
			<div class="appetite">
				<input type="radio" name='category' value="appetite">Appetite
			</div>
			<div class="soreness">
				<input type="radio" name='category' value="soreness">Soreness
			</div>
			<div class="nutrition">
				<input type="radio" name='category' value="nutrition">Nutrition
			</div>
		</div>
	</div>

		@yield('content')

		@section('footer')
		
		@show

	<!-- <footer>
		<div class="copyright">&copy Eric</div>
		<div class="footer-links">
			<a href="#">Home</a>
			<a href="#">Login/Register</a>
		</div>
	</footer> -->
</body>
</html>