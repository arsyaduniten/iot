@extends('public.base')

@section('content')
<div class="flex flex-col w-full">
	<div class="flex w-full fixed pin-t bg-grey-dark shadow-md this-white">
		<div class="flex flex-no-shrink mx-6 py-6">
			<a class="no-underline font-bold text-2xl" href="/">Sami Hajjaj</a>
		</div>
		<div class="flex justify-between py-6">
				<a class="no-underline hover:text-blue-darker mx-4" href="/profile">Profile</a>
				<a class="no-underline hover:text-blue-darker mx-4" href="/academic">Academic</a>
				<a class="no-underline hover:text-blue-darker mx-4" href="/research">Research</a>
				<a class="border-b-4 border-blue-darker mx-4 font-bold">My Corner</a>
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
		<div class="text-left flex flex-col items-left w-full h-screen mt-16" style="margin-left:250px;">
			<p class="text-5xl p-4 pt-12 font-bold w-2/3">{{ $blog->title }}</p>
			<p class="text-xl font-bold text-grey-dark p-4 px-5">{{ \Carbon\Carbon::parse($blog->created_at)->toFormattedDateString() }}</p>
			<div class="fb-like px-5" data-href="http://samihajjaj.com" data-width="" data-layout="standard" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>
			<div class="flex pt-4 px-2">
				@foreach($blog->tagNames() as $tag)
					<div class="border border-grey rounded-full p-2 px-4 mx-2">#{{ $tag }}</div>
				@endforeach
			</div>
			<div class="pt-10 px-5"><?php echo $blog->content ?></div>
			<div class="fb-comments pt-12 px-5" data-href="http://samihajjaj.com" data-width="" data-numposts="5"></div>
		</div>
	</div>
</div>





@endsection

@section('script')
<script type="text/javascript">
    $(document).ready(function(){
    	
    });
</script>

@endsection