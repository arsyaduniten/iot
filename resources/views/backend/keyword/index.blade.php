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
            <th class="p-2">Label</th>
            <th class="p-2">Keywords</th>
            <th></th><th></th>
        </tr>
        @foreach($data as $keyword)
        <tr class="">
            <td class="p-2">{{ $keyword->label }}</td>
            <td class="p-2">{{ implode(", ", $keyword->tagNames()) }}</td>
            <td class="p-2 py-4"><a href="{{ route('backend:keyword:edit', ['keyword' => $keyword]) }}" class="text-black font-bold no-underline p-2 bg-yellow">Edit</a></td>
            <td class="p-2 py-4"><a href="{{ route('backend:keyword:destroy', ['keyword' => $keyword]) }}" class="text-white font-bold no-underline p-2 bg-red">Delete</a></td>
        </tr>
        @endforeach
    </table>
</div>
@endsection

@section('script')
@endsection