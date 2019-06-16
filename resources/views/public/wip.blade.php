@extends('public.base')
@section('head')
<style type="text/css">
	.submit-btn{
		width:350px; 
		background-color: #276EF1; 
		transition: 0.6s;
	}

	.submit-btn:hover{
		background-color: black;
	}
	html, body {
	  overflow: visible !important;
	}
	.h-title{
		font-size: 80px;
	}
	.input-el{
		width: 350px;
	}
	.textarea-input{
		height: 120px;
	}
	@media only screen and (max-width: 768px) {
	  /* For mobile phones: */
	  .h-title {
		font-size: 40px;
	  }
	  .input-el{
		width: 70%;
	  }
	  .submit-btn{
		width:70%; 
		background-color: #276EF1; 
		transition: 0.6s;
	  }
	}
</style>
@endsection
@section('content')
<div class="container mx-auto text-center mt-20">
	<p class="font-bold text-black h-title">Thank you for visiting</p>
	<p class="text-xl mx-8 md:text-4xl md:mx-0 this-black pt-8">The website is currently under maintenance. Please leave a message and I will get back to you.</p>
	<p class="text-xl md:text-3xl this-black font-bold italic pt-8">- Sami Hajjaj -</p>
	<form id="enquiryForm" action="/landing/enquiry" method="post" class="flex flex-col items-center pt-8">
		@csrf
		<input class="p-4 px-5 my-2 border border-black input-el" type="text" name="email" placeholder="Your Email">
		<p class="text-red text-sm hidden" id="emailError">* Email is required</p>
		<textarea class="p-4 my-2 border border-black input-el textarea-input" name="message" placeholder="Message"></textarea>
		<p class="text-red text-sm text-left hidden" id="messageError">* Message is required</p>
		<button class="p-4 flex text-white font-bold my-2 text-3xl submit-btn"><span class="self-center w-full pb-1">Submit</span><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
width="50" height="50"
viewBox="0 0 172 172"
style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><g id="surface1"><path d="M102.6625,45.0425c-2.67406,0.25531 -4.95844,2.05594 -5.83187,4.59563c-0.88688,2.55312 -0.20156,5.375 1.74687,7.22937l22.2525,22.2525h-86.43c-0.215,-0.01344 -0.43,-0.01344 -0.645,0c-3.80281,0.17469 -6.73219,3.39969 -6.5575,7.2025c0.17469,3.80281 3.39969,6.73219 7.2025,6.5575h86.43l-22.36,22.2525c-2.70094,2.70094 -2.70094,7.08156 0,9.7825c2.70094,2.70094 7.08156,2.70094 9.7825,0l33.97,-34.0775l4.945,-4.8375l-4.945,-4.8375l-33.97,-34.0775c-1.45125,-1.49156 -3.50719,-2.24406 -5.59,-2.0425z"></path></g></g></g></svg></button>
	</form>
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

		$(".submit-btn").on('click', function(e){
			e.preventDefault();
			var email = $("input[name=email]").val();
			var message = $("textarea[name=message]").val();
			var isError = false;
			if(email == ""){
				$("#emailError").show();
				isError = true;
			} else {
				$("#emailError").hide();
			}
			if(message == ""){
				$("#messageError").show();
				isError = true;
			} else {
				$("#messageError").hide();
			}
			if(!isError){
				$.ajax({
				  type: "POST",
				  url: "/landing/enquiry",
				  data: {'email':email, 'message':message},
				  success: function(){
				  	swal("Thank You!", "Your enquiry has been submitted!", "success");
				  	$('input[name=email]').val("");
					$('textarea[name=message]').val("");
				  },
				  error: function(jqXHR, exception){
				  	console.log(exception);
				  	console.log(jqXHR.responseText);
				  },
				});
			}
		});
		@if(session()->has('status'))
		swal("Thank You!", "Your enquiry has been submitted!", "success");
		@endif
    });
</script>
@endsection



