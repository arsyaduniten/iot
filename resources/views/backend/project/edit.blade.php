@extends('public.base')
@section('head')
<!-- include summernote css/js -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-lite.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-lite.js"></script>
@endsection
@section('content')
@include('backend.nav')
<form class="container mx-auto flex flex-col w-1/2" method="POST" action="{{ route('backend:project:update', ['project' => $project]) }}">
	@csrf
	@method('PUT')
	<text-input :name="'title'" :data="$project->title"/>
	<div class="flex">
		<label class="pt-4">Description</label>
		<textarea name="description" class="m-2 summernote"></textarea>
	</div>
	<date-input :name="'start_date'" :data="$project->start_date"/>
	<date-input :name="'end_date'" :data="$project->end_date"/>
    <div class="flex">
        <label class="p-2">Related Research</label>
        <select class="bg-white m-2 p-2 shadow-md rounded" name="related_r" id="related_r">
            @foreach($researches as $r)
            <option value="{{ $r->id }}">{{ $r->title }}</option>
            @endforeach
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
        $('.summernote').summernote("code", "<?php echo $project->description ?>");
        $("#related_r").val({{ $research->id }});
	});
</script>
@endsection