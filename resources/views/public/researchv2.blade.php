@extends('public.base')

@section('content')
<div class="flex flex-col w-full">
	<div class="flex w-full bg-grey-dark shadow-md this-white">
		<div class="flex mx-8 py-6">
			<a class="no-underline font-bold text-2xl" href="/v2">Sami Hajjaj</a>
		</div>
		<div class="container mx-auto flex justify-between py-6">
				<a class="no-underline" href="/v2/next">About</a>
				<a class="no-underline" href="/v2/portfolio">Academic</a>
				<a class="border-b-4 border-blue-darker font-bold">Research</a>
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
			<p class="text-xl text-teal-dark pt-6"><?php echo $data->description->content ?></p>
			<div class="flex w-full container mx-auto m-8 justify-center">
				<button class="bg-grey-lighter text-teal-dark px-6 py-4 border border-grey sub-nav" content-id="researches">Research<br>Areas</button>
				<button class="bg-grey-lighter text-teal-dark px-6 py-4 border border-grey sub-nav" content-id="projects">Active Projects</button>
				<button class="bg-grey-lighter text-teal-dark px-6 py-4 border border-grey sub-nav" content-id="collaborators">Industrial<br>Collaboration</button>
				<button class="bg-grey-lighter text-teal-dark px-6 py-4 border border-grey sub-nav" content-id="researchers">Research<br>Colleagues</button>
				<button class="bg-grey-lighter text-teal-dark px-6 py-4 border border-grey sub-nav" content-id="events">Events &<br>Activities</button>
			</div>
			<div class="flex flex-col h-full w-full border-2 border-grey container mx-auto p-4">
				<div class="flex flex-wrap">
					@foreach($tags as $tag)
					<button class="rounded-full bg-inherit border border-grey cursor-default this-black px-4 py-2 mx-4 my-2 text-sm">#{{ $tag }}</button>
					@endforeach
				</div>
				<div class="border border-grey-light mt-4"></div>
				@if(!is_null($projects))
				<div class="hidden mx-auto content" id="projects">
					<div class="flex mt-6 content">
						<div class="flex flex-col flex-wrap">
							<div class="bg-grey p-5 text-center">
								<p class="this-black font-bold">TITLE</p>
							</div>
							@foreach($projects as $project)
							<div class="text-left bg-grey-lightest p-5">
								<p class="this-black">{{ $project['title'] }}</p>
							</div>
							@endforeach
						</div>
						<div class="flex flex-col flex-wrap bg-grey-lightest">
							<div class="bg-grey p-5 text-center">
								<p class="this-black font-bold">COLLEAGUES</p>
							</div>
							@foreach($projects as $project)
							<div class="flex mx-auto bg-grey-lightest">
								@foreach($project['researchers'] as $researcher)
								<img class="text-xs pt-4 -mx-1" src="{{ Avatar::create($researcher->fullname)->setDimension(40)->setFontSize(15)->toBase64() }}">
								@endforeach
							</div>
							@endforeach
						</div>
						<div class="flex flex-col flex-wrap">
							<div class="bg-grey p-5 text-center">
								<p class="this-black font-bold">FROM</p>
							</div>
							@foreach($projects as $project)
							<div class="text-left bg-grey-lightest p-5">
								<p class="this-black">{{ $project['start_date'] }}</p>
							</div>
							@endforeach
						</div>
						<div class="flex flex-col flex-wrap">
							<div class="bg-grey p-5 text-center">
								<p class="this-black font-bold">TO</p>
							</div>
							@foreach($projects as $project)
							<div class="text-left bg-grey-lightest p-5">
								<p class="this-black">{{ $project['end_date'] }}</p>
							</div>
							@endforeach
						</div>
					</div>
				</div>
				@endif
				@if(!is_null($researches))
				<div class="hidden content mx-auto" id="researches">
					<div class="flex hidden mt-6">
						<div class="flex flex-col flex-wrap">
							<div class="bg-grey p-5 text-center">
								<p class="this-black font-bold">AREAS</p>
							</div>
							@foreach($researches as $research)
							<div class="text-left bg-grey-lightest p-5">
								<p class="this-black">{{ $research->research_area }}</p>
							</div>
							@endforeach
						</div>
						<div class="flex flex-col flex-wrap bg-grey-lightest">
							<div class="bg-grey p-5 text-center">
								<p class="this-black font-bold">DESCRIPTION</p>
							</div>
							@foreach($researches as $research)
							<div class="flex mx-auto bg-grey-lightest p-5">
								<div class="this black"><?php echo $research->description ?></div>
							</div>
							@endforeach
						</div>
						<div class="flex flex-col flex-wrap">
							<div class="bg-grey p-5 text-center">
								<p class="this-black font-bold">FROM</p>
							</div>
							@foreach($researches as $research)
							<div class="text-left bg-grey-lightest p-5">
								<p class="this-black">{{ $research->start_date }}</p>
							</div>
							@endforeach
						</div>
						<div class="flex flex-col flex-wrap">
							<div class="bg-grey p-5 text-center">
								<p class="this-black font-bold">TO</p>
							</div>
							@foreach($researches as $research)
							<div class="text-left bg-grey-lightest p-5">
								<p class="this-black">{{ $research->end_date }}</p>
							</div>
							@endforeach
						</div>
					</div>
				</div>
				@endif
				@if(!is_null($collaborators))
				<div class="hidden content mx-auto" id="collaborators">
					<div class="flex hidden mt-6">
						<div class="flex flex-col flex-wrap">
							<div class="bg-grey p-5 text-center">
								<p class="this-black font-bold">LOGO</p>
							</div>
							@foreach($collaborators as collaborator)
							<div class="text-left bg-grey-lightest p-5">
								<p class="this-black">{{ collaborator->research_area }}</p>
							</div>
							@endforeach
						</div>
						<div class="flex flex-col flex-wrap bg-grey-lightest">
							<div class="bg-grey p-5 text-center">
								<p class="this-black font-bold">NAME</p>
							</div>
							@foreach($collaborators as collaborator)
							<div class="flex mx-auto bg-grey-lightest p-5">
								<div class="this black"><?php echo collaborator->description ?></div>
							</div>
							@endforeach
						</div>
						<div class="flex flex-col flex-wrap">
							<div class="bg-grey p-5 text-center">
								<p class="this-black font-bold">DESCRIPTION</p>
							</div>
							@foreach($collaborators as collaborator)
							<div class="text-left bg-grey-lightest p-5">
								<p class="this-black">{{ collaborator->start_date }}</p>
							</div>
							@endforeach
						</div>
					</div>
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