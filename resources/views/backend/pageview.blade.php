@extends('public.base')
@section('content')
@include('backend.v2nav')
<p>{{ $p->title }}</p>

@if(!is_null($snss))
<div class="flex">
@foreach($snss as $sns)
<a class="text-teal-dark px-4" href="{{ $sns->url }}">{{ $sns->display_name }}</a><span class="border border-teal-dark"></span>
@endforeach
</div>
@endif

@if(!is_null($desc))
<p>{{ $desc->content }}</p>
@endif

@if(!is_null($stats))
<div class="flex">
@foreach($stats as $stat)
<div class="flex flex-col">
	<p class="p-4">{{ $stat->content }}</p>	
	<p class="p-4">{{ $stat->description }}</p>	
</div>
@endforeach
</div>
@endif
@endsection
@section('script')
@endsection