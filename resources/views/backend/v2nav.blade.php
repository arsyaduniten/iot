<div class="mx-auto bg-grey-darker text-center flex items-center">
@foreach($pages as $page)
<a class="p-4 this-white" href="{{ route('getpage', ['id' => $page->id]) }}">{{ $page->nav_title }}</a>
@endforeach
</div>