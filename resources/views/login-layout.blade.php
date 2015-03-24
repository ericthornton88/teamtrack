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
	<script src="/bower_components/Chart.js/Chart.js"></script>
	<script src="http://code.jquery.com/jquery-2.1.1.min.js"></script>
	<script src="../js/main.js"></script>

	<script>
		var lineChartData = {
			labels : ["January","February","March","April","May","June","July"],
			datasets : [
				{
					label: "My First dataset",
					fillColor : "rgba(220,220,220,0.2)",
					strokeColor : "rgba(220,220,220,1)",
					pointColor : "rgba(220,220,220,1)",
					pointStrokeColor : "#fff",
					pointHighlightFill : "#fff",
					pointHighlightStroke : "rgba(220,220,220,1)",
					data : [65, 59, 80, 81, 56, 55, 40]
				},
				{
					label: "My Second dataset",
					fillColor : "rgba(151,187,205,0.2)",
					strokeColor : "rgba(151,187,205,1)",
					pointColor : "rgba(151,187,205,1)",
					pointStrokeColor : "#fff",
					pointHighlightFill : "#fff",
					pointHighlightStroke : "rgba(151,187,205,1)",
					data : [28, 48, 40, 19, 86, 27, 90]
				}
			]

		}

	window.onload = function(){
		var ctx = document.getElementById("canvas").getContext("2d");
		window.myLine = new Chart(ctx).Line(lineChartData, {
			responsive: true
		});
	}


	</script>
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
			<div class="container-title">Time</div>
			<div class="content">
				<form action="">
					<input type="radio" name="time">Week
					<input type="radio" name="time">30 Days
					<input type="radio" name="time">60 Days
				</form>
			</div>	
		</div>
		<div class="line"></div>
		<div class="nav-container">
			<div class="container-title">Categories</div>
			<div>
				<input type="checkbox">Sleep Length
			</div>
			<div>
				<input type="checkbox">Sleep Quality
			</div>
			<div>
				<input type="checkbox">Tiredness Sensation
			</div>
			<div>
				<input type="checkbox">Training Willingness
			</div>
			<div>
				<input type="checkbox">Appetite
			</div>
			<div>
				<input type="checkbox">Soreness
			</div>
			<div>
				<input type="checkbox">Nutrition
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