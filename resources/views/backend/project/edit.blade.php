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
    <a class="p-4 m-4 rounded text-black text-xl bg-green action-btns" href="/backend/project">View All</a>
</div>
<form class="container mx-auto flex flex-col w-1/2" id="editForm" method="POST" action="{{ route('backend:project:update', ['project' => $project]) }}">
	@csrf
	@method('PUT')
	<button class="p-4 m-2 shadow-lg bg-white" type="submit" id="submit-btn">Submit</button>
	<div class="flex">
		<label class="self-center">Title</label>
		<div class="flex flex-col">
			<input class="self-center m-2 p-2 bg-white shadow-md rounded" type="text" name="title" value="{{ $project->title }}">
			<p class="title-required hidden text-red text-base">*Project Title is required</p>

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
			<input class="self-center m-2 p-2 bg-white shadow-md rounded datepick" type="date" name="start_date" value="{{ $project->start_date }}">
			<p class="start-required hidden text-red text-base">*Start Date is required</p>
		</div>
	</div>
	<div class="flex">
		<label class="self-center">End Date</label>
		<div class="flex flex-col">
			<input class="self-center m-2 p-2 bg-white shadow-md rounded datepick" type="date" name="end_date" value="{{ $project->end_date }}">
			<p class="end-required hidden text-red text-base">*End Date is required</p>
		</div>
	</div>
	<div class="flex">
    	<label class="p-2">Related Research Areas</label>
	    <div id='app'>
		    <div class='tagHere'></div>
		    <input type="text" name="tags-field"/>
		</div>
	</div>
	<div class="flex">
		<label class="self-center">Keyword</label>
		<input class="self-center m-2 p-2 bg-white shadow-md rounded" type="text" id="keyword-input"/>
		<button class="p-2 bg-white shadow-md rounded" id="add-btn">Add</button>
	</div>
    <div class="flex">
        <label class="p-2">Keyword Lists</label>
        <div id='app'>
            <div class='ktagHere'></div>
            <input type="text" name="ktags-field"/>
        </div>
    </div>
    <div class="flex">
		<label class="self-center">External Website (Optional)</label>
		<div class="flex flex-col">
			<input class="self-center m-2 p-2 bg-white shadow-md rounded" type="text" name="external_link" value="{{ $project->external_link }}">
		</div>
	</div>
    <div class="flex">
		<label class="pt-4">Post to Recent Activity?</label>
		<input class="self-center mt-4 m-2" type="checkbox" name="activity" value="true">
	</div>
	<input type="hidden" id="tag_values" name="tags">
	<input type="hidden" id="ktag_values" name="ktags">
</form>
@endsection

@section('script')
<script type="text/javascript">
	$(document).ready(function() {
		$('.summernote').summernote({
	    	height:200,
	    });
	    $(".note-editor").addClass("m-2 shadow-md");
        $('.summernote').summernote("code", `<?php echo $project->description ?>`);
        var tags = [];
		@foreach($r_title as $title)
		tags.push("{{ $title }}");
		@endforeach
		$( "input[name=tags-field]" ).autocomplete({
	      source: tags,
	      minLength: 0,
	      select: function (e, ui) {
		        var el = ui.item.label;
		        e.preventDefault();
		        addTag(el, '.tagHere');
		  },
	    }).click(function(){
		    $(this).autocomplete("search");
		});

	    $("#submit-btn").click(function(e){
	    	e.preventDefault();
	    	var incomplete = false;
	    	var title = $('input[name=title]').val();
	    	var description = $('textarea[name=description]').val();
	    	var start = $('input[name=start_date]').val();
	    	var end = $('input[name=end_date]').val();
	    	if(title == ''){
	    		$('.title-required').show();
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
	    	$(".selected_items").each(function(){
	    		// $("#tag_values").append($(this).text()+",");
	    		var tag_text = $(this).text()+",";
    		    $('#tag_values').val($('#tag_values').val() + tag_text);
	    	});
	    	$(".kselected_items").each(function(){
	    		// $("#tag_values").append($(this).text()+",");
	    		var tag_text = $(this).text()+",";
    		    $('#ktag_values').val($('#ktag_values').val() + tag_text);
	    	});
	    	if(incomplete){
	    		return;
	    	} else{
	    		$('#editForm').submit();
	    	}
	    });

	    $("#add-btn").click(function(e){
	  		 e.preventDefault();
			 var el = $("#keyword-input").val()
			 $("#keyword-input").val("");
	 		 addTag(el, '.ktagHere');
	  	});

	    @foreach($tags as $tag)
	    addTag("{{ $tag }}", '.tagHere');
	    @endforeach

	    @foreach($ktags as $tag)
	    addTag("{{ $tag }}", '.ktagHere');
	    @endforeach

	    function addTag(element, id) {
		    $appendHere = $(id);
		    var $tag = $("<div />"), $a = $("<a href='#' />"), $span = $("<span />");
		    $tag.addClass('tag rounded-full');
		    $('<i class="fa fa-times" aria-hidden="true"></i>').appendTo($a);
		    if(id == '.tagHere'){
			    $span.addClass('selected_items');
			} else {
			    $span.addClass('kselected_items');
			}
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
	});
</script>
@endsection