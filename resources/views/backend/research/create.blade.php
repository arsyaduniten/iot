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
    <a class="p-4 m-4 rounded text-black text-xl bg-yellow action-btns" href="/v2/backend/getpage/4">Back to Layout</a>
    <a class="p-4 m-4 rounded text-black text-xl bg-green action-btns" href="/backend/research">View All</a>
</div>
<form class="container mx-auto flex flex-col w-1/2" id="createForm" method="POST" action="{{ route('backend:research:store') }}">
	@csrf
	{{-- <div class="flex">
		<label class="self-center">User</label>
		<input class="self-center m-2 p-2 bg-white shadow-md rounded" type="text" name="user_id" value="{{ $user->id }}">
	</div> --}}
	<button class="p-4 m-2 shadow-lg bg-white" type="submit" id="submit-btn">Submit</button>
	<div class="flex">
		<label class="self-center">Research Area</label>
		<div class="flex flex-col">
			<input class="self-center m-2 p-2 bg-white shadow-md rounded" type="text" name="research_area">
			<p class="research-required hidden text-red text-base">*Research Area is required</p>
		</div>
	</div>
	<div class="flex">
		<label class="pt-4">Description</label>
		<div class="flex flex-col">
			<textarea name="description" class="m-2 summernote"></textarea>
			<p class="description-required hidden text-red text-base">*Description is required</p>
		</div>
	</div>
	<div class="flex">
		<label class="self-center">Start Date</label>
		<div class="flex flex-col">
			<input class="self-center m-2 p-2 bg-white shadow-md rounded datepick" type="date" name="start_date">
			<p class="start-required hidden text-red text-base">*Start Date is required</p>
		</div>
	</div>
	<div class="flex">
		<label class="self-center">End Date</label>
		<div class="flex flex-col">
			<input class="self-center m-2 p-2 bg-white shadow-md rounded datepick" type="date" name="end_date">
			<p class="end-required hidden text-red text-base">*End Date is required</p>
		</div>
	</div>
	<div class="flex">
		<label class="self-center">External Website (Optional)</label>
		<div class="flex flex-col">
			<input class="self-center m-2 p-2 bg-white shadow-md rounded" type="text" name="external_link">
		</div>
	</div>
	<div class="flex">
		<label class="pt-4">Post to Recent Activity?</label>
		<input class="self-center mt-4 m-2" type="checkbox" name="activity" value="true">
	</div>
</form>
@endsection

@section('script')
<script type="text/javascript">
	$(document).ready(function() {
		$('.summernote').summernote({
	    	height:200,
	    });
	    $(".note-editor").addClass("m-2 shadow-md");
	    $("#submit-btn").click(function(e){
	    	e.preventDefault();
	    	var incomplete = false;
	    	var research = $('input[name=research_area]').val();
	    	var description = $('textarea[name=description]').val();
	    	var start = $('input[name=start_date]').val();
	    	var end = $('input[name=end_date]').val();
	    	if(research == ''){
	    		$('.research-required').show();
	    		incomplete = true;
	    	}
	    	if(description == ''){
	    		$('.description-required').show();
	    		incomplete = true;
	    	}
	    	if(start == ''){
	    		$('.start-required').show();
	    		incomplete = true;
	    	}
	    	if(end == ''){
	    		$('.end-required').show();
	    		incomplete = true;
	    	}
	    	if(incomplete){
	    		return;
	    	} else{
	    		$('#createForm').submit();
	    	}
	    });
	});
</script>
@endsection