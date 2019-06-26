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
<form class="container mx-auto flex flex-col w-1/2" method="POST" action="{{ route('backend:statistic:store') }}">
	@csrf
	<button class="p-4 m-2 shadow-lg bg-white" type="submit" id="submit-btn">Submit</button>
	<text-input :name="'content'" :data=null/>
	<text-input :name="'description'" :data=null />
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