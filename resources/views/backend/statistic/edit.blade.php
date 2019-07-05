@extends('public.base')
@section('head')
<!-- include summernote css/js -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-lite.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-lite.js"></script>
<style type="text/css">
	html, body {
	  overflow: visible !important;
	}
</style>
@endsection
@section('content')
@include('backend.nav')
<div class="flex container mx-auto">
    <a class="p-4 m-4 rounded text-black text-xl bg-yellow action-btns" href="/v2/backend/getpage/1">Back to Layout</a>
    <a class="p-4 m-4 rounded text-black text-xl bg-green action-btns" href="/backend/statistics">View All</a>
</div>
<form class="container mx-auto flex flex-col w-1/2" method="POST" id="editForm" action="{{ route('backend:statistic:update', ['statistic' => $statistic]) }}">
	@method('PUT')
	@csrf
	<button class="p-4 m-2 shadow-lg bg-white" type="submit" id="submit-btn">Submit</button>
	<div class="flex">
		<label class="self-center">Content</label>
		<div class="flex flex-col">
			<input class="self-center m-2 p-2 bg-white shadow-md rounded" type="text" name="content" value="{{ $statistic->content }}">
			<p class="content-required hidden text-red text-base">*Content is required</p>
		</div>
	</div>
	<div class="flex">
		<label class="self-center">Description</label>
		<div class="flex flex-col">
			<input class="self-center m-2 p-2 bg-white shadow-md rounded" type="text" name="description" value="{{ $statistic->description }}">
			<p class="description-required hidden text-red text-base">*Description is required</p>
		</div>
	</div>
</form>
@endsection

@section('script')
<script type="text/javascript">
	$(document).ready(function() {
		$("#submit-btn").click(function(e){
		    e.preventDefault();
	    	var incomplete = false;
	    	var content = $('input[name=content]').val();
	    	var description = $('input[name=description]').val();
	    	if(content == ''){
	    		$('.content-required').show();
	    		incomplete = true;
	    	}
	    	if(description == ''){
	    		$('.description-required').show();
	    		incomplete = true;
	    	}
	    	if(incomplete){
	    		return;
	    	} else{
	    		$('#editForm').submit();
	    	}
	    });
	});

</script>
@endsection