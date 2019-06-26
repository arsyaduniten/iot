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
        <a class="p-4 m-4 rounded text-black text-xl bg-yellow action-btns" href="/v2/backend/getpage/1">Back to Layout</a>
        <a class="p-4 m-4 rounded text-black text-xl bg-green action-btns" href="/backend/statistic/create">Create New</a>
    </div>
    <table class="border border-grey-dark m-2">
        <tr>
            <th class="p-2">Content</th>
            <th class="p-2">Description</th>
            <th></th><th></th>
        </tr>
        @if(!$data->isEmpty())
        @foreach($data as $statistic)
        <tr class="">
            <td class="p-2">{{ $statistic->content }}</td>
            <td class="p-2">{{ $statistic->description }}</td>
            <td class="p-2 py-4"><a href="{{ route('backend:statistic:edit', ['statistic' => $statistic]) }}" class="text-black font-bold no-underline p-2 bg-yellow">Edit</a></td>
            <td class="p-2 py-4">
                <form id="delete-form-{{ $statistic->id }}" action="{{ route('backend:statistic:destroy', ['statistic' => $statistic]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="text-white font-bold no-underline p-2 bg-red delete-btn" data-id="{{ $statistic->id }}" type="submit">Delete</button>
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