<div class="flex flex-col w-full">
	<div class="flex w-full bg-grey-dark shadow-md this-white">
		<div class="flex mx-8 py-6">
			<a class="no-underline font-bold text-2xl" href="/v2">Sami Hajjaj</a>
		</div>
		<div class="container mx-auto flex justify-between py-6">
				<a class="font-bold border-b-4 border-blue-darker">About</a>
				<a class="no-underline" href="/v2/portfolio">Academic</a>
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
		<div class="flex flex-col text-center w-full">
			<p class="text-5xl font-bold text-teal-dark pt-8">{{ $data->title }}</p>
			@if(!is_null($data->snss))
			<div class="flex justify-center">
			@foreach($data->snss as $sns)
				<a class="text-xl text-teal-dark pt-4 p-4" target="_blank" href="{{ $sns->url }}">{{ $sns->display_name }}</a>
				<span class="border border-teal-dark my-4"></span>
			@endforeach
			</div>
			@endif
			<p class="text-xl text-grey-darker pt-6"><?php echo $data->description->content ?></p>
			<div class="flex w-full container justify-center mx-auto m-8">
				@foreach($data->statistics as $stat)
				<div class="flex flex-col bg-blue-custom-dark shadow p-6 m-4 rounded">
					<p class="text-2xl font-bold text-orange-dark">{{ $stat->content }}</p>
					<p class="text-orange-dark pt-4">{{ $stat->description }}</p>
				</div>
				@endforeach
			</div>
			<a class="mx-auto px-6 mt-6 py-4 bg-grey-darker text-white border-2 border-black" href="/v2/portfolio">Academic Portfolio</a>
		</div>
	</div>
</div>



