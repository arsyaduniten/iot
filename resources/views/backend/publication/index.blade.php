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
            <th class="p-2">Start Date</th>
            <th class="p-2">End Date</th>
            <th></th><th></th>
        </tr>
        @foreach($data as $publication)
        <tr class="">
            <td class="p-2">{{ $publication->title }}</td>
            <td class="p-2"><?php echo $publication->description ?></td>
            <td class="p-2">{{ $publication->start_date }}</td>
            <td class="p-2">{{ $publication->end_date }}</td>
            <td class="p-2 py-4"><a href="{{ route('backend:publication:edit', ['publication' => $publication]) }}" class="text-black font-bold no-underline p-2 bg-yellow">Edit</a></td>
            <td class="p-2 py-4"><a href="{{ route('backend:publication:destroy', ['publication' => $publication]) }}" class="text-white font-bold no-underline p-2 bg-red">Delete</a></td>
        </tr>
        @endforeach
    </table>
</div>
@endsection

@section('script')
@endsection