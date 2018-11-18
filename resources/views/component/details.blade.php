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
		background: #e5e5e5;
	}

	/*.is-outlined{
		outline-style: solid;
		outline-color: #E8FFFE;
		out
	}*/

	#about-me{

	}

	.elevated-btn{
		color: #FFFFFF !important;
	    display: block;
	    border: 0 !important;
	    background-image: linear-gradient(-180deg, #4653F1 0%, #1524DA 100%);
	    box-shadow: 0 2px 4px 0 rgba(22, 71, 182, 0.3) !important;
	}

</style>
<div class="container mx-auto m-4 rounded-t-lg z-20">
	<div class="flex p-8 rounded-t-lg">
		<a class="pr-8" href="#"><i class="fas fa-2x fa-arrow-left text-black"></i></a>
		<div>
			<p class="text-xl font-bold text-grey-dark">{{ $title }}</p>
			<p class="text-4xl font-bold -my-2 text-black">{{ $data->title }}</p>
		</div>
	</div>
	<div class="flex m-4 p-4">
		<div class="bg-grey-lighter shadow-md">
			<p class="p-4 font-bold">Description</p>
			<p class="p-4">Velit labore fugiat nulla est ut dolor consequat ut do voluptate. Ex sit culpa excepteur ad incididunt dolor adipisicing quis velit dolore consectetur nulla adipisicing. Occaecat sunt officia fugiat minim voluptate duis officia laborum nostrud. Elit magna magna et id culpa excepteur velit ad sed ut voluptate ut nulla excepteur consectetur ex adipisicing proident. Lorem ipsum deserunt id occaecat sunt velit sunt labore officia proident. Ea nulla ex laboris non reprehenderit do deserunt id deserunt pariatur laborum fugiat laborum est. Dolor veniam ea ex qui aliqua esse do quis fugiat esse occaecat in. Nisi irure velit magna ea ut in anim consectetur deserunt. Eu eiusmod quis anim culpa proident nisi velit est velit. Velit eu occaecat sit deserunt in ut ut dolor adipisicing anim tempor tempor. Mollit ad elit non enim tempor aliqua officia eu dolor sunt officia occaecat qui aute.</p>
		</div>
	</div>
	<div class="flex m-4 p-4 mb-0 pb-0">
		@if(array_key_exists('projects', $r_data))
			<related type="Projects" :data="$r_data['projects']" />
		@endif
		<space-between/>
		@if(array_key_exists('publications', $r_data))
			<related type="Publications" :data="$r_data['publications']" />
		@endif
	</div>
	<div class="flex m-4 p-4 pt-0">
		@if(array_key_exists('projects', $r_data))
			<related type="Projects" :data="$r_data['projects']" />
		@endif
		<space-between/>
		@if(array_key_exists('publications', $r_data))
			<related type="Publications" :data="$r_data['publications']" />
		@endif
	</div>
</div>
<div class="container mx-auto z-10 mb-8">
	<div class="px-8 pt-4">
	<a class="flex font-bold brand-color no-underline text-black p-6 shadow-md w-full text-2xl" href="#">
		<span class="flex-1">Go to Project Website</span>
		<i class="fas fa-arrow-right text-black"></i>
	</a>
	</div>
</div>

@endsection

@section('script')

@endsection