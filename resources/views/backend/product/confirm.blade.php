@extends('backend.app')

@section('title', 'Confirm Delete')
@section('content')

	{!!Form::open(['method' => 'delete', 'route' => ['admin.product.destroy', $product->id]]) !!}
		
		<div class="alert alert-warning">
			<strong>Warning!</strong> You are about to delete a product. This action cannot be undone. Are you sure you want to continue?
		</div>


			{!! Form::submit('Yes, Delete this product', ['class' => 'btn btn-danger']) !!}

		<a href="{{ route('admin.product.index') }}" class="btn btn-success"><strong>No, get me out of here!</strong></a>

	{!! Form::close() !!}

@endsection