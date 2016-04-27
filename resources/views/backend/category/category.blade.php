@extends('backend.app')

@section('title', 'Category - Lara Commerce')
@section('content')
<h2>All Categories <small><a href="{{ route('admin.category.create') }}" class="btn btn-primary btn-xs">Add new</a></small></h2>

<table class="table table-hover">
	@if(count($categories) > 0)
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
		<th>Action:</th>
	</tr>

	@foreach($categories as $category)
		<tr>
			<td>{{ $count++ }}</td>
			<td>{{ $category->name }}</td>
			<td width="15%">
				<a href="{{ route('admin.category.edit', $category->id) }}" class="btn btn-primary btn-xs">Edit</a>
				<a href="{{ route('admin.category.confirm', $category->id) }}" class="btn btn-warning btn-xs">Delete</a>
			</td>
		</tr>
		
	@endforeach

</table>
	{!! $categories->render() !!}
@endsection