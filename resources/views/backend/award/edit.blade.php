@extends('public.base')
@section('head')
<!-- include summernote css/js -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-lite.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-lite.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfobject/2.1.1/pdfobject.min.js"></script>
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
	<a class="p-4 m-4 rounded text-black text-xl bg-green action-btns" href="/backend/award">View All</a>
</div>
<form class="container mx-auto flex flex-col w-1/2" id="editForm" method="POST" action="{{ route('backend:award:update', ['award' => $award]) }}" enctype="multipart/form-data">
	@csrf
	<button class="p-4 m-2 shadow-lg bg-white" type="submit" id="submit-btn">Submit</button>
	@method('PUT')
	<div class="flex">
		<label class="self-center">Title</label>
		<div class="flex flex-col">
			<input class="self-center m-2 p-2 bg-white shadow-md rounded" type="text" name="title" value="{{ $award->title }}">
			<p class="title-required hidden text-red text-base">*Title is required</p>
		</div>
	</div>
	<div class="flex">
		<label class="self-center">Awarded By</label>
		<div class="flex flex-col">
			<input class="self-center m-2 p-2 bg-white shadow-md rounded" type="text" name="awarded_by" value="{{ $award->awarded_by }}">
			<p class="awarded-required hidden text-red text-base">*Awarded By is required</p>
		</div>
	</div>
	<text-input :name="'file_url'" :data="$award->file_url"/>
	<div class="flex m-2">
		<label class="p-2">File/Award</label></label>
	    <input type='file' name="file_upload" /><br>
	</div>
	@if($file_ != '')
	<div class="flex">
		<label class="p-2">File View</label>
		@if($ext == 'png' or $ext == 'jpg' or $ext == 'jpeg')
		    <img src="{{ $file_ }}" width="700" height="700">
		@else
			<a target="_blank" href="{{ $file_ }}">View File</a>
		@endif
	</div>
	@endif
	<div class="flex">
		<label class="pt-4">Description</label>
		<textarea name="description" class="m-2 summernote"></textarea>
	</div>
	<div class="flex">
		<label class="self-center">Date Obtained</label>
		<div class="flex flex-col">
			<input class="self-center m-2 p-2 bg-white shadow-md rounded datepick" type="date" name="date_obtained" value="{{ $award->date_obtained }}">
			<p class="date-required hidden text-red text-base">*Date Obtained is required</p>
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
        $('.summernote').summernote("code", `<?php echo $award->description ?>`);

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
		});;

	    $("#submit-btn").click(function(e){
	    	e.preventDefault();
	    	var incomplete = false;
	    	var title = $('input[name=title]').val();
	    	var awarded = $('input[name=awarded_by]').val();
	    	var date = $('input[name=date_obtained]').val();
	    	if(title == ''){
	    		$('.title-required').show();
	    		incomplete = true;
	    	}
	    	if(awarded == ''){
	    		$('.awarded-required').show();
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
	});
</script>
@endsection