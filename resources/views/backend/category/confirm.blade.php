@extends('backend.app')

@section('title', 'Confirm Delete')
@section('content')

	{!!Form::open(['method' => 'delete', 'route' => ['admin.category.destroy', $category->id]]) !!}
		
		<div class="alert alert-warning">
			<strong>Warning!</strong> You are about to delete a category. This action cannot be undone. Are you sure you want to continue?
		</div>


			{!! Form::submit('Yes, Delete this category', ['class' => 'btn btn-danger']) !!}

		<a href="{{ route('admin.category.index') }}" class="btn btn-success"><strong>No, get me out of here!</strong></a>

	{!! Form::close() !!}

@endsection