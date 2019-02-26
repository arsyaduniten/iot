@extends('public.base')

@section('content')
<div class="flex flex-col w-full">
	<div class="flex w-full bg-blue-custom-dark shadow-md">
		<div class="flex mx-8 py-6">
			<p class="font-bold text-2xl this-black">Sami Hajjaj</p>
		</div>
		<div class="container mx-auto flex justify-between py-6">
				<a class="no-underline" href="/v2">About</a>
				<a class="no-underline" href="/v2/portfolio">Portfolio</a>
				<a class="no-underline" href="/v2/research">My Research</a>
				<a class="border-b-4 border-purple font-bold this-black">My Corner</a>
				<a class="no-underline" href="/v2/contact">Contact</a>
		</div>
	</div>
	<div class="flex">
		<div class="flex flex-col px-8 bg-blue-custom-light py-6 h-full shadow-md">
			<div class="flex flex-col pt-4">
				<p class="font-extrabold this-black text-xl">Find me on:</p>
				<a class="pt-2 py-1 text-grey-darker">LinkedIn</a>
				<a class="py-1 text-grey-darker">Google Scholar</a>
				<a class="py-1 text-grey-darker">Facebook</a>
				<a class="py-1 text-grey-darker">IEEE</a>
				<a class="py-1 text-grey-darker">IMeche</a>
				<a class="py-1 text-grey-darker">BEM</a>
				<a class="py-1 text-grey-darker">IEM</a>
				<a class="py-1 text-grey-darker">Others</a>
			</div>
			<div class="flex flex-col pt-4">
				<p class="font-bold this-black text-xl">Recent Activity:</p>
				<a class="pt-2 py-1 text-grey-darker">Latest Post</a>
				<a class="py-1 text-grey-darker">Recent Project</a>
				<a class="py-1 text-grey-darker">Recent Award</a>
			</div>
		</div>
		<div class="text-center w-full">
			<p class="text-5xl font-bold text-purple-darker pt-8">Welcome to My Corner</p>
			<p class="text-xl text-grey-darker my-12">This is where I talk about research, activities, technology, family, interests and life in general</p>
			<div class="flex flex-col h-full w-full border-2 border-grey container mx-auto p-4">
				<div class="flex flex-wrap">
					<button class="rounded-full bg-yellow this-black px-4 py-2 mx-4 my-2 text-sm">#keyword1</button>
					<button class="rounded-full bg-yellow this-black px-4 py-2 mx-4 my-2 text-sm">#keyword1</button>
					<button class="rounded-full bg-yellow this-black px-4 py-2 mx-4 my-2 text-sm">#keyword1</button>
					<button class="rounded-full bg-yellow this-black px-4 py-2 mx-4 my-2 text-sm">#keyword1</button>
					<button class="rounded-full bg-yellow this-black px-4 py-2 mx-4 my-2 text-sm">#keyword1</button>
					<button class="rounded-full bg-yellow this-black px-4 py-2 mx-4 my-2 text-sm">#keyword1</button>
					<button class="rounded-full bg-yellow this-black px-4 py-2 mx-4 my-2 text-sm">#keyword1</button>
					<button class="rounded-full bg-yellow this-black px-4 py-2 mx-4 my-2 text-sm">#keyword1</button>
					<button class="rounded-full bg-yellow this-black px-4 py-2 mx-4 my-2 text-sm">#keyword1</button>
					<button class="rounded-full bg-yellow this-black px-4 py-2 mx-4 my-2 text-sm">#keyword1</button>
					<button class="rounded-full bg-yellow this-black px-4 py-2 mx-4 my-2 text-sm">#keyword1</button>
					<button class="rounded-full bg-yellow this-black px-4 py-2 mx-4 my-2 text-sm">#keyword1</button>
					<button class="rounded-full bg-yellow this-black px-4 py-2 mx-4 my-2 text-sm">#keyword1</button>
					<button class="rounded-full bg-yellow this-black px-4 py-2 mx-4 my-2 text-sm">#keyword1</button>
					<button class="rounded-full bg-yellow this-black px-4 py-2 mx-4 my-2 text-sm">#keyword1</button>
				</div>
				<div class="border border-grey-light mt-4"></div>
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