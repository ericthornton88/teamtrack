@extends('login-layout')

@section('time-player')
	<div class="container-title">Time</div>
	<div class="content">
		<form action="">
			<select name="" id="">
				@foreach($results as $result)
					<option value="{{$result->user_id}}">{{$result->first_name}} {{$result->last_name}}</option>
				@endforeach
			</select>
		</form>
	</div>

@endsection

@section('content')
<section>
	<div class="graph">
		<canvas id="canvas" ></canvas>
		<div id="lineLegend"></div>
	</div>
</section>
@endsection