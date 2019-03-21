@extends('public.base')
@section('head')
<style type="text/css">
	input:focus {
	  border-style: solid;
	  border-width: 2px;
	  border-color: grey;
	}
	input:focus,
	select:focus,
	textarea:focus,
	button:focus {
	    outline: none;
	}
</style>
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-lite.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-lite.js"></script>
@endsection
@section('content')
@include('backend.v2nav')
<form class="container mx-auto text-center" method="post" action="{{ route('update:page', ['id' => $p->id])}}">
@csrf
@method('PUT') 
<div class="flex justify-left">
	<button class="p-4 m-4 bg-green-light rounded" type="submit">Save</button>
	<button class="p-4 m-4 bg-yellow-light rounded" type="reset">Reset</button>
</div>
<div class="flex flex-col">
	<input type="text" class="text-3xl font-bold text-teal-dark text-center" name="nav_title" value="{{ $p->nav_title }}">
	<input type="text" class="text-5xl font-bold text-teal-dark pt-2 text-center" name="title" value="{{ $p->title }}">
</div>
	@if(!is_null($snss))
		<div class="flex justify-center mt-4">
			@foreach($snss as $sns)
				<div class="flex flex-col">
					<input class="text-teal-dark text-center" value="{{ $sns->display_name }}" name="sns-{{ $sns->id }}">
					<input class="text-grey text-center m-2" value="{{ $sns->url }}" name="sns_url_{{ $sns->id }}">
				</div>
				<span class="border border-teal-dark"></span>
			@endforeach
		</div>
	@endif

	@if(!is_null($desc))
		<div class="mt-12">
			<textarea name="description" class="text-xl text-grey-darker pt-6 summernote"></textarea>
		</div>
	@endif

	@if(!is_null($sub_navs))
		<div class="flex w-full container mx-auto m-8 justify-center">
			@foreach($sub_navs as $sub_nav)
				<button class="bg-grey-lighter px-6 py-4 border border-grey text-teal-dark" content-id="{{ $sub_nav->content_id }}">{{ $sub_nav->display_text }}</button>
			@endforeach
		</div>
	@endif

	@if(!is_null($stats))
		<div class="flex justify-center mt-6">
		@foreach($stats as $stat)
			<div class="flex flex-col bg-blue-custom-dark shadow p-6 m-4 rounded">
				<input name="stat-{{ $stat->id }}" class="text-2xl bg-blue-custom-dark font-bold text-orange-dark text-center" value="{{ $stat->content }}">
				<input name="stat_desc_{{ $stat->id }}" class="text-orange-dark bg-blue-custom-dark pt-4 text-center" value="{{ $stat->description }}">	
			</div>
		@endforeach
		</div>
	@endif
</form>
@endsection
@section('script')
<script type="text/javascript">
	$(document).ready(function() {
		$('.summernote').summernote({
	    	height:200,
	    	width: 800,
	    });
	    $(".note-editor").addClass("m-2 shadow-md");
	    @if(!is_null($desc))
	    $('.summernote').summernote("code", "<?php echo $desc->content ?>");
	    @endif
	});
</script>
@endsection