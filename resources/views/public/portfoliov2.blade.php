@extends('public.base')

@section('content')
<div class="flex flex-col w-full">
	<div class="flex w-full bg-blue-custom-dark shadow-md">
		<div class="flex mx-8 py-6">
			<p class="font-bold text-2xl this-black">Sami Hajjaj</p>
		</div>
		<div class="container mx-auto flex justify-between py-6">
				<a class="no-underline nav-link" href="/v2">About</a>
				<a class="border-b-4 border-purple font-bold this-black">Portfolio</a>
				<a class="no-underline nav-link" href="/v2/research">My Research</a>
				<a class="no-underline nav-link" href="/v2/mycorner">My Corner</a>
				<a class="no-underline nav-link" href="/v2/contact">Contact</a>
		</div>
	</div>
	<div class="flex">
		<div class="flex flex-col px-8 bg-blue-custom-light py-6 h-full shadow-md" style="height: 100vh;">
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
			<p class="text-5xl font-bold text-purple-darker pt-8">My Academic Portfolio</p>
			{{-- <p class="text-xl text-grey-darker pt-6">A short paragraph summarizes my career and highlight its key achievements<br> and milestones; it acts as a condensed version of a cover letter, to intrigue<br> to the reader/visitor to learn more about me. This should not <br>be more than 3 to 4 lines maximum.</p> --}}
			<div class="flex pt-4 container mx-auto justify-center my-6">
				<p class="font-extrabold this-black text-xl">Find me on:</p>
				<a class="py-1 text-grey-darker mx-2">LinkedIn</a>
				<a class="py-1 text-grey-darker mx-2">Google Scholar</a>
				<a class="py-1 text-grey-darker mx-2">Facebook</a>
				<a class="py-1 text-grey-darker mx-2">IEEE</a>
				<a class="py-1 text-grey-darker mx-2">IMeche</a>
				<a class="py-1 text-grey-darker mx-2">BEM</a>
				<a class="py-1 text-grey-darker mx-2">IEM</a>
				<a class="py-1 text-grey-darker mx-2">Others</a>
			</div>
			<div class="flex w-full container mx-auto m-8 justify-between">
				<button class="bg-custom-dark px-6 py-4 shadow-md">Education <br>Background</button>
				<button class="bg-custom-dark px-6 py-4 shadow-md">Work Experience</button>
				<button class="bg-custom-dark px-6 py-4 shadow-md">List of Publications</button>
				<button class="bg-custom-dark px-6 py-4 shadow-md">Awards and Recognition</button>
				<button class="bg-custom-dark px-6 py-4 shadow-md">Professional Bodies</button>
			</div>
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