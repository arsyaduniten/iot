@extends('public.base')

@section('content')

<style type="text/css">
	.topcontent {
		background-image: url('/images/bg4.png');
		background-color: rgba(216, 216, 216, 0.40);
		background-blend-mode: lighten;
		height: 85vh;
		background-repeat: no-repeat;
  		background-size: cover;
   		background-position: center bottom;
	}

	.active {
		/*border-color: #9DE0E3;*/
		border-bottom: 4px #9DE0E3 solid;
	}

	.active-tab{
		border-left: 10px #4DC0B5 solid;
		background-color: #A0F0ED;
	}

	.brand-color{
		background-color: #9DE0E3;
	}

	/*.is-outlined{
		outline-style: solid;
		outline-color: #E8FFFE;
		out
	}*/

	#about-me{

	}
	html, body {
	  overflow: scroll !important;
	}

	.avatar-upload .avatar-preview {
	  width: 100px;
	  height: 100px;
	  /*position: relative;*/
	  border-radius: 100%;
	  /*border: 6px solid #F8F8F8;
*/	  box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1);
	}
	.avatar-upload .avatar-preview > div {
	  width: 100%;
	  height: 100%;
	  border-radius: 100%;
	  background: white;
	  background-size: cover;
	  background-repeat: no-repeat;
	  background-position: center;
	}
	#sourcePreview{
		margin:auto;
	}
</style>


<div class="topcontent shadow-md">
	<nav class="flex items-center justify-between flex-wrap p-6" id="navbar">
	    <div class="flex items-center flex-no-shrink text-black mr-6">
	      <img src="/images/logo.png" alt="img" border="0" style="display: block; width: 80px;" />
	    </div>
	    <div class="block md:hidden">
	      <button class="flex items-center px-3 py-2 border rounded text-white border-white hover:text-white" id="navbar-btn">
	        <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Menu</title><path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/></svg>
	      </button>
	    </div>
	    <div id="toggle-nav" class="hidden w-full md:block flex-grow lg:flex lg:items-center lg:w-auto">
	      <div class="text-sm lg:flex-grow">
	        <!-- <a href="#responsive-header" class="block mt-4 lg:inline-block lg:mt-0 text-black-lighter hover:text-black mr-4">
	          FAQ
	        </a> -->
	        <!-- <a href="#responsive-header" class="block mt-4 lg:inline-block lg:mt-0 text-teal-lighter hover:text-black mr-4">
	          Examples
	        </a>
	        <a href="#responsive-header" class="block mt-4 lg:inline-block lg:mt-0 text-teal-lighter hover:text-black">
	          Blog
	        </a> -->
	      </div>
	      <div id="navright">
	         <a data="home" style="text-decoration: none;" class="block mt-4 lg:inline-block lg:mt-0 hover:text-black mr-8 font-bold pb-2 nav-tab text-black active cursor-pointer">
		       Home
		      </a>
		      <a data="about-me"  style="text-decoration: none;" class="block mt-4 lg:inline-block lg:mt-0 hover:text-black mr-8 pb-2 font-bold nav-tab text-grey-darkest cursor-pointer">
		        About Me
		      </a>
		      <a data="collaborate" style="text-decoration: none;" class="block mt-4 lg:inline-block lg:mt-0 hover:text-black mr-8 pb-2 font-bold nav-tab text-grey-darkest cursor-pointer">
		        Collaborate
		      </a>
	      </div>
	    </div>
	</nav>
	<div id="home" class="container mx-auto my-20 text-center">
		<p class="font-extrabold text-5xl">Let's Build Something <br>Amazing Together</p>
		<button class="shadow-md p-4 text-2xl font-semibold rounded px-8 mt-4" style="background-color: #9DE0E3;">LEARN MORE</button>
	</div>
</div>

<div id="about-me">
	<div class="text-center p-4 relative z-20 shadow-md">
		<p class="text-4xl font-bold p-4">About Me</p>
		<p class="text-xl font-base p-4">{{ $user->about_short }}</p>
	</div>
	<div class="flex items-start relative z-10" style="background-color: #39445C;">
		<div class="flex flex-col bg-white rounded shadow-md text-center items-center m-8 mr-4 w-1/5">
			<div class="brand-color py-10 w-full rounded-t -mb-2"></div>
			<div class="avatar-upload">
	            <div class="avatar-preview">
	                <div id="sourcePreview" class="" style="background-image: url({{ $user->profile_url }});">
	                </div>
	            </div>
	        </div>
{{-- 			<img class="justify-center" src="{{ $user->profile_url }}" style="height: 100px; width: 100px; margin: -40px">
 --}}			<p class="pt-6 mt-6 font-bold">{{ $user->full_name }}</p>
			<p class="p-2 mx-4 text-grey-dark text-xs leading-tight"><?php echo $user->box_description ?></p>
			<div class="flex items-center justify-center p-4">
				<img class="p-1" src="./images/linkedin.png" style="width: 30px; height: 30px;">
				<img class="p-1" src="./images/fb.png" style="width: 30px; height: 30px;">
				<img class="p-1" src="./images/youtube.png" style="width: 40px; height: 30px;">
			</div>
		</div>
		<div class="flex flex-col w-4/5">
			<div class="flex mr-8 text-center">
				<div class="flex-1 bg-white mt-8 ml-8 py-4 mb-2 
				{{ Request::get('active') == null ? 'active-tab shadow-inner' : Request::get('active') == 'about-me' ? 'active-tab shadow-inner' : ''}}">
					<a href="{{ Request::get('active') == null ? "#" : Request::get('active') == 'about-me' ? "#" : url('/')."?active=about-me"}}" class="text-black p-2 no-underline {{ Request::get('active') == null ? 'font-semibold' : Request::get('active') == 'about-me' ? 'font-semibold' : ''}}">About Me</a>
				</div>
				{{-- <div class="flex-1 bg-white mt-8 py-4 mb-2 {{ Request::get('active') == 'education' ? 'active-tab shadow-inner' : ''}}">
					<a href="{{ Request::get('active') == 'education' ? '#' : url('/')."?active=education"}}" class="text-black p-2 no-underline {{ Request::get('active') == 'education' ? 'font-semibold' : ''}}">Education</a>
				</div> --}}
				<div class="flex-1 bg-white mt-8 py-4 mb-2 {{ Request::get('active') == 'research' ? 'active-tab shadow-inner' : ''}}">
					<a href="{{ Request::get('active') == 'research' ? '#' : url('/')."?active=research"}}" class="text-black p-2 no-underline {{ Request::get('active') == 'research' ? 'font-semibold' : ''}}">Research Areas</a>
				</div>
				{{-- <div class="flex-1 bg-white mt-8 py-4 mb-2 {{ Request::get('active') == 'iot' ? 'active-tab shadow-inner' : ''}}">
					<a href="{{ Request::get('active') == 'iot' ? '#' : url('/')."?active=iot"}}" class="text-black p-2 no-underline {{ Request::get('active') == 'iot' ? 'font-semibold' : ''}}">Iot</a>
				</div> --}}
				<div class="flex-1 bg-white mt-8 py-4 mb-2 {{ Request::get('active') == 'project' ? 'active-tab shadow-inner' : ''}}">
					<a href="{{ Request::get('active') == 'project' ? '#' : url('/')."?active=project"}}" class="text-black p-2 no-underline {{ Request::get('active') == 'project' ? 'font-semibold' : ''}}">Project</a>
				</div>
				<div class="flex-1 bg-white mt-8 py-4 mb-2 {{ Request::get('active') == 'awards' ? 'active-tab shadow-inner' : ''}}">
					<a href="{{ Request::get('active') == 'awards' ? '#' : url('/')."?active=awards"}}" class="text-black p-2 no-underline {{ Request::get('active') == 'awards' ? 'font-semibold' : ''}}">Awards</a>
				</div>
				<div class="flex-1 bg-white mt-8 py-4 mb-2 {{ Request::get('active') == 'rants' ? 'active-tab shadow-inner' : ''}}">
					<a href="{{ Request::get('active') == 'rants' ? '#' : url('/')."?active=rants"}}" class="text-black p-2 no-underline {{ Request::get('active') == 'rants' ? 'font-semibold' : ''}}">Rants</a>
				</div>
			</div>
			{{-- <a class="text-black p-2">Education</a>
				<a class="text-black p-2">Research</a>
				<a class="text-black p-2">Projects</a>
				<a class="text-black p-2">Awards</a> --}}
			<div class="rounded-b shadow-md items-center mr-8 ml-8 mb-8 p-10 overflow-x-scroll" style="max-height: 80vh; background: #FBFBFB;">
				@if(gettype($data) != "string" && $data->count() > 0)
					@switch(Request::get('active'))
						@case('education')
						<div class="flex flex-col items-start">
							@foreach($data as $item)
								<div class="border-l-4 border-grey-light flex flex-col w-full">
									<p class="ml-4 font-bold text-black text-2xl">{{ $item->degree }}</p>
									<p class="m-4 mb-1 -my-1 font-bold text-grey-dark text-xl">{{ $item->institution }}</p>
									@component('component.button_outline')
										{{ strtoupper(\Carbon\Carbon::parse($item->date_start)->format('M')) }} 
										{{ \Carbon\Carbon::parse($item->date_start)->year }}
										-
										{{ strtoupper(\Carbon\Carbon::parse($item->date_completed)->format('M')) }} 
										{{ \Carbon\Carbon::parse($item->date_completed)->year }}
									@endcomponent
									<div class="m-2 mt-0 mx-4 text-grey-dark text-base"><?php echo $item->description ?></div>
								</div>
							@endforeach
						</div>
						@break
						@case('research')
						<table class="shadow-lg rounded m-2">
							<tr>
								<th class="p-2">Research Area</th>
								<th class="p-2">Description</th>
								<th class="p-2">Start Date</th>
								<th class="p-2">End Date</th>
								<th></th>
							</tr>
							@foreach($data as $research)
							<tr class=""> 
								<td class="p-3">{{ $research->research_area }}</td>
								<td class="p-2"><?php echo $research->description ?></td>
								<td class="p-2">{{ $research->start_date }}</td>
								<td class="p-2">{{ $research->end_date }}</td>
								<td class="p-2"><a href="{{ route('details') }}?type=research" class="rounded-full no-underline bg-blue-darker p-2 px-4 text-white text-xs font-bold">VIEW</a></td>
							</tr>
							@endforeach
						</table>
						@break
						@case('project')
						<table class="border border-grey-dark m-2">
					        <tr>
					            <th class="p-2">Title</th>
					            <th class="p-2">Description</th>
					            <th class="p-2">Start Date</th>
					            <th class="p-2">End Date</th>
					        </tr>
					        @foreach($data as $project)
					        <tr class="">
					            <td class="p-2">{{ $project->title }}</td>
					            <td class="p-2"><?php echo $project->description ?></td>
					            <td class="p-2">{{ $project->start_date }}</td>
					            <td class="p-2">{{ $project->end_date }}</td>
					        </tr>
					        @endforeach
					    </table>
					    @break
						@case('awards')
						<table class="border border-grey-dark m-2">
					        <tr>
					            <th class="p-2">Title</th>
					            <th class="p-2">Description</th>
					            <th class="p-2">Awarded By</th>
					            <th class="p-2">Date Obtained</th>
					        </tr>
					        @foreach($data as $award)
					        <tr class="">
					            <td class="p-2">{{ $award->title }}</td>
					            <td class="p-2"><?php echo $award->description ?></td>
					            <td class="p-2">{{ $award->awarded_by }}</td>
					            <td class="p-2">{{ $award->date_obtained }}</td>
					        </tr>
					        @endforeach
					    </table>
						@break
					@endswitch
				@else
				<?php echo htmlspecialchars_decode($data) ?>
				@endif
			</div>
		</div>
	</div>
</div>

<div id="collaborate" class="flex flex-col bg-grey-lighter shadow-md items-center">
	<p class="text-4xl font-bold p-8">Collaborate</p>
	<form class="flex flex-col items-center">
		<input class="p-4 m-4 rounded shadow-md w-full" type="text" name="type" placeholder="Type">
		<input class="p-4 m-4 rounded shadow-md w-full" type="email" name="email" placeholder="Email">
		<textarea class="p-4 m-4 rounded shadow-md w-full" rows="4" cols="50" placeholder="Message"></textarea>
		<button type="submit" class="text-white w-1/2 rounded shadow-md p-4 font-bold m-4" style="background-color: #39445C;">SUBMIT</button>
	</form>
</div>




@endsection

@section('script')
<script type="text/javascript">
    $(document).ready(function(){
    	@if(Request::get('active'))
    		let hash = "#about-me";
    		$('html, body').animate({
		        scrollTop: $(hash).offset().top
		    }, 10);
    	@endif
    	$('#navright a').on('click', function(){
    		console.log("clicked");
			let hash = "#"+ $(this).attr("data");
			console.log(hash);
	    	let navs = ['#home', '#about-me', '#collaborate'];
	    	navs.forEach(function(nav){
	    		if(nav == hash){
	    			$(nav).removeClass('text-grey-darkest');
	    			$(nav).addClass('text-black active');
	    		} else {
	    			$(nav).removeClass('text-black active');
	    			$(nav).addClass('text-grey-darkest');
	    		}	    	
	    	});
	    	$('html, body').animate({
		        scrollTop: $(hash).offset().top
		    }, 1000);
    	});
    	
    });
</script>

@endsection