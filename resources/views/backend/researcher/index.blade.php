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
            <th class="p-2">First Name</th>
            <th class="p-2">Last Name</th>
            <th class="p-2">Image URL</th>
            <th class="p-2">Profile URL</th>
            <th class="p-2">Related Projects</th>
            <th></th><th></th>
        </tr>
        @foreach($data as $researcher)
        <tr class="">
            <td class="p-2"><img width="50" height="50" class="border-white shadow-md border-2 rounded-full" src="{{ Avatar::create($researcher->full_name)->setDimension(200)->toBase64() }}"></td>
            <td class="p-2">{{ $researcher->first_name }}</td>
            <td class="p-2"><?php echo $researcher->last_name ?></td>
            <td class="p-2">{{ $researcher->image_url }}</td>
            <td class="p-2">{{ $researcher->profile_url }}</td>
            <td class="p-2">{{ implode(", ", $researcherz->tagNames()) }}</td>
            <td class="p-2 py-4"><a href="{{ route('backend:researcher:edit', ['researcher' => $researcher]) }}" class="text-black font-bold no-underline p-2 bg-yellow">Edit</a></td>
            <td class="p-2 py-4"><a href="{{ route('backend:researcher:destroy', ['researcher' => $researcher]) }}" class="text-white font-bold no-underline p-2 bg-red">Delete</a></td>
        </tr>
        @endforeach
    </table>
</div>
@endsection

@section('script')
@endsection