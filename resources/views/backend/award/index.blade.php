@extends('public.base')
@section('head')
<!-- include summernote css/js -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-lite.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-lite.js"></script>
@endsection
@section('content')
@include('backend.nav')
<div class="container mx-auto">
    <table class="border border-grey-dark m-2">
        <tr>
            <th class="p-2">Title</th>
            <th class="p-2">Description</th>
            <th class="p-2">Awarded By</th>
            <th class="p-2">Date Obtained</th>
            <th class="p-2">Related Projects</th>
            <th></th><th></th>
        </tr>
        @foreach($data as $award)
        <tr class="">
            <td class="p-2">{{ $award->title }}</td>
            <td class="p-2"><?php echo $award->description ?></td>
            <td class="p-2">{{ $award->awarded_by }}</td>
            <td class="p-2">{{ $award->date_obtained }}</td>
            <td class="p-2">{{ implode(", ", $award->tagNames()) }}</td>
            <td class="p-2 py-4"><a href="{{ route('backend:award:edit', ['award' => $award]) }}" class="text-black font-bold no-underline p-2 bg-yellow">Edit</a></td>
            <td class="p-2 py-4"><a href="{{ route('backend:award:destroy', ['award' => $award]) }}" class="text-white font-bold no-underline p-2 bg-red">Delete</a></td>
        </tr>
        @endforeach
    </table>
</div>
@endsection

@section('script')
@endsection