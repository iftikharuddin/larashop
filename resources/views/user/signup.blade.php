@extends('layouts.master')

@section('title')
    Laravel Shopping Cart / Sign up
@endsection

@section('content')
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			<h1> Sign up</h1>
			<hr>
			@if(count($errors) > 0)
				<div class="alert alert-danger">
					@foreach($errors->all() as $error)
						<p>{{ $error }}</p>
					@endforeach

				</div>
			@endif
			<form action="{{ url('user/signup') }}" method="post">
				{{ csrf_field() }}
				<div class="form-group">
					<label for="email">E-Mail</label>
					<input type="text" id="email" name="email" class="form-control">
				</div>
				<div class="form-group">
					<label for="password">Password</label>
					<input type="password" id="password" name="password" class="form-control">
				</div>

				<button type="submit" class="btn btn-primary">Sign Up</button>
				
			</form>
		</div>

	</div>
@endsection