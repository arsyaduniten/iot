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
            <th></th>
            <th class="p-2">Full Name</th>
            <th class="p-2">Profile URL</th>
            <th class="p-2">Related Projects</th>
            <th></th><th></th>
        </tr>
        @foreach($data as $researcher)
        <tr class="">
            <td class="p-2"><img width="50" height="50" class="border-white shadow-md border-2 rounded-full" src="{{ Avatar::create($researcher->fullname)->setDimension(200)->toBase64() }}"></td>
            <td class="p-2">{{ $researcher->fullname }}</td>
            <td class="p-2"><a href="{{ $researcher->profile_url }}" target="_blank">{{ $researcher->profile_url }}</a></td>
            <td class="p-2">{{ implode(", ", $researcher->tagNames()) }}</td>
            <td class="p-2 py-4"><a href="{{ route('backend:researcher:edit', ['researcher' => $researcher]) }}" class="text-black font-bold no-underline p-2 bg-yellow">Edit</a></td>
            <td class="p-2 py-4"><a href="{{ route('backend:researcher:destroy', ['researcher' => $researcher]) }}" class="text-white font-bold no-underline p-2 bg-red">Delete</a></td>
        </tr>
        @endforeach
    </table>
</div>
@endsection

@section('script')
@endsection