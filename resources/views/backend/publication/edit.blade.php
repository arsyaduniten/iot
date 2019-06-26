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
    <a class="p-4 m-4 rounded text-black text-xl bg-yellow action-btns" href="/v2/backend/getpage/3">Back to Layout</a>
    <a class="p-4 m-4 rounded text-black text-xl bg-green action-btns" href="/backend/publication">View All</a>
</div>
<form class="container mx-auto flex flex-col w-1/2" id="editForm" method="POST" action="{{ route('backend:publication:update', ['publication' => $publication]) }}">
	@csrf
	@method('PUT')
	<button class="p-4 m-2 shadow-lg bg-white" type="submit" id="submit-btn">Submit</button>
	<text-input :name="'title'" :data="$publication->title"/>
	<text-input :name="'paper_url'" :data="$publication->paper_url"/>
	<div class="flex">
		<label class="self-center">Conference/Journal</label>
		<input class="self-center m-2 p-2 bg-white shadow-md rounded" type="text" name="conference" value="{{ $publication->conference }}">
	</div>
	<div class="flex">
		<label class="self-center">Conference/Journal Url</label>
		<input class="self-center m-2 p-2 bg-white shadow-md rounded" type="text" name="conference_url" value="{{ $publication->conference_url }}">
	</div>
	<div class="flex">
		<label class="self-center">Citations</label>
		<input class="self-center m-2 p-2 bg-white shadow-md rounded" type="number" name="citations" value="{{ $publication->citations }}">
	</div>
	<date-input :name="'publication_date'" :data="$publication->publication_date"/>
	<div class="flex m-2">
    	<label class="p-2">Related Projects</label>
	    <div id='app'>
		    <div class='tagHere project'></div>
		    <input type="text" name="ptags-field"/>
		</div>
	</div>
	<div class="flex">
		<label class="pt-4">Highlight</label>
		<input class="self-center mt-4 m-2" type="checkbox" name="highlight" value="true">
		<input class="self-center mt-4 m-2 border border-grey" type="text" name="rank" value="{{ $publication->rank }}" placeholder="Rank">
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
        $('.summernote').summernote("code", "<?php echo $publication->description ?>");

        @if($publication->highlight == 1)
        	$('input[name=highlight').prop('checked', true);
        @else
        	$('input[name=highlight').prop('checked', false);
        @endif
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
	    	$(".selected_items").each(function(){
	    		// $("#tag_values").append($(this).text()+",");
	    		var tag_text = $(this).text()+",";
    		    $('#tag_values').val($('#tag_values').val() + tag_text);
	    	});
	    	$("#editForm").submit();
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
	});
</script>
@endsection