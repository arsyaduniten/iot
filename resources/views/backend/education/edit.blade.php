@extends('public.base')
@section('head')
<!-- include summernote css/js -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-lite.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-lite.js"></script>
@endsection
@section('content')
@include('backend.nav')
<form class="container mx-auto flex flex-col w-1/2" method="POST" action="{{ route('backend:education:update', ['id' => $edu->id]) }}">
	@method('PUT')
	@csrf
	{{-- <div class="flex">
		<label class="self-center">First Name</label>
		<input class="m-2 p-2 bg-white shadow-md rounded" type="text" name="first_name" value="{{ $user->first_name }}">
	</div> --}}
	<button class="p-4 m-2 shadow-lg bg-white" type="submit" id="submit-btn">Submit</button>
	<text-input :name="'institution'" :data="$edu->institution"/>
	<text-input :name="'degree'" :data="$edu->degree"/>
	<div class="flex">
		<label class="pt-4">Description</label>
		<textarea name="description" class="m-2 summernote"></textarea>
	</div>
	<date-input :name="'date_start'" :data="$edu->date_start"/>
	<date-input :name="'date_completed'" :data="$edu->date_completed"/>
	<button class="p-4 m-2 shadow-lg bg-white" type="submit">Update</button>
</form>
@endsection

@section('script')
<script type="text/javascript">
	$(document).ready(function() {
		$('.summernote').summernote({
	    	height:200,
	    });
	    {{-- $('.summernote').summernote("insertText", "{{ strip_tags($edu->description) }}"); --}}
	    $(".note-editor").addClass("m-2 shadow-md");
        $('.summernote').summernote("code", "<?php echo $edu->description ?>");
	});
</script>
@endsection