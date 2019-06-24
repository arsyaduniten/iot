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
    <a class="p-4 m-4 rounded text-black text-xl bg-yellow action-btns" href="/v2/backend/getpage/4">Back to Layout</a>
    <a class="p-4 m-4 rounded text-black text-xl bg-green action-btns" href="/backend/project/create">Create New</a>
</div>
<div class="container mx-auto">
    <table class="border border-grey-dark m-2">
        <tr>
            <th class="p-2">Title</th>
            <th class="p-2">Description</th>
            <th class="p-2">Start Date</th>
            <th class="p-2">End Date</th>
            <th class="p-2">Related Research Areas</th>
            <th></th><th></th>
        </tr>
        @foreach($data as $project)
        <tr class="">
            <td class="p-2">{{ $project->title }}</td>
            <td class="p-2"><?php echo $project->description ?></td>
            <td class="p-2">{{ $project->start_date }}</td>
            <td class="p-2">{{ $project->end_date }}</td>
            <td class="p-2">{{ implode(", ", $project->tagNames()) }}</td>
            <td class="p-2 py-4"><a href="{{ route('backend:project:edit', ['project' => $project]) }}" class="text-black font-bold no-underline p-2 bg-yellow">Edit</a></td>
            <td class="p-2 py-4">
                <form id="delete-form-{{ $project->id }}" action="{{ route('backend:project:destroy', ['project' => $project]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="text-white font-bold no-underline p-2 bg-red delete-btn" data-id="{{ $project->id }}" type="submit">Delete</button>
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