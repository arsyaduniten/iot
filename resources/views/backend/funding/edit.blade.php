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
	<a class="p-4 m-4 rounded text-black text-xl bg-green action-btns" href="/backend/funding">View All</a>
</div>
<form class="container mx-auto flex flex-col w-1/2" id="editForm" method="POST" action="{{ route('backend:funding:update', ['funding' => $funding]) }}">
	@csrf
	@method('PUT')
	<button class="p-4 m-2 shadow-lg bg-white" type="submit" id="submit-btn">Submit</button>
	<div class="flex">
		<label class="self-center">Granted By</label>
		<div class="flex flex-col">
			<input class="self-center m-2 p-2 bg-white shadow-md rounded" type="text" name="granted_by" value="{{ $funding->granted_by }}">
			<p class="granted-required hidden text-red text-base">*Granted By is required</p>
		</div>
	</div>
	<div class="flex">
		<label class="self-center">Amount</label>
		<div class="flex flex-col">
			<input class="self-center m-2 p-2 bg-white shadow-md rounded" type="text" name="amount" value="{{ $funding->amount }}">
			<p class="amount-required hidden text-red text-base">*Amount is required</p>
		</div>
	</div>
	<div class="flex">
		<label class="self-center">Start Date</label>
		<div class="flex flex-col">
			<input class="self-center m-2 p-2 bg-white shadow-md rounded datepick" type="date" name="start_date" value="{{ $funding->start_date }}">
			<p class="start-required hidden text-red text-base">*Start Date is required</p>
		</div>
	</div>
	<div class="flex">
		<label class="self-center">End Date</label>
		<div class="flex flex-col">
			<input class="self-center m-2 p-2 bg-white shadow-md rounded datepick" type="date" name="end_date" value="{{ $funding->end_date }}">
			<p class="end-required hidden text-red text-base">*End Date is required</p>
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
	    	var granted = $('input[name=granted_by]').val();
	    	var amount = $('input[name=amount]').val();
	    	var start = $('input[name=start_date]').val();
	    	var end = $('input[name=end_date]').val();
	    	if(granted == ''){
	    		$('.granted-required').show();
	    		incomplete = true;
	    	}
	    	if(amount == ''){
	    		$('.amount-required').show();
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