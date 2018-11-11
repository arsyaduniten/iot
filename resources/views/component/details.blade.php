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
		background: #e1e1e1;
	}

	/*.is-outlined{
		outline-style: solid;
		outline-color: #E8FFFE;
		out
	}*/

	#about-me{

	}
</style>
<div class="container bg-white shadow-md mx-auto">
	<div class="p-8">
		<p class="text-xl font-bold text-grey-darkest">Research</p>
		<p class="text-4xl font-bold -my-2">Research Title</p>
	</div>
	<div class="flex m-4 p-4">
		<div class="bg-grey shadow-md rounded">
			<p class="p-4">Description</p>
			<p class="p-4">Velit labore fugiat nulla est ut dolor consequat ut do voluptate. Ex sit culpa excepteur ad incididunt dolor adipisicing quis velit dolore consectetur nulla adipisicing. Occaecat sunt officia fugiat minim voluptate duis officia laborum nostrud. Elit magna magna et id culpa excepteur velit ad sed ut voluptate ut nulla excepteur consectetur ex adipisicing proident. Lorem ipsum deserunt id occaecat sunt velit sunt labore officia proident. Ea nulla ex laboris non reprehenderit do deserunt id deserunt pariatur laborum fugiat laborum est. Dolor veniam ea ex qui aliqua esse do quis fugiat esse occaecat in. Nisi irure velit magna ea ut in anim consectetur deserunt. Eu eiusmod quis anim culpa proident nisi velit est velit. Velit eu occaecat sit deserunt in ut ut dolor adipisicing anim tempor tempor. Mollit ad elit non enim tempor aliqua officia eu dolor sunt officia occaecat qui aute.</p>
		</div>
	</div>
	<div class="flex m-4 p-4">
		<div class="flex-1 bg-grey shadow-md rounded m-4 ml-0">
			<p class="p-4">Related Projects</p>
			<p class="p-4">Dolore id non incididunt ut reprehenderit dolore excepteur ea deserunt sed exercitation ea consectetur in ea ut.</p>
			<p class="p-4">Dolore id non incididunt ut reprehenderit dolore excepteur ea deserunt sed exercitation ea consectetur in ea ut.</p>
			<p class="p-4">Dolore id non incididunt ut reprehenderit dolore excepteur ea deserunt sed exercitation ea consectetur in ea ut.</p>
			<p class="p-4">Dolore id non incididunt ut reprehenderit dolore excepteur ea deserunt sed exercitation ea consectetur in ea ut.</p>
			<p class="p-4">Dolore id non incididunt ut reprehenderit dolore excepteur ea deserunt sed exercitation ea consectetur in ea ut.</p>
			<p class="p-4">Dolore id non incididunt ut reprehenderit dolore excepteur ea deserunt sed exercitation ea consectetur in ea ut.</p>
		</div>
		<div class="flex-1 bg-grey shadow-md rounded m-4 mr-0">
			<p class="p-4">Publications</p>
			<p class="p-4">Labore exercitation laborum proident sint id elit in qui aliqua.</p>
			<p class="p-4">Labore exercitation laborum proident sint id elit in qui aliqua.</p>
			<p class="p-4">Labore exercitation laborum proident sint id elit in qui aliqua.</p>
			<p class="p-4">Labore exercitation laborum proident sint id elit in qui aliqua.</p>
			<p class="p-4">Labore exercitation laborum proident sint id elit in qui aliqua.</p>
		</div>
	</div>
	<div class="flex m-4 mt-0 p-4">
		<div class="flex-1 bg-grey shadow-md rounded m-4 ml-0">
			<p class="p-4">Related Projects</p>
			<p class="p-4">Dolore id non incididunt ut reprehenderit dolore excepteur ea deserunt sed exercitation ea consectetur in ea ut.</p>
			<p class="p-4">Dolore id non incididunt ut reprehenderit dolore excepteur ea deserunt sed exercitation ea consectetur in ea ut.</p>
			<p class="p-4">Dolore id non incididunt ut reprehenderit dolore excepteur ea deserunt sed exercitation ea consectetur in ea ut.</p>
			<p class="p-4">Dolore id non incididunt ut reprehenderit dolore excepteur ea deserunt sed exercitation ea consectetur in ea ut.</p>
			<p class="p-4">Dolore id non incididunt ut reprehenderit dolore excepteur ea deserunt sed exercitation ea consectetur in ea ut.</p>
			<p class="p-4">Dolore id non incididunt ut reprehenderit dolore excepteur ea deserunt sed exercitation ea consectetur in ea ut.</p>
		</div>
		<div class="flex-1 bg-grey shadow-md rounded m-4 mr-0">
			<p class="p-4">Publications</p>
			<p class="p-4">Labore exercitation laborum proident sint id elit in qui aliqua.</p>
			<p class="p-4">Labore exercitation laborum proident sint id elit in qui aliqua.</p>
			<p class="p-4">Labore exercitation laborum proident sint id elit in qui aliqua.</p>
			<p class="p-4">Labore exercitation laborum proident sint id elit in qui aliqua.</p>
			<p class="p-4">Labore exercitation laborum proident sint id elit in qui aliqua.</p>
		</div>
	</div>
</div>

@endsection

@section('script')

@endsection