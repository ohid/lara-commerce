@extends('backend.app')

@section('title', 'Product - Lara Commerce')
@section('content')
<h2>All products <small><a href="{{ route('admin.product.create') }}" class="btn btn-primary btn-xs">Add new</a></small></h2>

<table class="table table-hover">
	@if(count($products) > 0)
  	<?php  
  		if(isset($_GET['page'])) {
  			$count = ($_GET['page']-1) * 15 + 1; 
  		} else {
  			$count = 1;
  		}
  	?>
  	@endif
	<tr>
		<th>No:</th>
		<th>Name:</th>
		<th>Add Photos:</th>
		<th>Price:</th>
		<th>Old Price:</th>
		<th>Categories:</th>
		<th>Tags:</th>
		<th>Action:</th>
	</tr>

	@foreach($products as $product)
		<tr>
			<td>{{ $count++ }}</td>
			<td>
				<a href="{{ route('admin.product.show', $product->id) }}">{{ $product->name }}</a>
			</td>
			<td>
				<a href="{{ route('admin.product.show', $product->id) }}">Add Photos</a>
			</td>
			<td>{{ $product->price }}</td>
			<td> {{$product->old_price}}</td>
			<td>
				@foreach($product->categories as $category)
					{{ $category->name }}
				@endforeach
			</td>
			<td>
				@foreach($product->tags as $tag)
					{{ $tag->name }}
				@endforeach
			</td>
			
			<td width="15%">
				<a href="{{ route('admin.product.edit', $product->id) }}" class="btn btn-primary btn-xs">Edit</a>
				<a href="{{ route('admin.product.confirm', $product->id) }}" class="btn btn-warning btn-xs">Delete</a>
			</td>
		</tr>
		
	@endforeach

</table>
	{!! $products->render() !!}
@endsection