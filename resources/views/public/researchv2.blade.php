@extends('public.base')

@section('content')
<div class="flex flex-col w-full">
	<div class="flex w-full fixed pin-t bg-grey-dark shadow-md this-white">
		<div class="flex flex-no-shrink mx-6 py-6">
			<a class="no-underline font-bold text-2xl" href="/v2">Sami Hajjaj</a>
		</div>
		<div class="container mx-auto flex justify-between py-6 px-12">
				<a class="no-underline hover:text-blue-darker" href="/v2/next">Profile</a>
				<a class="no-underline hover:text-blue-darker" href="/v2/portfolio">Academic</a>
				<a class="border-b-4 border-blue-darker font-bold">Research</a>
				<a class="no-underline hover:text-blue-darker" href="/v2/mycorner">My Corner</a>
				<a class="no-underline hover:text-blue-darker" href="/v2/contact">Contact Me</a>
		</div>
	</div>
	<div class="flex">
		<div class="flex flex-col px-6 bg-grey-darker py-6 h-screen shadow-md fixed left-nav">
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
				<p class="font-bold this-white text-xl">Recent Activity:</p>
				<a class="pt-2 py-1 this-white">Latest Post</a>
				<a class="py-1 this-white">Recent Project</a>
				<a class="py-1 this-white">Recent Award</a>
			</div>
		</div>
		<div class="text-center w-full h-screen mt-16" style="margin-left:15%">
			<div class="flex w-full container mx-auto m-8 justify-center">
				<button class="bg-grey-lighter text-teal-dark px-6 py-4 border border-grey sub-nav default" content-id="researches">Research Areas</button>
				<button class="bg-grey-lighter text-teal-dark px-6 py-4 border border-grey sub-nav" content-id="projects">Active Projects</button>
				<button class="bg-grey-lighter text-teal-dark px-6 py-4 border border-grey sub-nav" content-id="fundings">Grants & Funding</button>
				<button class="bg-grey-lighter text-teal-dark px-6 py-4 border border-grey sub-nav" content-id="collaborators">Industrial Collaboration</button>
				<button class="bg-grey-lighter text-teal-dark px-6 py-4 border border-grey sub-nav" content-id="colleagues">Colleagues</button>
				<button class="bg-grey-lighter text-teal-dark px-6 py-4 border border-grey sub-nav" content-id="publications">Publications</button>
				<button class="bg-grey-lighter text-teal-dark px-6 py-4 border border-grey sub-nav" content-id="awards">Innovation Awards</button>
			</div>
			<div class="flex flex-col h-full w-full border-2 border-grey container mx-auto p-4">
				<div class="flex flex-wrap">
					@foreach($tags as $tag)
					<button class="rounded-full bg-inherit border border-grey cursor-default this-black px-4 py-2 mx-4 my-2 text-sm">#{{ $tag }}</button>
					@endforeach
				</div>
				<div class="border border-grey-light mt-4"></div>
				<p class="container mx-auto my-8 mt-12 font-bold text-5xl text-grey-darker landing-message">Click on above buttons to get started.</p>
				@if(!is_null($projects))
				<table class="hidden content mx-auto mt-6" id="projects">
			        <tr class="bg-grey p-5 text-center">
			            <th class="this-black py-5 px-6">TITLE</th>
			            <th class="this-black py-5 px-6">FROM</th>
			            <th class="this-black py-5 px-6">TO</th>
			        </tr>
			        @foreach($projects as $project)
			        <tr class="bg-grey-lightest p-5 text-center">
			            <td class="this-black py-5 px-6"><a class="text-blue-dark font-bold" href="/details?type=project&id={{ $project['id'] }}">{{ $project['title'] }}</a></td>
			            <td class="this-black py-5 px-6">{{ \Carbon\Carbon::parse($project['start_date'])->year }}</td>
			            <td class="this-black py-5 px-6">{{ \Carbon\Carbon::parse($project['end_date'])->gte(\Carbon\Carbon::today()) ? "Present" : \Carbon\Carbon::parse($project['end_date'])->year }}</td>
			        </tr>
			        @endforeach
			    </table>
				@endif
				@if(!is_null($researches))
				<table class="hidden content mx-auto mt-6" id="researches">
			        <tr class="bg-grey p-5 text-center">
			            <th class="this-black py-5 px-6">AREAS</th>
			            <th class="this-black py-5 px-6">DESCRIPTION</th>
			            <th class="this-black py-5 px-6">FROM</th>
			            <th class="this-black py-5 px-6">TO</th>
			        </tr>
			        @foreach($researches as $research)
			        <tr class="bg-grey-lightest p-5 text-center">
			            <td class="this-black py-5 px-6"><a class="text-blue-dark font-bold" href="/details?type=research&id={{ $research['id'] }}">{{ $research['research_area'] }}</a></td>
			            <td class="this-black py-5 px-6"><?php echo $research->description ?></td>
			            <td class="this-black py-5 px-6">{{ \Carbon\Carbon::parse($research->start_date)->year }}</td>
			            <td class="this-black py-5 px-6">{{ \Carbon\Carbon::parse($research->end_date)->gte(\Carbon\Carbon::today()) ? "Present" : \Carbon\Carbon::parse($research->end_date)->year }}</td>
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
			            <td class="this-black py-5 px-6"><a class="no-underline text-blue-dark font-bold" target="_blank" href='{{ is_null($award->file_url_s3) ? $award->file_url : $award->file_url_s3 }}'><?php echo $award->title ?></a></td>
			            <td class="this-black py-5 px-6">{{ $award->awarded_by }}</td>
			            <td class="this-black py-5 px-6">{{ \Carbon\Carbon::parse($award->date_obtained)->year }}</td>
			        </tr>
			        @endforeach
			    </table>
				@endif
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
				@if(!$collaborators->isEmpty())
				<table class="hidden content mx-auto mt-6" id="collaborators">
			        <tr class="bg-grey p-5 text-center">
			            <th class="this-black py-5 px-6">LOGO</th>
			            <th class="this-black py-5 px-6">NAME</th>
			            <th class="this-black py-5 px-6">DESCRIPTION</th>
			        </tr>
			        @foreach($collaborators as $collaborator)
			        <tr class="bg-grey-lightest p-5 text-center">
			            <td class="this-black py-5 px-6">
			            		@if($collaborator->logo_url != NULL)
								<img width="50" height="50" class="" src="{{ \Image::make($collaborator->logo_url)->greyscale()->encode('data-url') }}">
								@endif
						</td>
			            <td class="this-black py-5 px-6"><?php echo $collaborator->name ?></td>
			            <td class="this-black py-5 px-6"><?php echo $collaborator->description ?></td>
			        </tr>
			        @endforeach
			    </table>
				@endif
				@if(!$colleagues->isEmpty())
				<table class="hidden content mx-auto mt-6" id="colleagues">
			        <tr class="bg-grey p-5 text-center">
			            <th class="this-black py-5 px-6">IMAGE</th>
			            <th class="this-black py-5 px-6">NAME</th>
			            <th class="this-black py-5 px-6">RELATED PROJECTS</th>
			        </tr>
			        @foreach($colleagues as $colleague)
			        <tr class="bg-grey-lightest p-5 text-center">
			            <td class="this-black py-5 px-6">
			            		@if($colleague->image_url != NULL)
								<img width="50" height="50" class="" src="{{ \Image::make($colleague->image_url)->greyscale()->encode('data-url') }}">
								@endif
						</td>
			            <td class="this-black py-5 px-6"><?php echo $colleague->fullname?></td>
			            <td class="this-black py-5 px-6">{{ implode(", ", $colleague->tagNames()) }}</td>
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
    	$('.sub-nav').click(function(e){
    		e.preventDefault();
    		$('.landing-message').hide();
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
    	$('.default').trigger('click');
    });
</script>

@endsection