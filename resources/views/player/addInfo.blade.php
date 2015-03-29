@extends('login-layout')

@section('content')
<section>
	<input id="get-dates-id" type="hidden" value="{{Auth::User()->user_id}}">
	<h2 id="edit-entry">Edit</h2>
	<h2 id="add-entry">Add</h2>
	<div class="input-form initial-hide">
		<input type="text">
		<input type="text">
		<input type="text">
		<input type="text">
		<input type="text">
		<input type="text">
	</div>
	<div class="input-form initial-hide">
		Please choose a date
		<select name="" id="">
			{{--@foreach($results as $result)
				<option value="{{created at}}">{{edited created at receive through ajax}}</option>
			@endforeach --}}
		</select>
	</div>
	<div class="input-form-values initial-hide">
		<select name="" id="">
			<option value=""></option>
			<option value=""></option>
			<option value=""></option>
			<option value=""></option>
			<option value=""></option>
		</select>
	</div>
</section>
@endsection