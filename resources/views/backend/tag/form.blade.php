@extends('backend.app')

@section('title', $tag->exists ? 'Editing ' . $tag->name : 'Create new tag ')
@section('content')

	<div class="row">
		<div class="col-md-6">
		
		<h3>{{ $tag->exists ? 'Editing ' . $tag->name : 'Create new tag ' }}</h3>
		<ul class="list-inline">
		@foreach($errors->all() as $error)
		    <li class="alert alert-danger">
		        {{ $error }}
		    </li>
		@endforeach
		</ul>

			{!! Form::model($tag, [
				'method' => $tag->exists ? 'put' : 'post',
				'route' => $tag->exists ? ['admin.tag.update', $tag->id] : ['admin.tag.store'],
			]) !!}

			<div class="form-group">
				{!! Form::label('name') !!}
				{!! Form::text('name', null, ['class' => 'form-control']) !!}
			</div>

			{!! Form::submit($tag->exists ? 'Update' : 'Create',  ['class' => 'btn btn-success']) !!}

		</div>
	</div>

@endsection