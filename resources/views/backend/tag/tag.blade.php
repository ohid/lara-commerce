@extends('backend.app')

@section('title', 'Tag - Lara Commerce')
@section('content')
<h2>All Tags <small><a href="{{ route('admin.tag.create') }}" class="btn btn-primary btn-xs">Add new</a></small></h2>

<table class="table table-hover">
	@if(count($tags) > 0)
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

	@foreach($tags as $tag)
		<tr>
			<td>{{ $count++ }}</td>
			<td>{{ $tag->name }}</td>
			<td width="15%">
				<a href="{{ route('admin.tag.edit', $tag->id) }}" class="btn btn-primary btn-xs">Edit</a>
				<a href="{{ route('admin.tag.confirm', $tag->id) }}" class="btn btn-warning btn-xs">Delete</a>
			</td>
		</tr>
		
	@endforeach

</table>
	{!! $tags->render() !!}
@endsection