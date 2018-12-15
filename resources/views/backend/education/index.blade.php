@extends('public.base')
@section('head')
<!-- include summernote css/js -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-lite.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-lite.js"></script>
@endsection
@section('content')
@include('backend.nav')
<div class="container mx-auto">
	<table class="border border-grey-dark m-2">
		<tr class="">
			<th class="p-2">Degree</th>
			<th class="p-2">Institution</th>
			<th class="p-2">Year Start</th>
			<th class="p-2">Year Completed</th>
			<th class="p-2">Description</th>
			<th></th>
			<th></th>
		</tr>
		@foreach($data as $edu)
		<tr class="">
			<td class="p-2">{{ $edu->degree }}</td>
			<td class="p-2">{{ $edu->institution }}</td>
			<td class="p-2">{{ $edu->year_start }}</td>
			<td class="p-2">{{ $edu->year_completed }}</td>
			<td class="p-2"><?php echo $edu->description ?></td>
			<td class="p-2 py-4"><a href="{{ route('backend:education:edit', ['id' => $edu->id]) }}" class="text-black font-bold no-underline p-2 bg-yellow">Edit</a></td>
			<td class="p-2 py-4"><a href="{{ route('backend:education:destroy', ['id' => $edu->id]) }}" class="text-white font-bold no-underline p-2 bg-red">Delete</a></td>
		</tr>
		@endforeach
	</table>
</div>
@endsection

@section('script')
@endsection