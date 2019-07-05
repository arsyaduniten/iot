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
<form class="container mx-auto flex flex-col w-1/2" id="editForm" method="POST" action="{{ route('backend:sns:update', ['sns' => $sns]) }}">
	@method('PUT')
	@csrf
	<button class="p-4 m-2 shadow-lg bg-white" type="submit" id="submit-btn">Submit</button>
	<div class="flex">
		<label class="self-center">Display Name</label>
		<div class="flex flex-col">
			<input class="self-center m-2 p-2 bg-white shadow-md rounded" type="text" name="display_name" value="{{ $sns->display_name }}">
			<p class="name-required hidden text-red text-base">*Display Name is required</p>
		</div>
	</div>
	<div class="flex">
		<label class="self-center">URL</label>
		<div class="flex flex-col">
			<input class="self-center m-2 p-2 bg-white shadow-md rounded" type="text" name="url" value="{{ $sns->url }}">
			<p class="url-required hidden text-red text-base">*URL is required</p>
		</div>
	</div>
	<div class="flex">
		<label class="py-2 mx-2">Category</label>
		<select class="px-4 py-3 bg-white shadow-md" name='category' id='category'>
			<option value="professional">Professional</option>
			<option value="academic">Academic</option>
			<option value="training">Training</option>
		</select>
	</div>
</form>
@endsection

@section('script')
<script type="text/javascript">
	$(document).ready(function() {
		$('#category option[value={{ $sns->category }}]').prop('selected', true);
		$("#submit-btn").click(function(e){
		    e.preventDefault();
	    	var incomplete = false;
	    	var name = $('input[name=display_name]').val();
	    	var url = $('input[name=url]').val();
	    	if(name == ''){
	    		$('.name-required').show();
	    		incomplete = true;
	    	}
	    	if(url == ''){
	    		$('.url-required').show();
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