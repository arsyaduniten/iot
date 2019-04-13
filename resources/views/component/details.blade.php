@extends('public.base')

@section('content')

<style type="text/css">
	.topcontent {
		background-image: url('/images/bg4.png');
		background-color: rgba(216, 216, 216, 0.40);
		background-blend-mode: lighten;
		height: 85vh;
		background-repeat: no-repeat;
  		background-size: cover;
   		background-position: center bottom;
	}

	.active {
		/*border-color: #9DE0E3;*/
		border-bottom: 4px #9DE0E3 solid;
	}

	.active-tab{
		border-left: 10px #4DC0B5 solid;
		background-color: #A0F0ED;
	}

	.brand-color{
		background-color: #9DE0E3;
	}

	body{
/*		background: #e5e5e5;
*/	
		background: white;
	}

	/*.is-outlined{
		outline-style: solid;
		outline-color: #E8FFFE;
		out
	}*/

	#about-me{

	}

	a {
		text-decoration: none;
	}

	.elevated-btn{
		color: #FFFFFF !important;
	    display: block;
	    border: 0 !important;
	    background-image: linear-gradient(-180deg, #4653F1 0%, #1524DA 100%);
	    box-shadow: 0 2px 4px 0 rgba(22, 71, 182, 0.3) !important;
	}

	[data-popup] {
	  position: relative;
	}
	[data-popup]:before, [data-popup]:after {
	  opacity: 0;
	  transform: translate(-50%, 0);
	  transition: 0.15s ease opacity, 0.15s ease transform;
	  will-change: opacity transform;
	  content: "";
	}
	[data-popup]:hover:before, [data-popup]:hover:after {
	  position: absolute;
	  left: 50%;
	  transform: translate(-50%, -10px);
	  opacity: 1;
	}
	[data-popup]:hover:before {
	  bottom: 100%;
	  padding: 5px 10px;
	  background: rgba(0, 0, 0, 0.8);
	  border-radius: 5px;
	  color: white;
	  font-size: 12px;
	  line-height: 12px;
	  text-align: center;
	  content: attr(data-popup);
	  white-space: nowrap;
	}
	[data-popup]:hover:after {
	  top: 0;
	  height: 0;
	  width: 0;
	  border: solid transparent;
	  border-top-color: rgba(0, 0, 0, 0.8);
	  border-width: 5px;
	  content: "";
	}

	html, body {
	  overflow: scroll !important;
	}
</style>
<div class="container mx-auto m-4 rounded-t-lg z-20">
	<div class="flex p-8 rounded-t-lg">
		<a class="pr-8" href="/v2/research"><i class="fas fa-2x fa-arrow-left text-black"></i></a>
		<div>
			<p class="text-xl font-bold text-grey-dark">{{ $title }}</p>
			<p class="text-4xl font-bold -my-2 text-black">{{ $data->title }}</p>
		</div>
	</div>
	<div class="flex m-4 p-4">
		<div class="bg-grey-lighter shadow-lg">
			<p class="p-4 font-bold">Description</p>
			<p class="p-4">Velit labore fugiat nulla est ut dolor consequat ut do voluptate. Ex sit culpa excepteur ad incididunt dolor adipisicing quis velit dolore consectetur nulla adipisicing. Occaecat sunt officia fugiat minim voluptate duis officia laborum nostrud. Elit magna magna et id culpa excepteur velit ad sed ut voluptate ut nulla excepteur consectetur ex adipisicing proident. Lorem ipsum deserunt id occaecat sunt velit sunt labore officia proident. Ea nulla ex laboris non reprehenderit do deserunt id deserunt pariatur laborum fugiat laborum est. Dolor veniam ea ex qui aliqua esse do quis fugiat esse occaecat in. Nisi irure velit magna ea ut in anim consectetur deserunt. Eu eiusmod quis anim culpa proident nisi velit est velit. Velit eu occaecat sit deserunt in ut ut dolor adipisicing anim tempor tempor. Mollit ad elit non enim tempor aliqua officia eu dolor sunt officia occaecat qui aute.</p>
		</div>
	</div>
	<div class="flex m-4 p-4 mb-0 pb-0">
		@if(array_key_exists('projects', $r_data))
			<related type="Projects" :data="$r_data['projects']" />
		@endif
		@if(array_key_exists('research_areas', $r_data))
			<div class="bg-grey-lighter shadow-lg flex-1 p-4">
				<p class="font-bold text-base p-4">Research Areas</p>
				<ul class="list-reset flex flex-col">
				@foreach($r_data['research_areas'] as $item)
					<li class="m-2 mx-4">
						<button href="" class="w-full shadow border-l-8 border-black p-2 no-underline text-black bg-white hover:bg-teal-lighter hover:border-teal">{{ $item->research_area }}</button>
					</li>
				@endforeach
				</ul>
			</div>
		@endif
		<space-between/>
		@if(array_key_exists('publications', $r_data))
			<related type="Publications" :data="$r_data['publications']" />
		@endif
	</div>
	<div class="flex m-4 p-4 pt-0">
		@if(array_key_exists('fundings', $r_data))
			<div class="bg-grey-lighter shadow-lg flex-1 p-4">
				<p class="font-bold text-base p-4">Fundings</p>
				<ul class="list-reset flex flex-col">
				@foreach($r_data['fundings'] as $item)
					<li class="m-2 mx-4">
						<button href="" class="w-full shadow border-l-8 border-black p-2 no-underline text-black bg-white hover:bg-teal-lighter hover:border-teal">{{ $item->granted_by }} MYR{{ number_format($item->amount) }}</button>
					</li>
				@endforeach
				</ul>
			</div>
		@endif
		<space-between/>
		@if(array_key_exists('collaborators', $r_data))
			<div class="bg-grey-lighter shadow-lg flex-1 p-4">
				<p class="font-bold text-base p-4">Collaborators</p>
				<div class="m-2 mx-4">
				@foreach($r_data['collaborators'] as $item)
				@if($collaborator->logo_url != NULL)
				<img width="50" height="50" class="" src="{{ \Image::make($collaborator->logo_url)->greyscale()->encode('data-url') }}">
				@endif
				@endforeach
				</div>
			</div>
		@endif
	</div>
</div>
<div class="container mx-auto z-10 mb-8">
	<div class="px-8 pt-4">
	<a class="flex font-bold brand-color no-underline text-black p-6 shadow-lg w-full text-2xl" href="#">
		<span class="flex-1">Go to Project Website</span>
		<i class="fas fa-arrow-right text-black"></i>
	</a>
	</div>
</div>

@endsection

@section('script')

@endsection