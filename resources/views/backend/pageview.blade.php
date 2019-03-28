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

	html, body {
	  overflow: scroll !important;
	}
</style>
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-lite.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-lite.js"></script>
@endsection
@section('content')
@include('backend.v2nav')
<form class="container mx-auto text-center" id="createForm" method="post" action="{{ route('update:page', ['id' => $p->id])}}">
@csrf
@method('PUT') 
<div class="flex justify-left">
	<button class="p-4 m-4 bg-green-light rounded" type="submit" id="submit-btn">Save</button>
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
					<input class="text-grey-darker text-center m-2" value="{{ $sns->url }}" name="sns_url_{{ $sns->id }}">
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
				<button class="bg-grey-lighter px-6 py-4 border border-grey text-teal-dark sub-nav-btn" content-id="{{ $sub_nav->content_id }}">{{ $sub_nav->display_text }}</button>
			@endforeach
		</div>
	@endif
	@if($p->has_keywords)
	<div class="flex m-2">
		<label class="self-center">Keyword</label>
		<input class="self-center m-2 p-2 bg-white rounded border border-grey" type="text" id="keyword-input"/>
		<button class="p-2 bg-white rounded border border-grey" id="add-btn">Add</button>
	</div>
    <div class="flex">
        <label class="p-2">Keyword Lists</label>
        <div id='app' class="border border-grey">
            <div class='tagHere'></div>
            <input type="text" name="tags-field"/>
        </div>
    </div>
	<input type="hidden" id="tag_values" name="tags">
	<div class="flex flex-col h-full w-full border-2 border-grey container mx-auto p-4 my-4">
		<div class="flex flex-wrap">
			@foreach($tags as $tag)
			<button class="rounded-full bg-inherit border border-grey cursor-default this-black px-4 py-2 mx-4 my-2 text-sm">#{{ $tag }}</button>
			@endforeach
		</div>
		<div class="border border-grey-light mt-4"></div>
		<div class="m-6">
			@foreach($sub_navs as $sub_nav)
			<div class="flex">
				@if($sub_nav->content_id == 'bodies' or $sub_nav->content_id == 'education' or $sub_nav->content_id == 'experience')
				@else
				<a class="hidden p-4 m-4 rounded text-black text-xl bg-yellow action-btns" href="/backend/<?php echo $sub_nav->content_id == 'education' ? 'about' : $sub_nav->content_id == 'bodies' ? 'about' : $sub_nav->content_id == 'experience' ? 'about' :  $sub_nav->content_id ?>" id="create-btn-{{ $sub_nav->content_id }}">View All <?php echo $sub_nav->content_id == 'education' ? 'Description' : $sub_nav->content_id == 'bodies' ? 'Description' : $sub_nav->content_id == 'experience' ? 'Description' :  ucfirst($sub_nav->content_id) ?></a>
				<a class="hidden p-4 m-4 rounded text-black text-xl bg-green action-btns" href="/backend/<?php echo $sub_nav->content_id == 'education' ? 'about' : $sub_nav->content_id == 'bodies' ? 'about' : $sub_nav->content_id == 'experience' ? 'about' :  $sub_nav->content_id ?>/create" id="add-btn-{{ $sub_nav->content_id }}">Create New <?php echo $sub_nav->content_id == 'education' ? 'Description' : $sub_nav->content_id == 'bodies' ? 'Description' : $sub_nav->content_id == 'experience' ? 'Description' :  ucfirst($sub_nav->content_id)?></a>
			</div>
			@endforeach
		</div>
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

		$(".sub-nav-btn").click(function(e){
			e.preventDefault();
			$(".sub-nav-btn").each(function(){
				$(this).removeClass('bg-green text-white');
				$(this).addClass('bg-grey-lighter text-teal-dark');
			});
			$(this).removeClass('bg-grey-lighter text-teal-dark');
			$(this).addClass('bg-green text-white');
			$(".action-btns").each(function(){
				$(this).addClass('hidden');
			});
			$("#create-btn-"+$(this).attr('content-id')).removeClass('hidden');
			$("#add-btn-"+$(this).attr('content-id')).removeClass('hidden');
		});

		$('.summernote').summernote({
	    	height:200,
	    	width: 800,
	    });
	    $(".note-editor").addClass("m-2 shadow-md");
	    @if(!is_null($desc))
	    $('.summernote').summernote("code", `<?php echo $desc->content ?>`);
	    @endif

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

	  	@foreach($tags as $tag)
		addTag("{{ $tag }}");
		@endforeach  


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