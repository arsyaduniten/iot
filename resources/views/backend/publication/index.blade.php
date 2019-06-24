@extends('public.base')
@section('head')
<!-- include summernote css/js -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-lite.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-lite.js"></script>
<style type="text/css">
    html, body {
      overflow: scroll !important;
    }
</style>
@endsection
@section('content')
@include('backend.nav')
<div class="flex container mx-auto">
    <a class="p-4 m-4 rounded text-black text-xl bg-yellow action-btns" href="/v2/backend/getpage/3">Back to Layout</a>
    <a class="p-4 m-4 rounded text-black text-xl bg-green action-btns" href="/backend/publication/create">Create New</a>
</div>
<div class="container mx-auto">
    <a href="">
    <table class="border border-grey-dark m-2">
        <tr>
            <th class="p-2">Conference/Journal</th>
            <th class="p-2">Title</th>
            <th class="p-2">Publication Date</th>
            <th class="p-2">Citations</th>
            <th class="p-2">Related Projects</th>
            <th></th><th></th>
        </tr>
        @foreach($data as $publication)
        <tr class="">
            <td class="p-2"><a target="_blank" href="{{ $publication->conference_url }}">{{ $publication->conference }}</a></td>
            <td class="p-2"><a target="_blank" href="{{ $publication->paper_url }}">{{ $publication->title }}</a></td>
            <td class="p-2">{{ $publication->publication_date }}</td>
            <td class="p-2">{{ $publication->citations }}</td>
            <td class="p-2">{{ implode(", ", $publication->tagNames()) }}</td>
            <td class="p-2 py-4"><a href="{{ route('backend:publication:edit', ['publication' => $publication]) }}" class="text-black font-bold no-underline p-2 bg-yellow">Edit</a></td>
            <td class="p-2 py-4">
                <form id="delete-form-{{ $publication->id }}" action="{{ route('backend:publication:destroy', ['publication' => $publication]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="text-white font-bold no-underline p-2 bg-red delete-btn" data-id="{{ $publication->id }}" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection

@section('script')
<script type="text/javascript">
    $(document).ready(function(){
        $('.delete-btn').on('click', function(e){
            const formId = $(this).attr('data-id');
            e.preventDefault();
            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this data!",
                icon: "warning",
                buttons: ['Cancel', 'Yes, delete it!'],
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $('#delete-form-'+formId).submit();
                }
            });
        });
    });
</script>
@endsection