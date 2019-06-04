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
				<a class="no-underline" href="/v2/research">Research</a>
				<a class="border-b-4 border-blue-darker font-bold">My Corner</a>
				<a class="no-underline" href="/v2/contact">Contact</a>
		</div>
	</div>
	<div class="flex">
		<div class="flex flex-col px-8 bg-grey-darker py-6 h-screen shadow-md" style="height: 100vh;">
			<div class="flex flex-col pt-4">
				<p class="font-extrabold this-white text-xl">Find me on:</p>
				@foreach(\App\Sns::all() as $sns)
					<a class="py-1 this-white" target="_blank" href="{{ $sns->url }}">{{ $sns->display_name }}</a>
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
			<p class="text-5xl font-bold text-teal-dark pt-8">{{ $data->title }}</p>
			<p class="text-xl text-teal-dark my-12"><?php echo $data->description->content ?></p>
			<div class="flex flex-col h-full w-full border-2 border-grey container mx-auto p-4">
				<div class="flex flex-wrap">
					<a href='/v2/mycorner' class="rounded-full bg-inherit border border-grey cursor-pointer this-black px-4 py-2 mx-4 my-2 text-sm">#All</a>
					<a href='/v2/mycorner?filter=recent' class="{{ Request::get('filter') == 'recent' ? 'bg-teal-dark text-white' : 'this-black bg-inherit'}} rounded-full border border-grey cursor-pointer px-4 py-2 mx-4 my-2 text-sm">#Recent</a>
					<a href='/v2/mycorner?filter=oldest' class="{{ Request::get('filter') == 'oldest' ? 'bg-teal-dark text-white' : 'this-black bg-inherit'}} rounded-full border border-grey cursor-pointer px-4 py-2 mx-4 my-2 text-sm">#Oldest</a>
					@foreach($tags as $tag)
					<a href='/v2/mycorner?keyword={{ $tag }}' class="{{ Request::get('keyword') == $tag ? 'bg-teal-dark text-white' : 'this-black bg-inherit'}} rounded-full border border-grey cursor-pointer px-4 py-2 mx-4 my-2 text-sm">#{{ $tag }}</a>
					@endforeach
				</div>
				<div class="border border-grey-light mt-4"></div>
				<table class="content mx-auto mt-6">
			        <tr class="bg-grey p-5 text-center">
			            <th class="this-black py-5 px-6">Title</th>
			            <th class="this-black py-5 px-6">Posted On</th>
			        </tr>
			        @foreach($posts as $post)
			        <tr class="bg-grey-lightest p-5 text-center">
			            <td class="this-black py-5 px-6"><a class="no-underline font-bold text-blue-dark" href="/post?id={{ $post->id }}">{{ $post->title }}</a></td>
			            <td class="this-black py-5 px-6">{{ $post->post_date }}</td>
			        </tr>
			        @endforeach
			    </table>
			</div>
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