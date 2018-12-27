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
            <th>Logo</th>
            <th class="p-2">Name</th>
            <th class="p-2">Description</th>
            <th class="p-2">Logo Url</th>
            <th class="p-2">Related Projects</th>
            <th></th><th></th>
        </tr>
        @foreach($data as $collaborator)
        <tr class="">
            <td class="p-2"><img width="150" height="150" class="" src="{{ \Image::make($collaborator->logo_url)->greyscale()->encode('data-url') }}"></td>
            <td class="p-2">{{ $collaborator->name }}</td>
            <td class="p-2"><?php echo $collaborator->description ?></td>
            <td class="p-2">{{ $collaborator->logo_url }}</td>
            <td class="p-2">{{ implode(", ", $collaborator->tagNames()) }}</td>
            <td class="p-2 py-4"><a href="{{ route('backend:collaborator:edit', ['collaborator' => $collaborator]) }}" class="text-black font-bold no-underline p-2 bg-yellow">Edit</a></td>
            <td class="p-2 py-4"><a href="{{ route('backend:collaborator:destroy', ['collaborator' => $collaborator]) }}" class="text-white font-bold no-underline p-2 bg-red">Delete</a></td>
        </tr>
        @endforeach
    </table>
</div>
@endsection

@section('script')
@endsection