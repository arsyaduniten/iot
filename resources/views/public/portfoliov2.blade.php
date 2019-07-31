@extends('public.base')

@section('content')
<div class="flex flex-col w-full">
	<div class="flex fixed pin-t w-full bg-grey-dark shadow-md this-white">
		<div class="flex flex-no-shrink mx-6 py-6">
			<a class="no-underline font-bold text-2xl" href="/">Sami Hajjaj</a>
		</div>
		<div class="flex justify-between py-6 px-12">
				<a class="no-underline hover:text-blue-darker mx-4" href="/profile">Profile</a>
				<a class="border-b-4 border-blue-darker mx-4 font-bold">Academic</a>
				<a class="no-underline hover:text-blue-darker mx-4" href="/research">Research</a>
				<a class="no-underline hover:text-blue-darker mx-4" href="/mycorner">My Corner</a>
				<a class="no-underline hover:text-blue-darker mx-4" href="/contact">Contact Me</a>
		</div>
	</div>
	<div class="flex">
		<div class="hidden md:flex md:flex-col px-6 bg-grey-darker py-6 h-screen shadow-md fixed left-nav">
			<div class="flex flex-col pt-4">
				<p class="font-extrabold this-white text-xl">Find me on:</p>
				@foreach(\App\Sns::all() as $sns)
					@if($sns->category == 'professional')
					<a class="py-1 text-blue-lighter hover:text-blue-light" target="_blank" href="{{ $sns->url }}">{{ $sns->display_name }}</a>
					@endif
				@endforeach
				<div class="border border-blue-lighter my-2 mr-2"></div>
				@foreach(\App\Sns::all() as $sns)
					@if($sns->category == 'academic')
					<a class="py-1 text-blue-lighter hover:text-blue-light" target="_blank" href="{{ $sns->url }}">{{ $sns->display_name }}</a>
					@endif
				@endforeach
				<div class="border border-blue-lighter my-2 mr-2"></div>
				@foreach(\App\Sns::all() as $sns)
					@if($sns->category == 'training')
					<a class="py-1 text-blue-lighter hover:text-blue-light" target="_blank" href="{{ $sns->url }}">{{ $sns->display_name }}</a>
					@endif
				@endforeach
			</div>
			<div class="flex flex-col pt-4">
				<p class="font-bold this-white text-xl">Latest Activity:</p>
				@foreach(\App\LatestActivity::where('type','mycorner')->orderBy('created_at', 'desc')->take(1)->get() as $latest)
				<a href="{{ $latest->link }}" class="pt-2 py-1 text-blue-lighter hover:text-blue-light">{{ $latest->text }}</a>
				@endforeach
				<div class="border border-blue-lighter my-2 mr-2"></div>
				@foreach(\App\LatestActivity::where('type','other')->orderBy('created_at', 'desc')->take(4)->get() as $latest)
				<a href="{{ $latest->link }}" class="pt-2 py-1 text-blue-lighter hover:text-blue-light">{{ $latest->text }}</a>
				@endforeach
			</div>
		</div>
		<div class="text-center w-full h-screen mt-16" style="margin-left:250px;">
			{{-- <p class="text-5xl font-bold text-teal-dark pt-8">{{ $data->title }}</p> --}}
			{{-- @if(!is_null($data->snss))
			<div class="flex justify-center">
			@foreach($data->snss as $sns)
				<a class="text-xl text-teal-dark pt-4 p-4" target="_blank" href="{{ $sns->url }}">{{ $sns->display_name }}</a>
				<span class="border border-teal-dark my-4"></span>
			@endforeach
			</div>
			@endif --}}
			{{-- <p class="text-xl text-grey-darker pt-6">A short paragraph summarizes my career and highlight its key achievements<br> and milestones; it acts as a condensed version of a cover letter, to intrigue<br> to the reader/visitor to learn more about me. This should not <br>be more than 3 to 4 lines maximum.</p> --}}
			<div class="flex w-full m-8 justify-left">
				<a href="?active=education" class="bg-grey-lighter px-6 py-4 border border-grey text-teal-dark sub-nav default" id='education-tab' content-id="education">Education</a>
				<a href="?active=experience" class="bg-grey-lighter px-6 py-4 border border-grey text-teal-dark sub-nav" id='experience-tab' content-id="experience">Employment</a>
				<a href="?active=qualifications" class="bg-grey-lighter px-6 py-4 border border-grey text-teal-dark sub-nav" id='qualifications-tab' content-id="qualifications">Qualifications</a>
				<a href="?active=teaching" class="bg-grey-lighter px-6 py-4 border border-grey text-teal-dark sub-nav" id='teaching-tab' content-id="teaching">Teaching</a>
				<a href="?active=administrative" class="bg-grey-lighter px-6 py-4 border border-grey text-teal-dark sub-nav" id='administrative-tab' content-id="administrative">Administrative</a>
			</div>
			<div class="flex flex-col h-full w-full mb-12 p-4">
				<div class="flex flex-wrap">
					@foreach($tags as $tag)
					<button class="rounded-full bg-inherit border border-grey cursor-default this-black px-4 py-2 mx-4 my-2 text-sm">#{{ $tag }}</button>
					@endforeach
				</div>
				<div class="border border-grey-light mt-4"></div>
				@foreach($about as $desc)
				<div class="hidden content p-6" id="{{ $desc->type }}"><?php echo $desc->description ?></div>
				@endforeach
			</div>
		</div>
	</div>
</div>





@endsection

@section('script')
<script type="text/javascript">
    $(document).ready(function(){
   //  	$('.sub-nav').click(function(e){
   //  		e.preventDefault();
   //  		$('.landing-message').hide();
   //  		$('.sub-nav').each(function(){
   //  			$(this).removeClass('bg-green text-white');
			// 	$(this).addClass('bg-grey-lighter text-teal-dark');
   //  		});
			// $(this).removeClass('bg-grey-lighter text-teal-dark');
   //  		$(this).addClass('bg-green text-white');
   //  		$(".content").each(function(){
   //  			$(this).addClass('hidden');
   //  		});
   //  		$("#"+$(this).attr('content-id')).removeClass('hidden');
   //  	});
    	@if(Request::get('active') == null)
    	window.location.href = "?active=education";
    	@else
		$('.sub-nav').each(function(){
			$(this).removeClass('bg-green text-white');
			$(this).addClass('bg-grey-lighter text-teal-dark');
		});
		$("#{{ Request::get('active') }}-tab").removeClass('bg-grey-lighter text-teal-dark');
		$("#{{ Request::get('active') }}-tab").addClass('bg-green text-white');
		$(".content").each(function(){
			$(this).addClass('hidden');
		});
		$("#"+$("#{{ Request::get('active') }}-tab").attr('content-id')).removeClass('hidden');
    	@endif
    });
</script>

@endsection