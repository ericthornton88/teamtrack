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
	<script src="/bower_components/jquery/dist/jquery.js"></script>
	<script src="../js/main.js"></script>
</head>
<body>
	
	{{-- <div class="user-options">
		<div>User</div>
		<div>
			<div>Hey</div>
			<div>there</div>
			<div>hi</div>
		</div>
	</div> --}}

	<div class="user-nav">
		<img src="/img/FunnySportNerdProfile.jpg">
		<div class="name">Hello {{ Auth::User()->first_name }}</div>
		<div class="line"></div>
		<div class="nav-container">
			@section('time-player')
			
			@show
		</div>
		@section('category-options')
		<div class="nav-container all-categories">
			<div class="container-title">Categories
				<input id="hidden-id" type="hidden" value="{{ Auth::User()->user_id }}">
			</div>
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
		@show
	</div>

		@yield('content')
			
		@section('footer')
		
		@show
</body>
</html>