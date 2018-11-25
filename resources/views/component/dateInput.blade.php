<div class="flex">
	<label class="self-center">{{ ucwords(str_replace('_', ' ', $name)) }}</label>
	<input class="self-center m-2 p-2 bg-white shadow-md rounded datepick" type="date" name="{{ $name }}" value="{{ $data }}">
</div>