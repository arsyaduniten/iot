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
    <a class="p-4 m-4 rounded text-black text-xl bg-green action-btns" href="/backend/collaborator/create">Create New</a>
</div>
<div class="container mx-auto">
    <table class="border border-grey-dark m-2">
        <tr>
            <th>Logo</th>
            <th class="p-2">Name</th>
            <th class="p-2">Description</th>
            <th class="p-2">Logo Url</th>
            <th class="p-2">Company Url</th>
            <th class="p-2">Related Projects</th>
            <th></th><th></th>
        </tr>
        @if(!$data->isEmpty())
        @foreach($data as $collaborator)
        <tr class="">
            <td class="p-2">
                @if($collaborator->logo_url != NULL)
                <img width="150" height="150" class="" src="{{ \Image::make($collaborator->logo_url)->greyscale()->encode('data-url') }}">
                @endif
            </td>
            <td class="p-2">{{ $collaborator->name }}</td>
            <td class="p-2"><?php echo $collaborator->description ?></td>
            <td class="p-2">{{ $collaborator->logo_url }}</td>
            <td class="p-2"><a href="{{ $collaborator->company_url }}" target="_blank">{{ $collaborator->company_url }}</a></td>
            <td class="p-2">{{ implode(", ", $collaborator->tagNames()) }}</td>
            <td class="p-2 py-4"><a href="{{ route('backend:collaborator:edit', ['collaborator' => $collaborator]) }}" class="text-black font-bold no-underline p-2 bg-yellow">Edit</a></td>
            <td class="p-2 py-4">
                <form id="delete-form-{{ $collaborator->id }}" action="{{ route('backend:collaborator:destroy', ['collaborator' => $collaborator]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="text-white font-bold no-underline p-2 bg-red delete-btn" data-id="{{ $collaborator->id }}" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
        @endif
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