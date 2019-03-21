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
    <a class="p-4 m-4 rounded text-black text-xl bg-green action-btns" href="/backend/research">View All</a>
</div>
<form class="container mx-auto flex flex-col w-1/2" method="POST" action="{{ route('backend:research:store') }}">
	@csrf
	{{-- <div class="flex">
		<label class="self-center">User</label>
		<input class="self-center m-2 p-2 bg-white shadow-md rounded" type="text" name="user_id" value="{{ $user->id }}">
	</div> --}}
	<button class="p-4 m-2 shadow-lg bg-white" type="submit" id="submit-btn">Submit</button>
	<text-input :name="'research_area'" :data=null/>
	<div class="flex">
		<label class="pt-4">Description</label>
		<textarea name="description" class="m-2 summernote"></textarea>
	</div>
	<date-input :name="'start_date'" :data=null/>
	<date-input :name="'end_date'" :data=null/>
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
	});
</script>
@endsection