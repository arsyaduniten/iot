@extends('public.base')

@section('content')
<div class="flex flex-col w-full justify-start overflow-x-hidden">
	<div class="flex w-full fixed pin-t bg-grey-dark shadow-md this-white">
		<div class="flex flex-no-shrink mx-6 py-6">
			<a class="no-underline font-bold text-2xl" href="/">Sami Hajjaj</a>
		</div>
		<div class="hidden md:flex justify-between py-6 px-12">
				<a class="no-underline hover:text-blue-darker mx-4" href="/profile">Profile</a>
				<a class="no-underline hover:text-blue-darker mx-4" href="/academic">Academic</a>
				<a class="border-b-4 border-blue-darker mx-4 font-bold">Research</a>
				<a class="no-underline hover:text-blue-darker mx-4" href="/mycorner">My Corner</a>
				<a class="no-underline hover:text-blue-darker mx-4" href="/contact">Contact Me</a>
		</div>
	</div>
	<div class="flex">
		<div class="hidden md:flex md:flex-col px-6 bg-grey-darker py-6 h-screen shadow-md fixed left-nav">
			<div class="flex flex-col pt-4">
				<p class="font-bold this-white text-xl">Latest Activity:</p>
				@foreach(\App\LatestActivity::where('type','mycorner')->orderBy('created_at', 'desc')->take(1)->get() as $latest)
				<a href="{{ $latest->link }}" class="pt-2 py-1 text-blue-lighter hover:text-blue-light">{{ $latest->text }}</a>
				@endforeach
				@foreach(\App\LatestActivity::where('type','other')->orderBy('created_at', 'desc')->take(4)->get() as $latest)
				<a href="{{ $latest->link }}" class="pt-2 py-1 text-blue-lighter hover:text-blue-light">{{ $latest->text }}</a>
				@endforeach
			</div>
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
		</div>
		<div class="text-left w-full h-screen mt-16 ml-250" >
			<div class="flex w-full m-8 justify-left overflow-x-scroll md:overflow-x-visible">
				<a href="?active=researches" class="bg-grey-lighter text-teal-dark px-6 py-4 border border-grey sub-nav default" id="researches-tab" content-id="researches">Research Areas</a>
				<a href="?active=projects" class="bg-grey-lighter text-teal-dark px-6 py-4 border border-grey sub-nav" id="projects-tab" content-id="projects">Projects</a>
				<a href="?active=fundings" class="bg-grey-lighter text-teal-dark px-6 py-4 border border-grey sub-nav" id="fundings-tab" content-id="fundings">Grants & Funding</a>
				<a href="?active=collaborators" class="bg-grey-lighter text-teal-dark px-6 py-4 border border-grey sub-nav" id="collaborators-tab" content-id="collaborators">Industrial Collaboration</a>
				{{-- <a href="?active=colleagues" class="bg-grey-lighter text-teal-dark px-6 py-4 border border-grey sub-nav" id="colleagues-tab" content-id="colleagues">Colleagues</a> --}}
				<a href="?active=publications" class="bg-grey-lighter text-teal-dark px-6 py-4 border border-grey sub-nav" id="publications-tab" content-id="publications">Publications</a>
				<a href="?active=awards" class="bg-grey-lighter text-teal-dark px-6 py-4 border border-grey sub-nav" id="awards-tab" content-id="awards">Innovation Awards</a>
			</div>
			<div class="flex flex-col h-full overflow-x-scroll p-4">
				<div class="flex flex-wrap">
					@foreach($tags as $tag)
					<button class="rounded-full bg-inherit border border-grey cursor-default this-black px-4 py-2 mx-4 my-2 text-sm">#{{ $tag }}</button>
					@endforeach
				</div>
				<div class="border border-grey-light mt-4"></div>
				@if(!is_null($projects))
				<table class="hidden content mt-6" id="projects">
			        <tr class="bg-grey p-5 text-left">
			            <th class="this-black py-5 px-6">TITLE</th>
			            <th class="this-black py-5 px-6">FROM</th>
			            <th class="this-black py-5 px-6">TO</th>
			        </tr>
			        @foreach($projects as $project)
			        <tr class="bg-grey-lightest p-5 text-left">
			            <td class="this-black py-5 px-6"><a class="text-blue-dark font-bold" href="/details?type=project&id={{ $project['id'] }}">{{ $project['title'] }}</a></td>
			            <td class="this-black py-5 px-6">{{ \Carbon\Carbon::parse($project['start_date'])->year }}</td>
			            <td class="this-black py-5 px-6">{{ \Carbon\Carbon::parse($project['end_date'])->gte(\Carbon\Carbon::today()) ? "Present" : \Carbon\Carbon::parse($project['end_date'])->year }}</td>
			        </tr>
			        @endforeach
			    </table>
				@endif
				@if(!is_null($researches))
				<table class="hidden content mt-6" id="researches">
			        <tr class="bg-grey p-5 text-left">
			            <th class="this-black py-5 px-6">AREAS</th>
			            <th class="this-black py-5 px-6">DESCRIPTION</th>
			            <th class="this-black py-5 px-6">FROM</th>
			            <th class="this-black py-5 px-6">TO</th>
			        </tr>
			        @foreach($researches as $research)
			        <tr class="bg-grey-lightest p-5 text-left">
			            <td class="this-black py-5 px-6"><a class="text-blue-dark font-bold" href="/details?type=research&id={{ $research['id'] }}">{{ $research['research_area'] }}</a></td>
			            <td class="this-black py-5 px-6"><?php echo $research->description ?></td>
			            <td class="this-black py-5 px-6">{{ \Carbon\Carbon::parse($research->start_date)->year }}</td>
			            <td class="this-black py-5 px-6">{{ \Carbon\Carbon::parse($research->end_date)->gte(\Carbon\Carbon::today()) ? "Present" : \Carbon\Carbon::parse($research->end_date)->year }}</td>
			        </tr>
			        @endforeach
			    </table>
				@endif
				@if(!is_null($awards))
				<table class="hidden content mt-6" id="awards">
			        <tr class="bg-grey p-5 text-left">
			            <th class="this-black py-5 px-6">TITLE</th>
			            <th class="this-black py-5 px-6">BY</th>
			            <th class="this-black py-5 px-6">YEAR</th>
			        </tr>
			        @foreach($awards as $award)
			        <tr class="bg-grey-lightest p-5 text-left">
			            <td class="this-black py-5 px-6"><a class="no-underline text-blue-dark font-bold" target="_blank" href='{{ is_null($award->file_url_s3) ? $award->file_url : $award->file_url_s3 }}'><?php echo $award->title ?></a></td>
			            <td class="this-black py-5 px-6">{{ $award->awarded_by }}</td>
			            <td class="this-black py-5 px-6">{{ \Carbon\Carbon::parse($award->date_obtained)->year }}</td>
			        </tr>
			        @endforeach
			    </table>
				@endif
				@if(!is_null($fundings))
				<table class="hidden content mt-6" id="fundings">
			        <tr class="bg-grey p-5 text-left">
			            <th class="this-black py-5 px-6">AMOUNT</th>
			            <th class="this-black py-5 px-6">YEAR</th>
			            <th class="this-black py-5 px-6">GRANTED BY</th>
			            <th class="this-black py-5 px-6">RELATED PROJECT(S)</th>
			        </tr>
			        @foreach($fundings as $funding)
			        <tr class="bg-grey-lightest p-5 text-left">
			            <td class="this-black py-5 px-6">MYR<?php echo number_format($funding->amount) ?></td>
			            <td class="this-black py-5 px-6">{{ \Carbon\Carbon::parse($funding->start_date)->year }}</td>
			            <td class="this-black py-5 px-6"><?php echo $funding->granted_by ?></td>
			            <td class="this-black py-5 px-6">{{ implode(", ", $funding->tagNames()) }}</td>
			        </tr>
			        @endforeach
			    </table>
				@endif
				@if(!is_null($publications))
				<div class="hidden content" id="publications">
					<p class="text-3xl text-left m-4">Highlighted Publications</p>
					<table class="mt-6">
				        <tr class="bg-grey p-5 text-left">
				            <th class="this-black py-5 px-6">TITLE</th>
				            <th class="this-black py-5 px-6">PUBLISHED ON</th>
				            <th class="this-black py-5 px-6">CONFERENCE/JOURNAL</th>
				            <th class="this-black py-5 px-6">CITATIONS</th>
				        </tr>
				        @foreach($highlighted as $publication)
				        <tr class="bg-grey-lightest p-5 text-left">
				            <td class="this-black py-5 px-6"><a target="_blank" href="{{ $publication->paper_url }}" class="appearance-none no-underline text-blue-dark font-bold"><?php echo $publication->title ?></a></td>
				            <td class="this-black py-5 px-6">{{ \Carbon\Carbon::parse($publication->publication_date)->year }}</td>
				            <td class="this-black py-5 px-6"><a target="_blank" href="{{ $publication->conference_url }}" class="appearance-none no-underline text-blue-dark font-bold">{{ $publication->conference }}</a></td>
				            <td class="this-black py-5 px-6">{{ $publication->citations }}</td>
				        </tr>
				        @endforeach
				    </table>
					<p class="text-3xl text-left m-4">All Publications</p>
					<table class="mt-6">
				        <tr class="bg-grey p-5 text-left">
				            <th class="this-black py-5 px-6">TITLE</th>
				            <th class="this-black py-5 px-6">PUBLISHED ON</th>
				            <th class="this-black py-5 px-6">CONFERENCE/JOURNAL</th>
				            <th class="this-black py-5 px-6">CITATIONS</th>
				        </tr>
				        @foreach($publications as $publication)
				        <tr class="bg-grey-lightest p-5 text-left">
				            <td class="this-black py-5 px-6"><a target="_blank" href="{{ $publication->paper_url }}" class="appearance-none no-underline text-blue-dark font-bold"><?php echo $publication->title ?></a></td>
				            <td class="this-black py-5 px-6">{{ \Carbon\Carbon::parse($publication->publication_date)->year }}</td>
				            <td class="this-black py-5 px-6"><a target="_blank" href="{{ $publication->conference_url }}" class="appearance-none no-underline text-blue-dark font-bold">{{ $publication->conference }}</a></td>
				            <td class="this-black py-5 px-6">{{ $publication->citations }}</td>
				        </tr>
				        @endforeach
				    </table>
				</div>
				@endif
				@if(!$collaborators->isEmpty())
				<table class="hidden content mt-6" id="collaborators">
			        <tr class="bg-grey p-5 text-left">
			            <th class="this-black py-5 px-6">NAME</th>
			            <th class="this-black py-5 px-6">DESCRIPTION</th>
			        </tr>
			        @foreach($collaborators as $collaborator)
			        <tr class="bg-grey-lightest p-5 text-left">
			            <td class="this-black py-5 px-6"><a target="_blank" href="{{ $collaborator->company_url }}" class="appearance-none no-underline text-blue-dark font-bold"><?php echo $collaborator->name ?></td></a>
			            <td class="this-black py-5 px-6"><?php echo $collaborator->description ?></td>
			        </tr>
			        @endforeach
			    </table>
				@endif
			</div>
		</div>
	</div>
</div>





@endsection

@section('script')
<script type="text/javascript">
    $(document).ready(function(){
    	@if(Request::get('active') == null)
    	window.location.href = "?active=researches";
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