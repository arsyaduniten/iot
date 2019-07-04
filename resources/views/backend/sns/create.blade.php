@extends('public.base')
@section('head')
<!-- include summernote css/js -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-lite.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-lite.js"></script>
<style type="text/css">
	html, body {
	  overflow: scroll !important;
	}
</style>
@endsection
@section('content')
@include('backend.nav')
<div class="flex container mx-auto">
    <a class="p-4 m-4 rounded text-black text-xl bg-yellow action-btns" href="/v2/backend/getpage/8">Back to Layout</a>
    <a class="p-4 m-4 rounded text-black text-xl bg-green action-btns" href="/backend/sns">View All</a>
</div>
<form class="container mx-auto flex flex-col w-1/2" method="POST" action="{{ route('backend:sns:store') }}">
	@csrf
	<button class="p-4 m-2 shadow-lg bg-white" type="submit" id="submit-btn">Submit</button>
	<text-input :name="'display_name'" :data=null/>
	<text-input :name="'url'" :data=null />
	<div class="flex">
		<label class="py-2 mx-2">Category</label>
		<select class="px-4 py-3 bg-white shadow-md" name='category' id='category'>
			<option value="professional">Professional</option>
			<option value="academic">Academic</option>
			<option value="training">Training</option>
		</select>
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