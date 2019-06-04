@extends('public.base')

@section('content')
<div class="flex flex-col w-full">
	<div class="flex w-full bg-grey-dark this-white shadow-md">
		<div class="flex mx-8 py-6">
			<a class="no-underline font-bold text-2xl" href="/v2">Sami Hajjaj</a>
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
			<p class="text-xl text-teal-dark pt-6"><?php echo ($data->description->content); ?></p>
			<div class="flex flex-col h-full w-full border-2 border-grey container mx-auto p-4 m-8">
				<div class="flex">
					<div class="flex flex-col text-left mx-8">
						<label class="py-2">Full Name</label>
						<input class="bg-whoite border border-grey-dark px-4 py-2" type="text" name="name" id="name" placeholder="John Doe">
					</div>
					<div class="flex flex-col text-left mx-8">
						<label class="py-2">Email</label>
						<input class="bg-whoite border border-grey-dark px-4 py-2" type="text" name="email" id="email" placeholder="john@example.com">
					</div>
					<div class="flex flex-col text-left mx-8">
						<label class="py-2">Phone (optional)</label>
						<input class="bg-whoite border border-grey-dark px-4 py-2" type="number" name="phone" id="phone" placeholder="012-3456789">
					</div>
				</div>
				<div class="flex flex-col text-left mx-8">
					<label class="py-2">Message</label>
					<textarea class="bg-whoite border border-grey-dark px-4 py-2" name="message" id="message" style="height: 200px;"></textarea>
				</div>
				<button class="mx-auto px-6 mt-6 py-4 bg-purple-darker text-white rounded shadow-lg" id="submitBtn">Submit</button>
			</div>
		</div>
	</div>
</div>





@endsection

@section('script')
<script type="text/javascript">
    $(document).ready(function(){
    	$.ajaxSetup({
		    headers: {
		        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
		});

		$("#submitBtn").click(function(e){
			e.preventDefault();
			var name = $('#name').val();
			var email = $('#email').val();
			var message = $('#message').val();
			var phone = $('#phone').val();
			$.ajax({
			  type: "POST",
			  url: "/enquiry",
			  data: {'name': name, 'email':email, 'message':message, 'phone':phone},
			  success: function(){
			  	swal("Thank You!", "Your enquiry has been submitted!", "success");
			  	$('#name').val("");
				$('#email').val("");
				$('#message').val("");
				$('#phone').val("");
			  },
			});
		});


    });
</script>

@endsection