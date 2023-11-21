@extends('layouts.general')
@section('title', 'Загрузить документ')

@section('left_part')
<div class="w-full flex justify-center">
    <form action="{{ route('add_doc_post') }}" method="POST" enctype="multipart/form-data" class="w-full">
        @csrf
        <input class="w-full p-8" type="file" id="new_file" name="new_file">
        <input type="submit" class="w-full" value="Загрузить">
    </form>
</div>
@endsection('left_part')
