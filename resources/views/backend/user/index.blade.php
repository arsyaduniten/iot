@extends('public.base')
@section('head')
<!-- include summernote css/js -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-lite.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-lite.js"></script>
@endsection
@section('content')
@include('backend.nav')
<form class="container mx-auto flex flex-col w-1/2" method="POST" action="{{ route('backend:user:update', ['id' => $user->id]) }}" enctype="multipart/form-data">
	@method('PUT')
	@csrf
	{{-- <div class="flex">
		<label class="self-center">First Name</label>
		<input class="m-2 p-2 bg-white shadow-md rounded" type="text" name="first_name" value="{{ $user->first_name }}">
	</div> --}}
	<text-input :name="'first_name'" :data="$user->first_name"/>
	<text-input :name="'last_name'" :data="$user->last_name"/>
	<div class="flex m-2">
		<label class="p-2">Profile Image</label></label>
	    <input type='file' name="image" /><br>
	    <img src="{{ $user->profile_url }}" style="border-radius:100%">
	</div>
	<text-input :name="'email'" :data="$user->email"/>
	<text-input :name="'about_short'" :data="$user->about_short"/>
	<div class="flex">
		<label class="pt-4">Box Description</label>
		<textarea name="box_description" class="m-2 summernote summernote-box"></textarea>
	</div>
	<div class="flex">
		<label class="pt-4">About Long</label>
		<textarea name="about_long" class="m-2 summernote summernote-about"></textarea>
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
	    $('.summernote-about').summernote("code", `<?php echo $user->about_long ?>`);
	    $('.summernote-box').summernote("code", `<?php echo $user->box_description ?>`);
	    $(".note-editor").addClass("m-2 shadow-md");
	});
</script>
@endsection