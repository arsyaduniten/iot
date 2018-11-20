<div class="bg-grey-lighter shadow-lg flex-1 p-4">
	<p class="font-bold text-base p-4">{{ $type }}</p>
	<div class="flex flex-wrap px-5">
	@foreach($data as $item)
		<a class="-mx-2" style="height: 40px; width: 40px;" data-popup="{{ $item->full_name }}"><img class="border-white shadow-md border-2 rounded-full" src="{{ Avatar::create($item->full_name)->setDimension(200)->toBase64() }}"  /></a>
	@endforeach
	</div>
</div>