@extends('public.base')
@section('content')
<div class="mx-auto text-center flex flex-col items-center">
<p class="text-5xl this-black">Welcome to Backend V2</p>
	<div class="flex text-center m-12">
		<a class="border border-black p-4" href="{{ route('layout') }}">Layout</a>
		<a class="border border-black p-4" href="/backend">Content</a>
	</div>
</div>
@endsection
@section('script')
@endsection