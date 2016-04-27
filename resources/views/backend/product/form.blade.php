@extends('backend.app')

@section('title', $product->exists ? 'Editing ' . $product->name : 'Create new product ')
@section('content')

	<div class="row mb1">
		<div class="col-md-6">
		
		<h3>{{ $product->exists ? 'Editing ' . $product->name : 'Create new product ' }}</h3>
		<ul class="list_margin">
		@foreach($errors->all() as $error)
		    <li class="alert alert-danger">
		        {{ $error }}
		    </li>
		@endforeach
		</ul>

			{!! Form::model($product, [
				'method' => $product->exists ? 'put' : 'post',
				'route' => $product->exists ? ['admin.product.update', $product->id] : ['admin.product.store'],
				'enctype' => 'multipart/form-data'
			]) !!}

			<div class="form-group">
				{!! Form::label('name') !!}
				{!! Form::text('name', null, ['class' => 'form-control']) !!}
			</div>

			<div class="form-group">
				{!! Form::label('short_title') !!}
				{!! Form::text('short_title', null, ['class' => 'form-control']) !!}
			</div>

			<div class="form-group">
				{!! Form::label('offer') !!}
				{!! Form::text('offer', null, ['class' => 'form-control', 'placeholder' => '50% off']) !!}
			</div>

			<div class="form-group">
				{!! Form::label('description') !!}
				{!! Form::textarea('description', null, ['class' => 'form-control']) !!}
			</div>
			<div class="form-group">
				{!! Form::label('price') !!}
				{!! Form::text('price', null, ['class' => 'form-control']) !!}
			</div>

			<div class="form-group">
				{!! Form::label('old_price') !!}
				{!! Form::text('old_price', null, ['class' => 'form-control']) !!}
			</div>
			
			<div class="form-group">
				{!! Form::label('categories_list', 'Categories:') !!}
				{!! Form::select('categories_list[]', $categories, null, ['class' => 'form-control', 'multiple']) !!}
			</div>
			
			<div class="form-group">
				{!! Form::label('tag_list', 'Tags:') !!}
				{!! Form::select('tag_list[]', $tags, null, ['class' => 'form-control', 'multiple']) !!}
			</div>
			
			@unless($product->slider_img)
			<div class="form-group form_slider_img_checkbox">
				{!! Form::checkbox('slider', null, false) !!}
				{!! Form::label('slider', 'Use in slider') !!}
			</div>

			<div class="form-group form_slider_img_file">
				{!! Form::label('slider_img', 'Slider Image') !!}
				{!! Form::file('slider_img') !!}
			</div>
			@endunless





			{!! Form::submit($product->exists ? 'Update' : 'Create',  ['class' => 'btn btn-success']) !!}

		</div>
	</div>

@endsection