@extends('public.base')

@section('content')
<div class="flex flex-col w-full">
	<div class="flex w-full bg-grey-dark shadow-md this-white">
		<div class="flex mx-8 py-6">
			<p class="font-bold text-2xl">Sami Hajjaj</p>
		</div>
		<div class="container mx-auto flex justify-between py-6">
				<a class="no-underline" href="/v2/next">About</a>
				<a class="border-b-4 border-blue-darker font-bold">Academic</a>
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
		<div class="text-center w-full overflow-y-auto">
			<p class="text-5xl font-bold text-teal-dark pt-8">Academic Portfolio</p>
			<p class="text-xl text-teal-dark pt-4">Google Scholar | Scopus | ORCID | UNITEN</p>
			{{-- <p class="text-xl text-grey-darker pt-6">A short paragraph summarizes my career and highlight its key achievements<br> and milestones; it acts as a condensed version of a cover letter, to intrigue<br> to the reader/visitor to learn more about me. This should not <br>be more than 3 to 4 lines maximum.</p> --}}
			<div class="flex w-full container mx-auto m-8 justify-between">
				<button class="bg-grey-lighter px-6 py-4 border border-grey text-teal-dark">Education <br>Background</button>
				<button class="bg-grey-lighter px-6 py-4 border border-grey text-teal-dark">Work Experience</button>
				<button class="bg-grey-lighter px-6 py-4 border border-grey text-teal-dark">List of Publications</button>
				<button class="bg-grey-lighter px-6 py-4 border border-grey text-teal-dark">Awards and Recognition</button>
				<button class="bg-grey-lighter px-6 py-4 border border-grey text-teal-dark">Professional Bodies</button>
			</div>
			<div class="flex flex-col h-full w-full border-2 border-grey container mx-auto p-4">
				<div class="flex flex-wrap">
					<button class="rounded-full bg-inherit border border-grey cursor-default this-black px-4 py-2 mx-4 my-2 text-sm">#keyword1</button>
					<button class="rounded-full bg-inherit border border-grey cursor-default this-black px-4 py-2 mx-4 my-2 text-sm">#keyword1</button>
					<button class="rounded-full bg-inherit border border-grey cursor-default this-black px-4 py-2 mx-4 my-2 text-sm">#keyword1</button>
					<button class="rounded-full bg-inherit border border-grey cursor-default this-black px-4 py-2 mx-4 my-2 text-sm">#keyword1</button>
					<button class="rounded-full bg-inherit border border-grey cursor-default this-black px-4 py-2 mx-4 my-2 text-sm">#keyword1</button>
					<button class="rounded-full bg-inherit border border-grey cursor-default this-black px-4 py-2 mx-4 my-2 text-sm">#keyword1</button>
					<button class="rounded-full bg-inherit border border-grey cursor-default this-black px-4 py-2 mx-4 my-2 text-sm">#keyword1</button>
					<button class="rounded-full bg-inherit border border-grey cursor-default this-black px-4 py-2 mx-4 my-2 text-sm">#keyword1</button>
					<button class="rounded-full bg-inherit border border-grey cursor-default this-black px-4 py-2 mx-4 my-2 text-sm">#keyword1</button>
					<button class="rounded-full bg-inherit border border-grey cursor-default this-black px-4 py-2 mx-4 my-2 text-sm">#keyword1</button>
					<button class="rounded-full bg-inherit border border-grey cursor-default this-black px-4 py-2 mx-4 my-2 text-sm">#keyword1</button>
					<button class="rounded-full bg-inherit border border-grey cursor-default this-black px-4 py-2 mx-4 my-2 text-sm">#keyword1</button>
					<button class="rounded-full bg-inherit border border-grey cursor-default this-black px-4 py-2 mx-4 my-2 text-sm">#keyword1</button>
					<button class="rounded-full bg-inherit border border-grey cursor-default this-black px-4 py-2 mx-4 my-2 text-sm">#keyword1</button>
					<button class="rounded-full bg-inherit border border-grey cursor-default this-black px-4 py-2 mx-4 my-2 text-sm">#keyword1</button>
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