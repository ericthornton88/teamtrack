@extends('login-layout')

@section('time-player')
	<div class="container-title">Player</div>
	<div class="content">
		<form action="">
			<select id="coach-choose-player">
				@foreach($results as $result)
					<option value="{{$result->user_id}}">{{$result->first_name}} {{$result->last_name}}</option>
				@endforeach
			</select>
			<button>Submit</button>
		</form>
	</div>
	<div class="line"></div>

@endsection

@section('content')
<section>
	<div class="user-nav-button-holder">
		<div class="user-nav-button">
			<i class="fa fa-user"></i>
		</div>
		<div class="user-nav-list initial-hide">
			<a href="/auth/logout"><i class="fa fa-sign-out"></i>Logout</a>
		</div>
	</div>
	<h1 class="coach-h1">Please select a player and category</h1>
	<div class="graph">
		<canvas id="canvas" height="125px"></canvas>
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
				<p>Longest Streak</p>
			</div>	
		</div>
	</div>
</section>
@endsection