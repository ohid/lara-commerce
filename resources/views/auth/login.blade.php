@extends('frontend.app')

@section('title', 'Login')

@section('content')
	
<div class="container">
	<div class="row jumbotron">
		<br>
		<br>
		<br>
		<div class="col-md-6 col-md-offset-3">
				<h3>Login</h3>
				<br>
				{!! Form::open() !!}

				<div class="form-group">
					{!! Form::label('email') !!}
					{!! Form::text('email', null, ['class'=>'form-control']) !!}
				</div>

				<div class="form-group">
					{!! Form::label('password') !!}
					{!! Form::password('password', ['class'=>'form-control']) !!}
				</div>

				<div class="form-group">
					{!! Form::submit('Login', ['class'=>'btn btn-primary form-control']) !!}
						<br>
				</div>

				{!! Form::close() !!}
		</div>

	</div>
</div>

@stop