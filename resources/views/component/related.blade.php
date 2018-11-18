<div class="bg-grey-lighter shadow-md flex-1 p-4">
	<p class="font-bold text-base p-4">{{ $type }}</p>
	<ul class="list-reset flex flex-col">
	@foreach($data as $item)
		<li class="m-2 p-2">
			<a href="" class="shadow-md border-l-8 border-black p-2 no-underline text-black bg-white hover:bg-teal-lighter hover:border-teal">{{ $item->title }}</a>
		</li>
	@endforeach
	</ul>
</div>