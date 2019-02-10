@extends('public.base')
@section('head')
<!-- include summernote css/js -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-lite.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-lite.js"></script>
@endsection
@section('content')
@include('backend.nav')
<form class="container mx-auto flex flex-col w-1/2" method="POST" action="{{ route('backend:blog:store') }}">
	@csrf
	<text-input :name="'title'" :data=null/>
	<div class="flex">
		<label class="pt-4">Content</label>
		<textarea name="content" class="m-2 summernote"></textarea>
	</div>
	<div class="flex">
		<label class="pt-4">Publish</label>
		<input checked="true" class="self-center mt-4 m-2" type="checkbox" name="publish" value="true">
	</div>
	<div class="flex">
		<label class="pt-4">Event</label>
		<input class="self-center mt-4 m-2" type="checkbox" name="event" value="true">
	</div>
	<button class="p-4 m-2 shadow-lg bg-white" type="submit">Submit</button>
</form>
@endsection

@section('script')
<script type="text/javascript">
	$(document).ready(function() {
		$('.summernote').summernote({
	    	height:200,
	    });
	    $(".note-editor").addClass("m-2 shadow-md");
	});
</script>
@endsection