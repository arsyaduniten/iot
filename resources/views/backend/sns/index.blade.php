@extends('public.base')
@section('head')
<!-- include summernote css/js -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-lite.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-lite.js"></script>
@endsection
@section('content')
@include('backend.nav')
<div class="container mx-auto">
    <div class="flex container mx-auto">
        <a class="p-4 m-4 rounded text-black text-xl bg-yellow action-btns" href="/v2/backend/getpage/8">Back to Layout</a>
        <a class="p-4 m-4 rounded text-black text-xl bg-green action-btns" href="/backend/sns/create">Create New</a>
    </div>
    <table class="border border-grey-dark m-2">
        <tr>
            <th class="p-2">Display Name</th>
            <th class="p-2">Url</th>
            <th></th><th></th>
        </tr>
        @foreach($data as $sns)
        <tr class="">
            <td class="p-2">{{ $sns->display_name }}</td>
            <td class="p-2"><a target=_blank href="{{ $sns->url }}">{{ $sns->url }}</a></td>
            <td class="p-2 py-4"><a href="{{ route('backend:sns:edit', ['sns' => $sns]) }}" class="text-black font-bold no-underline p-2 bg-yellow">Edit</a></td>
            <td class="p-2 py-4"><a href="{{ route('backend:sns:destroy', ['sns' => $sns]) }}" class="text-white font-bold no-underline p-2 bg-red">Delete</a></td>
        </tr>
        @endforeach
    </table>
</div>
@endsection

@section('script')
@endsection