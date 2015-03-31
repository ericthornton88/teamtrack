@extends('login-layout')

@section('content')
<section>
	<h1>Please select a category</h1>
	<div class="user-nav-button-holder">
		<div class="user-nav-button">
			<i class="fa fa-user"></i>
		</div>
		<div class="user-nav-list initial-hide">
			<a href="/"><i class="fa fa-home"></i>Profile</a>
			<a href="/player/addInfo"><i class="fa fa-pencil"></i>Add/Edit</a>
			<a href="/auth/logout"><i class="fa fa-sign-out"></i>Logout</a>
		</div>
	</div>
	<div class="graph">
		<canvas id="canvas" height="125px" ></canvas>
	</div>
	<div class="consistency-tracker">
		<div class="consistency-holder">
			<div>
				<h1>43</h1>
				<p>Dates Entered</p>
			</div>
			<div>
				<h1>12</h1>
				<p>Current Streak</p>
			</div>
			<div>
				<h1>15</h1>
				<p>Streak Long</p>
			</div>	
		</div>
	</div>
</section>
@endsection