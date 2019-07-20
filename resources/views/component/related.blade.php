<div class="flex-1 p-4">
	<p class="font-bold text-base p-4">{{ $type }}</p>
	<ul class="list-reset flex flex-col">
	@foreach($data as $item)
		<li class="m-2 mx-4">
			<button href="" class="w-full shadow border-l-8 border-black p-2 no-underline text-black bg-white hover:bg-teal-lighter hover:border-teal">{{ $item->title }}</button>
		</li>
	@endforeach
	</ul>
</div>