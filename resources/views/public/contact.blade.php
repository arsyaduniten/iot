@extends('public.base')

@section('content')
<div class="flex flex-col w-full">
	<div class="flex w-full bg-blue-custom-dark shadow-md">
		<div class="flex mx-8 py-6">
			<p class="font-bold text-2xl this-black">Sami Hajjaj</p>
		</div>
		<div class="container mx-auto flex justify-between py-6">
				<a class="no-underline nav-link" href="/v2">About</a>
				<a class="no-underline nav-link" href="/v2/portfolio">Portfolio</a>
				<a class="no-underline nav-link" href="/v2/research">My Research</a>
				<a class="no-underline nav-link" href="/v2/mycorner">My Corner</a>
				<a class="border-b-4 border-purple font-bold this-black">Contact</a>
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
			<p class="text-5xl font-bold text-purple-darker pt-8">Let's Talk</p>
			<p class="text-xl text-grey-darker pt-6">Would you like to collaborate?
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