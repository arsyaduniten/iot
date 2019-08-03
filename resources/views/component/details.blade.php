@extends('public.base')

@section('head')

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

	body{
/*		background: #e5e5e5;
*/	
		background: white;
	}

	/*.is-outlined{
		outline-style: solid;
		outline-color: #E8FFFE;
		out
	}*/

	#about-me{

	}

	a {
		text-decoration: none;
	}

	.elevated-btn{
		color: #FFFFFF !important;
	    display: block;
	    border: 0 !important;
	    background-image: linear-gradient(-180deg, #4653F1 0%, #1524DA 100%);
	    box-shadow: 0 2px 4px 0 rgba(22, 71, 182, 0.3) !important;
	}

	[data-popup] {
	  position: relative;
	}
	[data-popup]:before, [data-popup]:after {
	  opacity: 0;
	  transform: translate(-50%, 0);
	  transition: 0.15s ease opacity, 0.15s ease transform;
	  will-change: opacity transform;
	  content: "";
	}
	[data-popup]:hover:before, [data-popup]:hover:after {
	  position: absolute;
	  left: 50%;
	  transform: translate(-50%, -10px);
	  opacity: 1;
	}
	[data-popup]:hover:before {
	  bottom: 100%;
	  padding: 5px 10px;
	  background: rgba(0, 0, 0, 0.8);
	  border-radius: 5px;
	  color: white;
	  font-size: 12px;
	  line-height: 12px;
	  text-align: center;
	  content: attr(data-popup);
	  white-space: nowrap;
	}
	[data-popup]:hover:after {
	  top: 0;
	  height: 0;
	  width: 0;
	  border: solid transparent;
	  border-top-color: rgba(0, 0, 0, 0.8);
	  border-width: 5px;
	  content: "";
	}

	.submit-btn{
		width:350px; 
		background-color: #276EF1; 
		transition: 0.6s;
	}

	.submit-btn:hover{
		background-color: black;
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

	.object {
	    transition: all 0.5s ease-in-out;
    	-webkit-transition: all 0.5s ease-in-out; /** Chrome & Safari **/
    	-moz-transition: all 0.5s ease-in-out; /** Firefox **/
    	-o-transition: all 0.5s ease-in-out; /** Opera **/
	}

	.axis:hover .move-left {
	    transform: translate(-15px,0);
	    -webkit-transform: translate(-15px,0); /** Safari & Chrome **/
	    -o-transform: translate(-15px,0); /** Opera **/
	    -moz-transform: translate(-15px,0); /** Firefox **/
	}

	.axis:hover .move-right {
	    transform: translate(25px,0);
	    -webkit-transform: translate(25px,0); /** Safari & Chrome **/
	    -o-transform: translate(25px,0); /** Opera **/
	    -moz-transform: translate(25px,0); /** Firefox **/
	}
   
</style>
@endsection

@section('content')
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
				<a class="no-underline hover:text-blue-darker mx-4" href="/contact">Contact Me</a>
		</div>
	</div>
	<div class="flex">
		<div class="hidden md:flex md:flex-col px-6 bg-grey-darker py-6 h-screen shadow-md fixed left-nav">
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
				<p class="font-bold this-white text-xl">Latest Activity:</p>
				@foreach(\App\LatestActivity::where('type','mycorner')->orderBy('created_at', 'desc')->take(1)->get() as $latest)
				<a href="{{ $latest->link }}" class="pt-2 py-1 text-blue-lighter hover:text-blue-light">{{ $latest->text }}</a>
				@endforeach
				<div class="border border-blue-lighter my-2 mr-2"></div>
				@foreach(\App\LatestActivity::where('type','other')->orderBy('created_at', 'desc')->take(4)->get() as $latest)
				<a href="{{ $latest->link }}" class="pt-2 py-1 text-blue-lighter hover:text-blue-light">{{ $latest->text }}</a>
				@endforeach
			</div>
		</div>
		<div class="text-left w-full mt-16" style="margin-left: 200px;">
			<div class="m-4 rounded-t-lg z-20">
				<div class="flex px-8 py-2 rounded-t-lg axis">
					<div class="text-left">
						<p class="text-4xl font-bold p-4 px-8 text-black">{{ $h_title }}</p>
					</div>
				</div>
				<div class="flex mx-4 px-8">
					<div class="">
						<p class="px-4 text-2xl font-bold text-teal-darker">Description</p>
						<div class="px-4 py-2"><?php echo $data->description ?></div>
					</div>
				</div>
				<div class="flex flex-col mx-4 px-4 mb-0 pb-0">
					@if(array_key_exists('projects', $r_data))
						<div class="flex-1 px-4 py-2">
							<p class="font-bold text-teal-darker text-2xl px-4 py-2">Projects</p>
							@if(empty($r_data['projects']))
							<p class="text-large text-grey-dark px-4">Work in Progress</p>
							@else
							<ul class="text-base px-4 py-2 px-8">
							@foreach($r_data['projects'] as $key => $item)
							<li><a class="no-underline text-blue-darker hover:text-blue-light" href="/details?type=project&id={{ $item->id }}">{{ $item->title }}</a></li>
							@endforeach
							</ul>
							@endif
						</div>
					@endif
					@if(array_key_exists('research_areas', $r_data))
						<div class="flex-1 px-4">
							<p class="font-bold text-2xl text-teal-darker px-4">Research Areas</p>
							@if(empty($r_data['research_areas']))
							<p class="text-large text-grey-dark px-4">Work in Progress</p>
							@else
							<ul class="text-base px-4 py-2 px-8">
							@foreach($r_data['research_areas'] as $key => $item)
							<li><a class="no-underline text-blue-darker hover:text-blue-light" href="/details?type=research&id={{ $item->id }}">{{ $item->research_area }}</a></li>
							@endforeach
							</ul>
							@endif
						</div>
					@endif
					<space-between/>
					@if(array_key_exists('publications', $r_data))
						<div class="flex-1 px-4">
							<p class="font-bold text-2xl text-teal-darker px-4">Publications</p>
							@if(empty($r_data['publications']))
							<p class="text-large text-grey-dark px-4">Work in Progress</p>
							@else
							<ul class="text-base py-2 px-8">
							@foreach($r_data['publications'] as $key => $item)
							<li><a class="no-underline text-blue-darker hover:text-blue-light" target="_blank" href="{{ $item->paper_url }}">{{ $item->title }}</a></li>
							@endforeach
							</ul>
							@endif
						</div>
					@endif
					<space-between/>
					@if(array_key_exists('awards', $r_data))
						<div class="flex-1 px-4">
							<p class="font-bold text-2xl text-teal-darker px-4">Innovation Awards</p>
							@if(empty($r_data['awards']))
							<p class="text-large text-grey-dark px-4">Work in Progress</p>
							@else
							<ul class="text-base px-8 py-2">
							@foreach($r_data['awards'] as $key => $item)
							<li><a class="no-underline text-blue-darker hover:text-blue-light" target="_blank" href="{{ $item->file_url_s3 }}">{{ $item->title }}</a></li>
							@endforeach
							</ul>
							@endif
						</div>
					@endif
				</div>
				<div class="flex flex-col m-4 p-4 pt-0">
					@if(array_key_exists('fundings', $r_data) or $total_fund > 0)
						<div class="flex-1 px-4">
							<p class="font-bold text-2xl text-teal-darker px-4 py-2">Fundings</p>
							@if($title == 'Project')
							<ul class="list-reset flex flex-col">
							@foreach($r_data['fundings'] as $item)
								<li class="m-2 mx-4">
									{{ $item->granted_by }} MYR{{ number_format($item->amount) }}
								</li>
							@endforeach
							</ul>
							@else
							<p class="text-base p-4">
								MYR{{ $total_fund }}
							</p>
							@endif
						</div>
					@endif
					<space-between/>
					@if(array_key_exists('collaborators', $r_data))
						<div class="flex-1 p-4">
							<p class="font-bold text-2xl text-teal-darker px-4">Collaborators</p>
							@if(empty($r_data['collaborators']))
							<p class="text-large text-grey-dark px-4">Work in Progress</p>
							@else
							<ul class="text-base py-2 px-8">
							@foreach($r_data['collaborators'] as $key => $item)
							<li><a class="no-underline text-blue-darker hover:text-blue-light" href="{{ $item->company_url }}">{{ $item->name }}</a></li>
							@endforeach
							</ul>
							@endif
						</div>
					@endif
				</div>
			</div>
			@if($data->external_link != null)
			<div class="z-10 mb-8 mx-4 px-8">
				<div class="px-8 pt-4">
				<button class="p-4 flex text-white font-bold my-2 text-3xl submit-btn axis"><span class="self-center mx-8 pb-1">Learn More</span><svg class="object move-right" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
width="50" height="50"
viewBox="0 0 172 172"
style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><g id="surface1"><path d="M102.6625,45.0425c-2.67406,0.25531 -4.95844,2.05594 -5.83187,4.59563c-0.88688,2.55312 -0.20156,5.375 1.74687,7.22937l22.2525,22.2525h-86.43c-0.215,-0.01344 -0.43,-0.01344 -0.645,0c-3.80281,0.17469 -6.73219,3.39969 -6.5575,7.2025c0.17469,3.80281 3.39969,6.73219 7.2025,6.5575h86.43l-22.36,22.2525c-2.70094,2.70094 -2.70094,7.08156 0,9.7825c2.70094,2.70094 7.08156,2.70094 9.7825,0l33.97,-34.0775l4.945,-4.8375l-4.945,-4.8375l-33.97,-34.0775c-1.45125,-1.49156 -3.50719,-2.24406 -5.59,-2.0425z"></path></g></g></g></svg></button>
				</div>
			</div>
			@endif
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
