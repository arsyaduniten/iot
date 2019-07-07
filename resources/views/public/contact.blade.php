@extends('public.base')

@section('content')
<div class="fixed z-50 hidden" id="loader" style="top:50%; bottom:50%; left: 50%; right: 50%">
	<svg width="51px" height="50px" viewBox="0 0 51 50">
	    <rect y="0" width="13" height="50" fill="#1fa2ff">
	        <animate attributeName="height" values="50;10;50" begin="0s" dur="1s" repeatCount="indefinite" />
	        <animate attributeName="y" values="0;20;0" begin="0s" dur="1s" repeatCount="indefinite" />
	    </rect>
	    <rect x="19" y="0" width="13" height="50" fill="#12d8fa">
	        <animate attributeName="height" values="50;10;50" begin="0.2s" dur="1s" repeatCount="indefinite" />
	        <animate attributeName="y" values="0;20;0" begin="0.2s" dur="1s" repeatCount="indefinite" />
	    </rect>
	    <rect x="38" y="0" width="13" height="50" fill="#06ffcb">
	        <animate attributeName="height" values="50;10;50" begin="0.4s" dur="1s" repeatCount="indefinite" />
	        <animate attributeName="y" values="0;20;0" begin="0.4s" dur="1s" repeatCount="indefinite" />
	    </rect>
	</svg>
</div>
<div class="flex flex-col w-full">
	<div class="flex fixed pin-t w-full bg-grey-dark this-white shadow-md">
		<div class="flex flex-no-shrink mx-6 py-6">
			<a class="no-underline font-bold text-2xl" href="/">Sami Hajjaj</a>
		</div>
		<div class="flex justify-between py-6 px-12">
				<a class="no-underline hover:text-blue-darker mx-4" href="/profile">Profile</a>
				<a class="no-underline hover:text-blue-darker mx-4" href="/academic">Academic</a>
				<a class="no-underline hover:text-blue-darker mx-4 nav-link" href="/research">Research</a>
				<a class="no-underline hover:text-blue-darker mx-4" href="/mycorner">My Corner</a>
				<a class="border-b-4 border-blue-darker mx-4 font-bold">Contact Me</a>
		</div>
	</div>
	<div class="flex">
		<div class="flex flex-col px-6 bg-grey-darker py-6 h-screen shadow-md fixed left-nav">
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
				<p class="font-bold this-white text-xl">Recent Activity:</p>
				<a class="pt-2 py-1 this-white">Latest Post</a>
				<a class="py-1 this-white">Recent Project</a>
				<a class="py-1 this-white">Recent Award</a>
			</div>
		</div>
		<div class="text-left w-full mt-16" style="margin-left: 250px;">
			<p class="text-5xl font-bold text-teal-dark pt-8 mx-16">{{ $data->title }}</p>
			<div class="text-xl text-teal-dark pt-6 mx-16"><?php echo ($data->description->content); ?></div>
			<div class="flex flex-col h-full w-full p-4 m-8">
				<div class="flex flex-wrap">
					<div class="flex flex-col text-left mx-8">
						<label class="py-2">Full Name</label>
						<div class="flex flex-col">
							<input class="bg-white border border-grey-dark px-4 py-2" type="text" name="name" id="name" placeholder="John Doe" required>
							<p class="name-required hidden text-red text-base">*Full Name is required</p>
						</div>
					</div>
					<div class="flex flex-col text-left mx-8">
						<label class="py-2">Email</label>
						<div class="flex flex-col">
							<input class="bg-white border border-grey-dark px-4 py-2" type="text" name="email" id="email" placeholder="john@example.com">
							<p class="email-required hidden text-red text-base">*Email is required</p>
						</div>
					</div>
					<div class="flex flex-col text-left mx-8">
						<label class="py-2">Phone (optional)</label>
						<input class="bg-white border border-grey-dark px-4 py-2" type="number" name="phone" id="phone" placeholder="012-3456789">
					</div>
					<div class="flex flex-col text-left mx-8">
				      <label class="py-2">
				        Enquiry Type
				      </label>
				      <div class="relative border border-grey-dark bg-white">
				        <select class="block appearance-none w-full pl-4 pr-8 py-2 focus:outline-none" name="type" id="type">
				          	<option value="collaboration">Collaboration Request</option>
							<option value="consultancy">Consultancy</option> 
							<option value="funding">Funding</option>
							<option value="employment">Employment</option> 
							<option value="publications">Publications</option>
							<option value="events">Events</option>
							<option value="training">Training & Talks</option>
							<option value="networking">Networking</option> 
							<option value="technical_question">Technical Question</option> 
							<option value="others">Others</option> 
				        </select>
				        <div class="pointer-events-none absolute pin-y pin-r flex items-center px-2 text-grey-darker">
				          <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
				        </div>
				      </div>
					</div>
				</div>
				<div class="flex flex-col text-left mx-8" style="width:63.3%">
					<label class="py-2">Message</label>
					<div class="flex flex-col">
						<textarea class="bg-white border border-grey-dark px-4 py-2" name="message" id="message" style="height: 200px;"></textarea>
						<p class="message-required hidden text-red text-base">*Message is required</p>
					</div>
					<button class="px-6 mt-6 py-4 bg-purple-darker text-white rounded shadow-lg" id="submitBtn">Submit</button>
				</div>
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
			var incomplete = false;
	    	var name = $('input[name=name]').val();
	    	var email = $('input[name=email]').val();
	    	var message = $('textarea[name=message]').val();
	    	if(name == ''){
	    		$('.name-required').show();
	    		incomplete = true;
	    	}
	    	if(email == ''){
	    		$('.email-required').show();
	    		incomplete = true;
	    	}
	    	if(message == ''){
	    		$('.message-required').show();
	    		incomplete = true;
	    	}
	    	if(incomplete){
	    		return;
	    	} else{
	    		blurAll();
				var name = $('#name').val();
				var email = $('#email').val();
				var message = $('#message').val();
				var phone = $('#phone').val();
				var type = $("select[name=type] :selected").text();
				$.ajax({
				  type: "POST",
				  url: "/enquiry",
				  data: {'name': name, 'email':email, 'message':message, 'phone':phone, 'type':type},
				  success: function(){
				  	deBlur();
				  	swal("Thank You!", "Your enquiry has been submitted!", "success");
				  	$('#name').val("");
					$('#email').val("");
					$('#message').val("");
					$('#phone').val("");
				  },
				  error: function(e){
				  	console.log(e);
				  }
				});
	    	}
		});


    });
    function blurAll(){
		$( "*" ).not( "#loader , body, head, html, svg, rect").addClass('blur');
		$("#loader").removeClass('hidden');
	}
	function deBlur(){
		$( "*" ).not( "#loader , body, head, html, svg, rect").removeClass('blur');
		$("#loader").addClass('hidden');
	}
</script>

@endsection