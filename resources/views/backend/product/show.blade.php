@extends('backend.app')

@section('title', 'Add photos to ' . $product->name)

@section('content')
	<div class="row">
		<div class="col-md-6">
			<h3>{{ $product->name }}</h3>
			<hr>
			<p>{{ $product->description }}</p>

			<p><strong>Tags:</strong></p>
			@foreach($product->tags as $tag)
				<li>{{ $tag->name }} </li>
			@endforeach

			<br><br>


			<p><strong>Price:</strong> ${{ $product->price }}</p>
			<p><strong>Old Price:</strong> ${{ $product->old_price }}</p>

			<hr>

			<form class="dropzone" action="/admin/product/{{ $product->id }}/photos" method="POST">
				{{ csrf_field() }}
			</form>
			
		</div>

		<div class="col-md-6">
			<div class="row">
				@foreach($product->photos as $photo)
					<div class="col-md-4 product_img_grid">
						<img src="/{{ $photo->paths }}" alt="" class="img-thumbnail img-responsive product-img">
						<div class="product_remove">
						{!! Form::open(array('method' => 'delete', 'route' => ['admin.product.photo.delete', $photo->id])) !!}
								
								<button type="submit" title="Remove image"> <i class="fa fa-times"></i> </button>
						{!! Form::close() !!}
						</div>
					</div>
				@endforeach
			</div>
		</div>
	</div>
@endsection