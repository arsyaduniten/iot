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
    <a class="p-4 m-4 rounded text-black text-xl bg-green action-btns" href="/backend/publication">View All</a>
</div>
<form class="container mx-auto flex flex-col w-1/2" id="createForm" method="POST" action="{{ route('backend:publication:store') }}">
	@csrf
	<button class="p-4 m-2 shadow-lg bg-white" type="submit" id="submit-btn">Submit</button>
	<div class="flex">
		<label class="self-center">Title</label>
		<div class="flex flex-col">
			<input class="self-center m-2 p-2 bg-white shadow-md rounded" type="text" name="title">
			<p class="title-required hidden text-red text-base">*Title is required</p>
		</div>
	</div>
	<text-input :name="'paper_url'" :data=null/>
	<div class="flex">
		<label class="self-center">Conference/Journal</label>
		<div class="flex flex-col">
			<input class="self-center m-2 p-2 bg-white shadow-md rounded" type="text" name="conference">
			<p class="conference-required hidden text-red text-base">*Conference is required</p>
		</div>
	</div>
	<div class="flex">
		<label class="self-center">Conference/Journal Url</label>
		<input class="self-center m-2 p-2 bg-white shadow-md rounded" type="text" name="conference_url">
	</div>
	<div class="flex">
		<label class="self-center">Citations</label>
		<input class="self-center m-2 p-2 bg-white shadow-md rounded" type="number" name="citations">
	</div>
	<div class="flex">
		<label class="self-center">Publication Date</label>
		<div class="flex flex-col">
			<input class="self-center m-2 p-2 bg-white shadow-md rounded datepick" type="date" name="publication_date">
			<p class="date-required hidden text-red text-base">*Publication Date is required</p>
		</div>
	</div>
	<div class="flex m-2">
    	<label class="p-2">Related Projects</label>
	    <div id='app'>
		    <div class='tagHere project'></div>
		    <input type="text" name="ptags-field"/>
		</div>
	</div>
	<input type="hidden" id="tag_values" name="tags">
	<div class="flex">
		<label class="pt-4">Highlight</label>
		<input class="self-center mt-4 m-2" type="checkbox" name="highlight" value="true">
		<input class="self-center mt-4 m-2 border border-grey" type="text" name="rank" placeholder="Rank">
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

		var p_tags = [];
		@foreach($p_title as $title)
		p_tags.push("{{ $title }}");
		@endforeach

	    $( "input[name=ptags-field]" ).autocomplete({
	      source: p_tags,
	      minLength: 0,
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
	    	var title = $('input[name=title]').val();
	    	var conference = $('input[name=conference]').val();
	    	var date = $('input[name=publication_date]').val();
	    	if(title == ''){
	    		$('.title-required').show();
	    		incomplete = true;
	    	}
	    	if(conference == ''){
	    		$('.conference-required').show();
	    		incomplete = true;
	    	}
	    	if(date == ''){
	    		$('.date-required').show();
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
	    		$('#createForm').submit();
	    	}
	    });

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
	});
</script>
@endsection