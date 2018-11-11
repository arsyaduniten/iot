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
		background: #39445C;
	}

	/*.is-outlined{
		outline-style: solid;
		outline-color: #E8FFFE;
		out
	}*/

	#about-me{

	}
</style>
<div class="container bg-white shadow-md mx-auto m-4 rounded-t-lg z-20">
	<div class="flex p-8 brand-color rounded-t-lg">
		<a class="pr-8" href="#"><i class="fas fa-2x fa-arrow-left text-black"></i></a>
		<div>
			<p class="text-xl font-bold text-grey-darkest">Research</p>
			<p class="text-4xl font-bold -my-2 text-black">Research Title</p>
		</div>
	</div>
	<div class="flex m-4 p-4">
		<div class="bg-grey shadow-md rounded">
			<p class="p-4 font-bold">Description</p>
			<p class="p-4">Velit labore fugiat nulla est ut dolor consequat ut do voluptate. Ex sit culpa excepteur ad incididunt dolor adipisicing quis velit dolore consectetur nulla adipisicing. Occaecat sunt officia fugiat minim voluptate duis officia laborum nostrud. Elit magna magna et id culpa excepteur velit ad sed ut voluptate ut nulla excepteur consectetur ex adipisicing proident. Lorem ipsum deserunt id occaecat sunt velit sunt labore officia proident. Ea nulla ex laboris non reprehenderit do deserunt id deserunt pariatur laborum fugiat laborum est. Dolor veniam ea ex qui aliqua esse do quis fugiat esse occaecat in. Nisi irure velit magna ea ut in anim consectetur deserunt. Eu eiusmod quis anim culpa proident nisi velit est velit. Velit eu occaecat sit deserunt in ut ut dolor adipisicing anim tempor tempor. Mollit ad elit non enim tempor aliqua officia eu dolor sunt officia occaecat qui aute.</p>
		</div>
	</div>
	<div class="flex m-4 p-4 mb-0 pb-0">
		<div class="flex-1 bg-grey shadow-md rounded m-4 ml-0">
			<p class="p-4 font-bold">Related Projects</p>
			<ol>
				<li class="p-4">Dolore id non incididunt ut reprehenderit dolore excepteur ea deserunt sed exercitation ea consectetur in ea ut.</li>
				<li class="p-4">Dolore id non incididunt ut reprehenderit dolore excepteur ea deserunt sed exercitation ea consectetur in ea ut.</li>
				<li class="p-4">Dolore id non incididunt ut reprehenderit dolore excepteur ea deserunt sed exercitation ea consectetur in ea ut.</li>
				<li class="p-4">Dolore id non incididunt ut reprehenderit dolore excepteur ea deserunt sed exercitation ea consectetur in ea ut.</li>
				<li class="p-4">Dolore id non incididunt ut reprehenderit dolore excepteur ea deserunt sed exercitation ea consectetur in ea ut.</li>
				<li class="p-4">Dolore id non incididunt ut reprehenderit dolore excepteur ea deserunt sed exercitation ea consectetur in ea ut.</li>
			</ol>
		</div>
		<div class="flex-1 bg-grey shadow-md rounded m-4 mr-0">
			<p class="p-4 font-bold">Publications</p>
			<ol>
				<li class="p-4">Dolore id non incididunt ut reprehenderit dolore excepteur ea deserunt sed exercitation ea consectetur in ea ut.</li>
				<li class="p-4">Dolore id non incididunt ut reprehenderit dolore excepteur ea deserunt sed exercitation ea consectetur in ea ut.</li>
				<li class="p-4">Dolore id non incididunt ut reprehenderit dolore excepteur ea deserunt sed exercitation ea consectetur in ea ut.</li>
				<li class="p-4">Dolore id non incididunt ut reprehenderit dolore excepteur ea deserunt sed exercitation ea consectetur in ea ut.</li>
				<li class="p-4">Dolore id non incididunt ut reprehenderit dolore excepteur ea deserunt sed exercitation ea consectetur in ea ut.</li>
				<li class="p-4">Dolore id non incididunt ut reprehenderit dolore excepteur ea deserunt sed exercitation ea consectetur in ea ut.</li>
			</ol>
		</div>
	</div>
	<div class="flex m-4 mt-0 p-4 pt-0">
		<div class="flex-1 bg-grey shadow-md rounded m-4 ml-0">
			<p class="p-4 font-bold">Collaborators</p>
			<ol>
				<li class="p-4">Dolore id non incididunt ut reprehenderit dolore excepteur ea deserunt sed exercitation ea consectetur in ea ut.</li>
				<li class="p-4">Dolore id non incididunt ut reprehenderit dolore excepteur ea deserunt sed exercitation ea consectetur in ea ut.</li>
				<li class="p-4">Dolore id non incididunt ut reprehenderit dolore excepteur ea deserunt sed exercitation ea consectetur in ea ut.</li>
				<li class="p-4">Dolore id non incididunt ut reprehenderit dolore excepteur ea deserunt sed exercitation ea consectetur in ea ut.</li>
				<li class="p-4">Dolore id non incididunt ut reprehenderit dolore excepteur ea deserunt sed exercitation ea consectetur in ea ut.</li>
				<li class="p-4">Dolore id non incididunt ut reprehenderit dolore excepteur ea deserunt sed exercitation ea consectetur in ea ut.</li>
			</ol>
		</div>
		<div class="flex-1 bg-grey shadow-md rounded m-4 mr-0">
			<p class="p-4 font-bold">Awards</p>
			<ol>
				<li class="p-4">Dolore id non incididunt ut reprehenderit dolore excepteur ea deserunt sed exercitation ea consectetur in ea ut.</li>
				<li class="p-4">Dolore id non incididunt ut reprehenderit dolore excepteur ea deserunt sed exercitation ea consectetur in ea ut.</li>
				<li class="p-4">Dolore id non incididunt ut reprehenderit dolore excepteur ea deserunt sed exercitation ea consectetur in ea ut.</li>
				<li class="p-4">Dolore id non incididunt ut reprehenderit dolore excepteur ea deserunt sed exercitation ea consectetur in ea ut.</li>
				<li class="p-4">Dolore id non incididunt ut reprehenderit dolore excepteur ea deserunt sed exercitation ea consectetur in ea ut.</li>
				<li class="p-4">Dolore id non incididunt ut reprehenderit dolore excepteur ea deserunt sed exercitation ea consectetur in ea ut.</li>
			</ol>
		</div>
	</div>
</div>
<div class="container mx-auto z-10 mb-8">
	<a class="flex font-bold brand-color no-underline text-black p-6 md-4 shadow-md w-full text-2xl rounded-b-lg -my-4" href="#">
		<span class="flex-1">Go to Project Website</span>
		<i class="fas fa-arrow-right text-black"></i>
	</a>
</div>

@endsection

@section('script')

@endsection