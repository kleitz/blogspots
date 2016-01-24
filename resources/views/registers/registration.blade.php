<!-- resources/views/registers/registration.blade.php -->
<?
@extends('layout.global')

@section('content')
	{!! Form::open(['route' => 'registers.store', 'files' => true]) !!}
		<h2>Register User</h2>
		@if (count($errors) > 0)
		    <div class="alert alert-danger">
		        <ul>
		            @foreach ($errors->all() as $error)
		                <li>{{ $error }}</li>
		            @endforeach
		        </ul>
		    </div>
		@endif

		<div class='form-group'>
	    {!! Form::label('email', 'Email Address') !!}
	    {!! Form::text('email', Input::old('email'), ['required', 'placeholder' => 'awesome@awesome.com', 'class' => 'form-control']) !!}
		</div>

		<div class='form-group'>
	    {!! Form::label('firstName', 'First Name') !!}
	    {!! Form::text('firstName', Input::old('firstName'), ['required', 'placeholder' => 'Allen', 'class' => 'form-control']) !!}
		</div>

		<div class='form-group'>
	    {!! Form::label('lastName', 'Last Name') !!}
	    {!! Form::text('lastName', Input::old('lastName'), ['required', 'placeholder' => 'Walker', 'class' => 'form-control']) !!}
		</div>

		<div class='form-group'>
	    {!! Form::label('password', 'Password') !!}
	    {!! Form::password('password', ['required', 'class' => 'form-control']) !!}
		</div>

		<div class='form-group'>
	    {!! Form::label('password_confirm', 'Password Confirmation') !!}
	    {!! Form::password('password_confirm', ['required', 'class' => 'form-control']) !!}
		</div>

		<div class='form-group'>
	    {!! Form::label('photo', 'Upload Photo') !!}
	    {!! Form::file('photo', ['class' => 'form-control']) !!}
		</div>

<!-- 	<div class='form-group'>
	    {!! Form::label('role', 'User Role') !!}
	    {!! Form::select('role', ['admin' => 'Admin', 'owner' => 'Owner', 'staff' => 'Staff'], 'staff', ['class' => 'form-control']) !!}
		</div> --> 

		<div class='form-group'>
	    {!! Form::label('gender', 'Gender') !!}
	    {!! Form::select('gender', ['male' => 'Male', 'female' => 'Female'], 'male', ['class' => 'form-control']) !!}
	    </div>

		<div class='form-group'>
		{!! Form::submit('Register !', ['class' => 'form-control btn btn-primary']) !!}
		</div>
	{!! Form::close() !!}
@stop
?>