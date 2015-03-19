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
		<div class="nav-logo"><img src="../img/muscleLogo.jpeg" alt=""></div>
		<div class="nav-logo"></div>
		<div class="btn-group open">
		  <a class="btn btn-primary" href="#"><i class="fa fa-user fa-fw"></i> User</a>
		  <ul class="dropdown-menu expand-btn-group">
		    <li><a href="#"><i class="fa fa-pencil fa-fw"></i> Edit</a></li>
		    <li><a href="#"><i class="fa fa-trash-o fa-fw"></i> Delete</a></li>
		    <li><a href="#"><i class="fa fa-ban fa-fw"></i> Ban</a></li>
		    <li class="divider"></li>
		    <li><a href="#"><i class="i"></i> Make admin</a></li>
		  </ul>
		</div>
	</header>

		@yield('content')

		@section('footer')
		
		@show

	<footer>
		
	</footer>
</body>
</html>