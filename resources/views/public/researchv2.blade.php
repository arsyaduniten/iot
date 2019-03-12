@extends('public.base')

@section('content')
<div class="flex flex-col w-full">
	<div class="flex w-full bg-grey-dark shadow-md this-white">
		<div class="flex mx-8 py-6">
			<p class="font-bold text-2xl">Sami Hajjaj</p>
		</div>
		<div class="container mx-auto flex justify-between py-6">
				<a class="no-underline" href="/v2/next">About</a>
				<a class="no-underline" href="/v2/portfolio">Academic</a>
				<a class="border-b-4 border-blue-darker font-bold">Research</a>
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
		<div class="text-center w-full">
			<p class="text-5xl font-bold text-teal-dark pt-8">Research & Development</p>
			<p class="text-xl text-grey-darker pt-6">I'm currently involved in the following projects, click on a box to see the projects</p>
			<div class="flex w-full container mx-auto m-8 justify-between">
				<button class="bg-custom-dark px-6 py-4 shadow-md">Research<br>Areas</button>
				<button class="bg-custom-dark px-6 py-4 shadow-md">Active Projects</button>
				<button class="bg-custom-dark px-6 py-4 shadow-md">Industrial<br>Collaboration</button>
				<button class="bg-custom-dark px-6 py-4 shadow-md">Research<br>Colleagues</button>
				<button class="bg-custom-dark px-6 py-4 shadow-md">Events &<br>Activities</button>
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