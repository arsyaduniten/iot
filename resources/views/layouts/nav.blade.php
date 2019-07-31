<div class="flex flex-col w-full">
	<div class="flex w-full fixed pin-t bg-grey-dark shadow-md this-white">
		<div class="flex flex-no-shrink mx-6 py-6">
			<a class="no-underline font-bold text-2xl" href="/">Sami Hajjaj</a>
		</div>
		<div class="flex justify-between py-6 px-12">
				<a class="font-bold border-b-4 border-blue-darker mx-4">Profile</a>
				<a class="no-underline hover:text-blue-darker mx-4" href="/academic">Academic</a>
				<a class="no-underline hover:text-blue-darker mx-4" href="/research">Research</a>
				<a class="no-underline hover:text-blue-darker mx-4" href="/mycorner">My Corner</a>
				<a class="no-underline hover:text-blue-darker mx-4" href="/contact">Contact Me</a>
		</div>
	</div>
	<div class="flex">
		<div class="hidden md:flex md:flex-col px-6 bg-grey-darker py-6 h-screen shadow-md fixed left-nav">
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
				<p class="font-bold this-white text-xl">Latest Activity:</p>
				@foreach(\App\LatestActivity::where('type','mycorner')->orderBy('created_at', 'desc')->take(1)->get() as $latest)
				<a href="{{ $latest->link }}" class="pt-2 py-1 text-blue-lighter hover:text-blue-light">{{ $latest->text }}</a>
				@endforeach
				<div class="border border-blue-lighter my-2 mr-2"></div>
				@foreach(\App\LatestActivity::where('type','other')->orderBy('created_at', 'desc')->take(4)->get() as $latest)
				<a href="{{ $latest->link }}" class="pt-2 py-1 text-blue-lighter hover:text-blue-light">{{ $latest->text }}</a>
				@endforeach
			</div>
		</div>
		<div class="text-left w-full h-screen mt-16" style="margin-left: 250px;">
			{{-- <p class="text-5xl font-bold text-teal-dark pt-8">{{ $data->title }}</p>
			@if(!is_null($data->snss))
			<div class="flex justify-center">
			@foreach($data->snss as $sns)
				<a class="text-xl text-teal-dark pt-4 p-4" target="_blank" href="{{ $sns->url }}">{{ $sns->display_name }}</a>
				<span class="border border-teal-dark my-4"></span>
			@endforeach
			</div>
			@endif --}}
			<div class="flex w-full m-8 ml-4 justify-left">
				<button class="bg-grey-lighter px-6 py-4 border border-grey text-teal-dark sub-nav default" content-id="bodies">Professional Bodies</button>
				<button class="bg-grey-lighter px-6 py-4 border border-grey text-teal-dark sub-nav" content-id="recognition">Academic Recognition</button>
			</div>
			<div class="border border-grey-light mt-4"></div>
			<div class="text-2xl text-left text-yellow-darker pt-6 mx-4 font-bold">Professional Profile</div>
			<div class="text-xl text-left text-grey-darker pt-6 mx-4"><?php echo $data->description->content ?></div>
			<div class="flex w-full justify-left pt-6">
				@foreach($data->statistics as $stat)
				<div class="flex flex-col text-center bg-blue-custom-dark shadow p-6 m-4 rounded">
					<p class="text-xl font-bold" style="color:#92466b;">{{ $stat->content }}</p>
					<p class="text-blue-dark pt-4" style="color:#92466b;">{{ $stat->description }}</p>
				</div>
				@endforeach
			</div>
			<div class="flex flex-col h-full w-full mb-12 p-4">
				<div class="border border-grey-light mt-4"></div>
				<p class="container mx-auto my-8 mt-12 font-bold text-5xl text-grey-darker landing-message">Click on above buttons to get started.</p>
				<div class="hidden content p-6" id="{{ $about->type }}"><?php echo $about->description ?></div>
				<div class="hidden content p-6" id="{{ $recognition->type }}"><?php echo $recognition->description ?></div>
			</div>
		</div>
	</div>
</div>




