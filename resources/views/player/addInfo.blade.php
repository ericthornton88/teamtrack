@extends('login-layout')

@section('content')
<section>
	<input id="get-dates-id" type="hidden" value="{{Auth::User()->user_id}}">

	<div id="edit-entry">
		<h2>Edit</h2>
	</div>
	<div id="add-entry">
		<h2>Add</h2>
	</div>
	<form action="/player/updateInfo" method="POST" class="input-form initial-hide">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
	</form>
	<form action="/player/addInfo" method="POST" class="input-form-blanks initial-hide">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
	</form>
</section>

<script id="template-date" type="text/x-handlebars-template">
	<div class="temp-dropdown-menu">
		<select name="" id="date-dropdown">
			@{{#each date}}
			<option value="@{{@key}}">@{{this}}</option>
			@{{/each}}
		</select>
		<button id="submit-date">Submit</button>
	</div>
</script>

<script id="template-input-values" type="text/x-handlebars-template">
	<div class="handleth">@{{pname}}: 
		<input type="text" name="@{{uname}}"value="@{{value}}">
	</div>
</script>

<script id="template-blank-input" type="text/x-handlebars-template">
	<div class="handleth">@{{pname}}: 
		<input type="text" name="@{{uname}}">
	</div>
</script>

<script id="template-input-values-backup" type="text/x-handlebars-template">
	@{{#each data}}
		<div>@{{@key}} : </div>
		<input class="handleth" type="text" value="@{{this}}">
	@{{/each}}
</script>

@endsection