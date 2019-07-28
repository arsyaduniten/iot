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
    <a class="p-4 m-4 rounded text-black text-xl bg-green action-btns" href="/backend/collaborator">Create New</a>
</div>
<form class="container mx-auto flex flex-col w-1/2" id="editForm" method="POST" action="{{ route('backend:collaborator:update', ['collaborator' => $collaborator]) }}">
	@csrf
	@method('PUT')
	<button class="p-4 m-2 shadow-lg bg-white" type="submit" id="submit-btn">Submit</button>
	<div class="flex">
		<label class="self-center">Name</label>
		<div class="flex flex-col">
			<input class="self-center m-2 p-2 bg-white shadow-md rounded" type="text" name="name" value="{{ $collaborator->name }}">
			<p class="name-required hidden text-red text-base">*Name is required</p>
		</div>
	</div>
	{{-- <div class="flex">
		<label class="self-center">Logo Url</label>
		<div>
			<input class="self-center m-2 p-2 bg-white shadow-md rounded" type="text" name="logo_url">
			<p class="text-xs text-red hidden" id="warning_logo">Logo URL is not valid</p>
		</div>
	</div> --}}
	<div class="flex">
		<label class="self-center">Company Background URL</label>
		<div class="flex flex-col">
			<input class="self-center m-2 p-2 bg-white shadow-md rounded" type="text" name="company_url" value="{{ $collaborator->company_url }}">
			<p class="company-required hidden text-red text-base">*Company Background URL is required</p>
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
    	<label class="p-2">Related Project</label>
	    <div id='app'>
		    <div class='tagHere project'></div>
		    <input type="text" name="ptags-field"/>
		</div>
	</div>
	<div class="flex">
		<label class="pt-4">Post to Recent Activity?</label>
		<input class="self-center mt-4 m-2" type="checkbox" name="activity" value="true">
	</div>
	<input type="hidden" id="tag_values" name="tags">
</form>
@endsection

@section('script')
<script type="text/javascript">
	$(document).ready(function() {
		$('.summernote').summernote({
	    	height:200,
	    });
	    $(".note-editor").addClass("m-2 shadow-md");
        $('.summernote').summernote("code", `<?php echo $collaborator->description ?>`);

		var p_tags = [];
		@foreach($p_title as $title)
		p_tags.push("{{ $title }}");
		@endforeach

		$( "input[name=ptags-field]" ).autocomplete({
	      source: p_tags,
	      minLength:0,
	      select: function (e, ui) {
		        var el = ui.item.label;
		        e.preventDefault();
		        addTag(el, ".project");
		  },
	    }).click(function(){
		    $(this).autocomplete("search");
		});

	    $("#submit-btn").click(function(e){
	    	e.preventDefault();
	    	var incomplete = false;
	    	var name = $('input[name=name]').val();
	    	var company = $('input[name=company_url]').val();
	    	var description = $('textarea[name=description]').val();
	    	if(name == ''){
	    		$('.name-required').show();
	    		incomplete = true;
	    	}
	    	if(description == ''){
	    		$('.description-required').show();
	    		incomplete = true;
	    	}
	    	if(company == ''){
	    		$('.company-required').show();
	    		incomplete = true;
	    	}
	    	$(".selected_items").each(function(){
	    		// $("#tag_values").append($(this).text()+",");
	    		var tag_text = $(this).text()+",";
    		    $('#tag_values').val($('#tag_values').val() + tag_text);
	    	});
	    	if(incomplete){
	    		return;
	    	} else{
	    		$('#editForm').submit();
	    	}
	    });

	    @foreach($p_tags as $tag)
	    addTag("{{ $tag }}", '.project');
	    @endforeach


	    function addTag(element, className) {
		    $appendHere = $(".tagHere"+className);
		    var $tag = $("<div />"), $a = $("<a href='#' />"), $span = $("<span />");
		    $tag.addClass('tag rounded-full');
		    $('<i class="fa fa-times" aria-hidden="true"></i>').appendTo($a);
		    $span.addClass('selected_items');
		    $span.text(element);
		    $a.bind('click', function(){
		      $(this).parent().remove();
		      $(this).unbind('click');
		    });
		    $a.appendTo($tag);
		    $span.appendTo($tag);
		    $tag.appendTo($appendHere);
		    $("#app input").val('');
		 }

		// function ImageExist(url) {
		//      return(url.match(/\.(jpeg|jpg|gif|png)$/) != null);
		// }
	});
</script>
@endsection