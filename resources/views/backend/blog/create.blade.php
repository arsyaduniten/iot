@extends('public.base')
@section('head')
<!-- include summernote css/js -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-lite.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-lite.js"></script>
@endsection
@section('content')
@include('backend.nav')
<div class="flex container mx-auto">
    <a class="p-4 m-4 rounded text-black text-xl bg-yellow action-btns" href="/v2/backend/getpage/4">Back to Layout</a>
    <a class="p-4 m-4 rounded text-black text-xl bg-green action-btns" href="/backend/blog">View All</a>
</div>
<form class="container mx-auto flex flex-col w-1/2" method="POST" id="createForm" action="{{ route('backend:blog:store') }}">
	@csrf
	<button class="p-4 m-2 shadow-lg bg-white" type="submit" id="submit-btn">Submit</button>
	<text-input :name="'title'" :data=null/>
	<div class="flex">
		<label class="pt-4">Content</label>
		<textarea name="content" class="m-2 summernote"></textarea>
	</div>
	<div class="flex m-2">
    	<label class="p-2">Related Projects</label>
	    <div id='app'>
		    <div class='tagHere project'></div>
		    <input type="text" name="ptags-field"/>
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
            <div class='tagHere keyword'></div>
            <input type="text" name="tags-field"/>
        </div>
    </div>
	<div class="flex">
		<label class="pt-4">Publish</label>
		<input checked="true" class="self-center mt-4 m-2" type="checkbox" name="publish" value="true">
	</div>
	<div class="flex">
		<label class="pt-4">Event</label>
		<input class="self-center mt-4 m-2" type="checkbox" name="event" value="true">
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
	    	$("#createForm").submit();
	    });

	    $("#add-btn").click(function(e){
	  		 e.preventDefault();
			 var el = $("#keyword-input").val()
			 $("#keyword-input").val("");
	 		 addTag(el, ".keyword");
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