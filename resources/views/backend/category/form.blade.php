@extends('backend.app')

@section('title', $category->exists ? 'Editing ' . $category->name : 'Create new Category ')
@section('content')

	<div class="row">
		<div class="col-md-6">
		
		<h3>{{ $category->exists ? 'Editing ' . $category->name : 'Create new Category ' }}</h3>
		<ul class="list-inline">
		@foreach($errors->all() as $error)
		    <li class="alert alert-danger">
		        {{ $error }}
		    </li>
		@endforeach
		</ul>

			{!! Form::model($category, [
				'method' => $category->exists ? 'put' : 'post',
				'route' => $category->exists ? ['admin.category.update', $category->id] : ['admin.category.store'],
			]) !!}

			<div class="form-group">
				{!! Form::label('name') !!}
				{!! Form::text('name', null, ['class' => 'form-control']) !!}
			</div>

			{!! Form::submit($category->exists ? 'Update' : 'Create',  ['class' => 'btn btn-success']) !!}

		</div>
	</div>

@endsection