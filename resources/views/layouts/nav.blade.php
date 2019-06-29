<div class="flex flex-col w-full">
	<div class="flex w-full bg-grey-dark shadow-md this-white">
		<div class="flex flex-no-shrink mx-6 py-6">
			<a class="no-underline font-bold text-2xl" href="/v2">Sami Hajjaj</a>
		</div>
		<div class="container mx-auto flex justify-between py-6 px-12">
				<a class="font-bold border-b-4 border-blue-darker">Profile</a>
				<a class="no-underline hover:text-blue-darker" href="/v2/portfolio">Academic</a>
				<a class="no-underline hover:text-blue-darker" href="/v2/research">Research</a>
				<a class="no-underline hover:text-blue-darker" href="/v2/mycorner">My Corner</a>
				<a class="no-underline hover:text-blue-darker" href="/v2/contact">Contact Me</a>
		</div>
	</div>
	<div class="flex">
		<div class="flex flex-col px-8 bg-grey-darker py-6 h-screen shadow-md">
			<div class="flex flex-col pt-4">
				<p class="font-extrabold this-white text-xl">Find me on:</p>
				@foreach(\App\Sns::all() as $sns)
					<a class="py-1 text-blue-lighter hover:text-blue-light" target="_blank" href="{{ $sns->url }}">{{ $sns->display_name }}</a>
				@endforeach
			</div>
			<div class="flex flex-col pt-4">
				<p class="font-bold this-white text-xl">Recent Activity:</p>
				<a class="pt-2 py-1 this-white">Latest Post</a>
				<a class="py-1 this-white">Recent Project</a>
				<a class="py-1 this-white">Recent Award</a>
			</div>
		</div>
		<div class="text-center w-full overflow-y-auto">
			{{-- <p class="text-5xl font-bold text-teal-dark pt-8">{{ $data->title }}</p>
			@if(!is_null($data->snss))
			<div class="flex justify-center">
			@foreach($data->snss as $sns)
				<a class="text-xl text-teal-dark pt-4 p-4" target="_blank" href="{{ $sns->url }}">{{ $sns->display_name }}</a>
				<span class="border border-teal-dark my-4"></span>
			@endforeach
			</div>
			@endif --}}
			<p class="text-xl text-grey-darker pt-6"><?php echo $data->description->content ?></p>
			<div class="flex w-full container justify-center mx-auto m-8">
				@foreach($data->statistics as $stat)
				<div class="flex flex-col bg-blue-custom-dark shadow p-6 m-4 rounded">
					<p class="text-2xl font-bold text-orange-dark">{{ $stat->content }}</p>
					<p class="text-orange-dark pt-4">{{ $stat->description }}</p>
				</div>
				@endforeach
			</div>
			<div class="flex w-full container mx-auto m-8 justify-center">
				<button class="bg-grey-lighter px-6 py-4 border border-grey text-teal-dark sub-nav" content-id="bodies">Professional Bodies</button>
				<button class="bg-grey-lighter px-6 py-4 border border-grey text-teal-dark sub-nav" content-id="recognition">Academic Recognition</button>
			</div>
			<div class="flex flex-col h-full w-full border-2 border-grey container mx-auto mb-12 p-4">
				<div class="border border-grey-light mt-4"></div>
				<p class="container mx-auto my-8 mt-12 font-bold text-5xl text-grey-darker landing-message">Click on above buttons to get started.</p>
				<div class="hidden content p-6" id="{{ $about->type }}"><?php echo $about->description ?></div>
				<div class="hidden content p-6" id="{{ $recognition->type }}"><?php echo $recognition->description ?></div>
			</div>
			<a class="mx-auto px-6 mt-6 py-4 bg-grey-darker text-white border-2 border-black" href="/v2/portfolio">Academic Portfolio</a>
		</div>
	</div>
</div>




