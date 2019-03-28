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
<form class="container mx-auto flex flex-col w-1/2" id="createForm" method="POST" action="{{ route('backend:keyword:store') }}">
	@csrf
	<button class="p-4 m-2 shadow-lg bg-white" type="submit" id="submit-btn">Submit</button>
	<text-input :name="'label'" :data=null/>
	<div class="flex m-2">
		<label class="self-center">Keyword</label>
		<input class="self-center m-2 p-2 bg-white shadow-md rounded" type="text" id="keyword-input"/>
		<button class="p-2 bg-white shadow-md rounded" id="add-btn">Add</button>
	</div>
    <div class="flex">
        <label class="p-2">Keyword Lists</label>
        <div id='app'>
            <div class='tagHere'></div>
            <input type="text" name="tags-field"/>
        </div>
    </div>
	<input type="hidden" id="tag_values" name="tags">
	<button class="p-4 m-2 shadow-lg bg-white" type="submit" id="submit-btn">Submit</button>
</form>
@endsection
@section('script')
<script type="text/javascript">

$(document).ready(function() {
	$( "input[name=tags-field]" ).autocomplete({
      minLength: 0,
      select: function (e, ui) {
	        var el = ui.item.label;
	        e.preventDefault();
	        addTag(el);
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
 		 addTag(el);
  	});


    function addTag(element) {
	    $appendHere = $(".tagHere");
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