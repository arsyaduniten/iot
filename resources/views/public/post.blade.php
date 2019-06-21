@extends('public.base')

@section('content')
<div class="flex flex-col w-full">
	<div class="flex w-full bg-grey-dark shadow-md this-white">
		<div class="flex mx-8 py-6">
			<a class="no-underline font-bold text-2xl" href="/v2">Sami Hajjaj</a>
		</div>
		<div class="container mx-auto flex justify-between py-6">
				<a class="no-underline hover:text-blue-darker" href="/v2/next">Profile</a>
				<a class="no-underline hover:text-blue-darker" href="/v2/portfolio">Academic</a>
				<a class="no-underline hover:text-blue-darker" href="/v2/research">Research</a>
				<a class="border-b-4 border-blue-darker font-bold">My Corner</a>
				<a class="no-underline hover:text-blue-darker" href="/v2/contact">Contact Me</a>
		</div>
	</div>
	<div class="flex">
		<div class="flex flex-col px-8 bg-grey-darker py-6 h-screen shadow-md" style="height: 100vh;">
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
		<div class="text-center flex flex-col items-center w-full overflow-y-scroll h-screen">
			<div class="flex items-center justify-center">
				<a href="/v2/mycorner" class="border border-black p-4 rounded mt-8  hover:text-white hover:bg-black w-1/7">Back</a>
				<p class="text-5xl p-4 pt-12 font-bold w-2/3">{{ $blog->title }}</p>
			</div>
			<p class="text-xl font-bold text-grey-dark p-4">{{ \Carbon\Carbon::parse($blog->created_at)->toFormattedDateString() }} - Sami Hajjaj</p>
			<div class="flex pt-4">
				@foreach($blog->tagNames() as $tag)
					<div class="border border-grey rounded-full p-2 px-4 mx-2">#{{ $tag }}</div>
				@endforeach
			</div>
			<p class="pt-10"><?php echo $blog->content ?></p>
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