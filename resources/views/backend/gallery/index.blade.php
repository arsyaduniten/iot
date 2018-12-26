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
            <th class="p-2">Image Thumbnails</th>
            <th class="p-2">Related Projects</th>
            <th></th><th></th>
        </tr>
        @foreach($data as $gallery)
        <tr class="">
            <td class="p-2"><img src="{{ $gallery->url }}" width="100" height="100"></td>
            <td class="p-2">{{ implode(", ", $gallery->tagNames()) }}</td>
            <td class="p-2 py-4"><a href="{{ route('backend:gallery:edit', ['gallery' => $gallery]) }}" class="text-black font-bold no-underline p-2 bg-yellow">Edit</a></td>
            <td class="p-2 py-4">
                <form action="{{ route('backend:gallery:destroy', ['gallery' => $gallery]) }}" method="POST">
                    @csrf 
                    @method('DELETE')
                    <button class="text-white font-bold no-underline p-2 bg-red">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection

@section('script')
@endsection