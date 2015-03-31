@extends('login-layout')

@section('time-player')
	<div class="container-title">Time</div>
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
	<h1>Please select a player and category</h1>
	<div class="graph">
		<canvas id="canvas"></canvas>
	</div>
</section>
@endsection