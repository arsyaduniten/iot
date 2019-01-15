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
            <th class="p-2">Content</th>
            <th class="p-2">Post Date</th>
            <th></th><th></th>
        </tr>
        @foreach($data as $blog)
        <tr class="">
            <td class="p-2">{{ $blog->title }}</td>
            <td class="p-2"><?php echo $blog->content ?></td>
            <td class="p-2">{{ \Carbon\Carbon::parse($blog->created_at)->toDateString() }}</td>
            <td class="p-2 py-4"><a href="{{ route('backend:blog:edit', ['blog' => $blog]) }}" class="text-black font-bold no-underline p-2 bg-yellow">Edit</a></td>
            <td class="p-2 py-4"><a href="{{ route('backend:blog:destroy', ['blog' => $blog]) }}" class="text-white font-bold no-underline p-2 bg-red">Delete</a></td>
        </tr>
        @endforeach
    </table>
</div>
@endsection

@section('script')
@endsection