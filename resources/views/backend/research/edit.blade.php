@extends('public.base')
@section('head')
<!-- include summernote css/js -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-lite.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-lite.js"></script>
@endsection
@section('content')
@include('backend.nav')
<form class="container mx-auto flex flex-col w-1/2" method="POST" action="{{ route('backend:research:update', ['research' => $research]) }}">
	@csrf
	@method('PUT')
	{{-- <div class="flex">
		<label class="self-center">User</label>
		<input class="self-center m-2 p-2 bg-white shadow-md rounded" type="text" name="user_id" value="{{ $user->id }}">
	</div> --}}
	<text-input :name="'title'" :data="$research->title"/>
	<div class="flex">
		<label class="pt-4">Description</label>
		<textarea name="description" class="m-2 summernote"></textarea>
	</div>
	<date-input :name="'start_date'" :data="$research->start_date"/>
	<date-input :name="'end_date'" :data="$research->end_date"/>
	<button class="p-4 m-2 shadow-lg bg-white" type="submit">Update</button>
</form>
@endsection

@section('script')
<script type="text/javascript">
	$(document).ready(function() {
		$('.summernote').summernote({
	    	height:200,
	    });
	    $(".note-editor").addClass("m-2 shadow-md");
	   	$('.summernote').summernote("code", "<?php echo $research->description ?>");
	});
</script>
@endsection