<!-- resources/views/registers/login.blade.php -->
<?
@extends('layout.global')

@section('content')
	{!! Form::open(['route' => 'registers']) !!}
		<h2>Login</h2>
		@if (Session::get('messages') !== null)
		<div class="alert alert-{{ Session::get('class') }}" >
	    {{ Session::get('messages') }}
		</div>
		@endif

		<div class='form-group'>
	    {!! Form::label('email', 'Email Address') !!}
	    {!! Form::text('email', Input::old('email'), ['required', 'placeholder' => 'awesome@awesome.com', 'class' => 'form-control']) !!}
		</div>

		<div class='form-group'>
	    {!! Form::label('password', 'Password') !!}
	    {!! Form::password('password', ['required', 'class' => 'form-control']) !!}
		</div>

		<div class='form-group'>
		{!! Form::submit('Submit !', ['class' => 'form-control btn btn-primary']) !!}
		</div>
	{!! Form::close() !!}

	{!! Html::linkroute('registers.create', 'Register', [], ['class' => 'btn btn-warning']) !!}

	<div>
        <a href={{ route('registers.login') }}/google>Login using G+</a>
    </div>

    <div>
        <a href={{ route('registers.login') }}/facebook>Login using Facebook</a>
    </div>

   @stop