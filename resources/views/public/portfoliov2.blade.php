@extends('public.base')

@section('content')
<div class="flex flex-col w-full">
	<div class="flex w-full bg-grey-dark shadow-md this-white">
		<div class="flex mx-8 py-6">
			<a class="no-underline font-bold text-2xl" href="/v2">Sami Hajjaj</a>
		</div>
		<div class="container mx-auto flex justify-between py-6">
				<a class="no-underline" href="/v2/next">About</a>
				<a class="border-b-4 border-blue-darker font-bold">Academic</a>
				<a class="no-underline" href="/v2/research">Research</a>
				<a class="no-underline" href="/v2/mycorner">My Corner</a>
				<a class="no-underline" href="/v2/contact">Contact</a>
		</div>
	</div>
	<div class="flex">
		<div class="flex flex-col px-8 bg-grey-darker py-6 h-screen shadow-md">
			<div class="flex flex-col pt-4">
				<p class="font-extrabold this-white text-xl">Find me on:</p>
				<a class="pt-2 py-1 this-white">LinkedIn</a>
				<a class="py-1 this-white">Google Scholar</a>
				<a class="py-1 this-white">Facebook</a>
				<a class="py-1 this-white">IEEE</a>
				<a class="py-1 this-white">IMeche</a>
				<a class="py-1 this-white">BEM</a>
				<a class="py-1 this-white">IEM</a>
				<a class="py-1 this-white">Others</a>
			</div>
			<div class="flex flex-col pt-4">
				<p class="font-bold this-white text-xl">Recent Activity:</p>
				<a class="pt-2 py-1 this-white">Latest Post</a>
				<a class="py-1 this-white">Recent Project</a>
				<a class="py-1 this-white">Recent Award</a>
			</div>
		</div>
		<div class="text-center w-full overflow-y-auto">
			<p class="text-5xl font-bold text-teal-dark pt-8">{{ $data->title }}</p>
			@if(!is_null($data->snss))
			<div class="flex justify-center">
			@foreach($data->snss as $sns)
				<a class="text-xl text-teal-dark pt-4 p-4" target="_blank" href="{{ $sns->url }}">{{ $sns->display_name }}</a>
				<span class="border border-teal-dark my-4"></span>
			@endforeach
			</div>
			@endif
			{{-- <p class="text-xl text-grey-darker pt-6">A short paragraph summarizes my career and highlight its key achievements<br> and milestones; it acts as a condensed version of a cover letter, to intrigue<br> to the reader/visitor to learn more about me. This should not <br>be more than 3 to 4 lines maximum.</p> --}}
			<div class="flex w-full container mx-auto m-8 justify-center">
				<button class="bg-grey-lighter px-6 py-4 border border-grey text-teal-dark sub-nav" content-id="education">Education <br>Background</button>
				<button class="bg-grey-lighter px-6 py-4 border border-grey text-teal-dark sub-nav" content-id="bodies">Professional Bodies</button>
				<button class="bg-grey-lighter px-6 py-4 border border-grey text-teal-dark sub-nav" content-id="experience">Work Experience</button>
				<button class="bg-grey-lighter px-6 py-4 border border-grey text-teal-dark sub-nav" content-id="fundings">Fundings</button>
				<button class="bg-grey-lighter px-6 py-4 border border-grey text-teal-dark sub-nav" content-id="publications">List of Publications</button>
				<button class="bg-grey-lighter px-6 py-4 border border-grey text-teal-dark sub-nav" content-id="awards">Awards and Recognition</button>
			</div>
			<div class="flex flex-col h-full w-full border-2 border-grey container mx-auto mb-12 p-4">
				<div class="flex flex-wrap">
					@foreach($tags as $tag)
					<button class="rounded-full bg-inherit border border-grey cursor-default this-black px-4 py-2 mx-4 my-2 text-sm">#{{ $tag }}</button>
					@endforeach
				</div>
				<div class="border border-grey-light mt-4"></div>
				@foreach($about as $desc)
				<div class="hidden content p-6" id="{{ $desc->type }}"><?php echo $desc->description ?></div>
				@endforeach
				@if(!is_null($fundings))
				<table class="hidden content mx-auto mt-6" id="fundings">
			        <tr class="bg-grey p-5 text-center">
			            <th class="this-black py-5 px-6">AMOUNT</th>
			            <th class="this-black py-5 px-6">YEAR</th>
			            <th class="this-black py-5 px-6">GRANTED BY</th>
			            <th class="this-black py-5 px-6">RELATED PROJECT(S)</th>
			        </tr>
			        @foreach($fundings as $funding)
			        <tr class="bg-grey-lightest p-5 text-center">
			            <td class="this-black py-5 px-6">MYR<?php echo number_format($funding->amount) ?></td>
			            <td class="this-black py-5 px-6">{{ \Carbon\Carbon::parse($funding->start_date)->year }}</td>
			            <td class="this-black py-5 px-6"><?php echo $funding->granted_by ?></td>
			            <td class="this-black py-5 px-6">{{ implode(", ", $funding->tagNames()) }}</td>
			        </tr>
			        @endforeach
			    </table>
				@endif
				@if(!is_null($awards))
				<table class="hidden content mx-auto mt-6" id="awards">
			        <tr class="bg-grey p-5 text-center">
			            <th class="this-black py-5 px-6">TITLE</th>
			            <th class="this-black py-5 px-6">BY</th>
			            <th class="this-black py-5 px-6">YEAR</th>
			        </tr>
			        @foreach($awards as $award)
			        <tr class="bg-grey-lightest p-5 text-center">
			            <td class="this-black py-5 px-6"><?php echo $award->title ?></td>
			            <td class="this-black py-5 px-6">{{ $award->awarded_by }}</td>
			            <td class="this-black py-5 px-6">{{ \Carbon\Carbon::parse($award->date_obtained)->year }}</td>
			        </tr>
			        @endforeach
			    </table>
				@endif
				@if(!is_null($publications))
				<div class="hidden content mx-auto" id="publications">
					<p class="text-3xl text-center m-4">Highlighted Publications</p>
					<table class="mt-6">
				        <tr class="bg-grey p-5 text-center">
				            <th class="this-black py-5 px-6">TITLE</th>
				            <th class="this-black py-5 px-6">PUBLISHED ON</th>
				            <th class="this-black py-5 px-6">CONFERENCE/JOURNAL</th>
				            <th class="this-black py-5 px-6">CITATIONS</th>
				        </tr>
				        @foreach($highlighted as $publication)
				        <tr class="bg-grey-lightest p-5 text-center">
				            <td class="this-black py-5 px-6"><?php echo $publication->title ?></td>
				            <td class="this-black py-5 px-6">{{ \Carbon\Carbon::parse($publication->publication_date)->toDateString() }}</td>
				            <td class="this-black py-5 px-6">{{ $publication->conference }}</td>
				            <td class="this-black py-5 px-6">{{ $publication->citations }}</td>
				        </tr>
				        @endforeach
				    </table>
					<p class="text-3xl text-center m-4">All Publications</p>
					<table class="mt-6">
				        <tr class="bg-grey p-5 text-center">
				            <th class="this-black py-5 px-6">TITLE</th>
				            <th class="this-black py-5 px-6">PUBLISHED ON</th>
				            <th class="this-black py-5 px-6">CONFERENCE/JOURNAL</th>
				            <th class="this-black py-5 px-6">CITATIONS</th>
				        </tr>
				        @foreach($publications as $publication)
				        <tr class="bg-grey-lightest p-5 text-center">
				            <td class="this-black py-5 px-6"><?php echo $publication->title ?></td>
				            <td class="this-black py-5 px-6">{{ \Carbon\Carbon::parse($publication->publication_date)->toDateString() }}</td>
				            <td class="this-black py-5 px-6">{{ $publication->conference }}</td>
				            <td class="this-black py-5 px-6">{{ $publication->citations }}</td>
				        </tr>
				        @endforeach
				    </table>
				</div>
				@endif
			</div>
		</div>
	</div>
</div>





@endsection

@section('script')
<script type="text/javascript">
    $(document).ready(function(){
    	$('.sub-nav').click(function(e){
    		e.preventDefault();
    		$('.sub-nav').each(function(){
    			$(this).removeClass('bg-green text-white');
				$(this).addClass('bg-grey-lighter text-teal-dark');
    		});
			$(this).removeClass('bg-grey-lighter text-teal-dark');
    		$(this).addClass('bg-green text-white');
    		$(".content").each(function(){
    			$(this).addClass('hidden');
    		});
    		$("#"+$(this).attr('content-id')).removeClass('hidden');
    	});
    });
</script>

@endsection