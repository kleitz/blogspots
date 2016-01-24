<!-- resources/views/users/dashboard.blade.php -->
<?
@extends('layout.global')

@section('content')
	<div class="row">
	  	<div class="col-sm-6 col-md-4">
	    <div class="thumbnail">
	    	@if ($user->photo)
	      	{!! Html::image($user->photo, $user->displayName) !!}
	      	@else 
	      	{!! Html::image('img/default.png', $user->name, ['style' => 'width:110px']) !!}
	      	@endif
	      	<div class="caption">
	        	<h5>{{ $user->email }}</h5>
	        	<p>{!! Html::link('users/edit/'.$user->id, 'Edit', ['class' => 'btn btn-warning']) !!}</p>
	      </div>
	    </div>
	  	</div>
	</div>

	<div>
	{!! Html::link('logout', 'Logout', ['class' => 'btn btn-warning']) !!}
	</div>
@stop
?>