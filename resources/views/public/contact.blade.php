@extends('public.base')

@section('content')
<div class="flex flex-col w-full">
	<div class="flex w-full bg-grey-dark this-white shadow-md">
		<div class="flex mx-8 py-6">
			<p class="font-bold text-2xl">Sami Hajjaj</p>
		</div>
		<div class="container mx-auto flex justify-between py-6">
				<a class="no-underline nav-link" href="/v2/next">About</a>
				<a class="no-underline nav-link" href="/v2/portfolio">Academic</a>
				<a class="no-underline nav-link" href="/v2/research">Research</a>
				<a class="no-underline nav-link" href="/v2/mycorner">My Corner</a>
				<a class="border-b-4 border-blue-darker font-bold">Contact</a>
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
			<p class="text-5xl font-bold text-teal-dark pt-8">Let's Talk</p>
			<p class="text-xl text-teal-dark pt-6">Would you like to collaborate?
				<br>Perhaps fund a project?
				<br>Do you want to discuss research ideas? 
				<br>Do you want to talk about anything else? 
				<br>Let me hear from you</p>
			<div class="flex flex-col h-full w-full border-2 border-grey container mx-auto p-4 m-8">
				<div class="flex">
					<div class="flex flex-col text-left mx-8">
						<label class="py-2">Full Name</label>
						<input class="bg-whoite border border-grey-dark px-4 py-2" type="text" name="fullname" placeholder="John Doe">
					</div>
					<div class="flex flex-col text-left mx-8">
						<label class="py-2">Email</label>
						<input class="bg-whoite border border-grey-dark px-4 py-2" type="text" name="email" placeholder="john@example.com">
					</div>
				</div>
				<div class="flex flex-col text-left mx-8">
					<label class="py-2">Message</label>
					<textarea class="bg-whoite border border-grey-dark px-4 py-2" name="message" style="height: 200px;"></textarea>
				</div>
				<a class="mx-auto px-6 mt-6 py-4 bg-purple-darker text-white rounded shadow-lg" href="/v2/portfolio">Submit</a>
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