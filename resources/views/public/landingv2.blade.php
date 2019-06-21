@extends('public.base')

@section('content')
<div class="flex">
@include('layouts.nav')
</div>

@endsection

@section('script')
<script type="text/javascript">
    $(document).ready(function(){
    	$('.sub-nav').click(function(e){
    		e.preventDefault();
            $('.landing-message').hide();
    		$('.sub-nav').each(function(){
    			$(this).removeClass('bg-green text-white');
				$(this).addClass('bg-grey-lighter text-teal-dark');
    		});
			$(this).removeClass('bg-grey-lighter text-teal-dark');
    		$(this).addClass('bg-green text-white');
    		$(".content").each(function(){
    			$(this).addClass('hidden');
    		});
    		$("#"+$(this).attr('content-id')).removeClass('hidden');
    	});
    });
</script>

@endsection