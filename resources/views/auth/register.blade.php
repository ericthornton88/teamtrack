@extends('layout')

@section('content')
<main>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-default">
					<div class="panel-heading">Register</div>
					<div class="panel-body">
						@if (count($errors) > 0)
							<div class="alert alert-danger">
								<strong>Whoops!</strong> There were some problems with your input.<br><br>
								<ul>
									@foreach ($errors->all() as $error)
										<li>{{ $error }}</li>
									@endforeach
								</ul>
							</div>
						@endif

						<form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/register') }}">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">

							<div class="form-group">
								<label class="col-md-4 control-label">First Name</label>
								<div class="col-md-6">
									<input type="text" class="form-control" name="first_name" value="Marshawn">
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-4 control-label">Last Name</label>
								<div class="col-md-6">
									<input type="text" class="form-control" name="last_name" value="Lynch">
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-4 control-label">Phone</label>
								<div class="col-md-6">
									<input type="text" class="form-control" name="phone" value="1234567899">
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-4 control-label">E-Mail Address</label>
								<div class="col-md-6">
									<input type="email" class="form-control" name="email" value="beastmode@bm.com">
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-4 control-label">Role</label>
								<div class="col-md-6">
									<select name="is_admin">
										<option value="0">Player</option>
										<option value="1">Coach</option>
									</select>
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-4 control-label">Password</label>
								<div class="col-md-6">
									<input type="password" class="form-control" name="password" value="password">
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-4 control-label">Confirm Password</label>
								<div class="col-md-6">
									<input type="password" class="form-control" name="password_confirmation" value="password">
								</div>
							</div>

							<div class="form-group">
								<div class="col-md-6 col-md-offset-4">
									<button type="submit" class="btn btn-primary">
										Register
									</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>
@endsection
