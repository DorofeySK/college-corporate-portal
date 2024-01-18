@extends('layouts.general')
@section('title', 'Загрузить документ')

@section('left_part')
<div class="w-full flex justify-center">
    <form action="{{ route('documents.store') }}" method="POST" enctype="multipart/form-data" class="w-full p-8 flex flex-col space-y-4 items-center">
        @csrf
        <input class="p-2 border-b border-black hover:bg-black hover:text-white" type="file" id="new_file" name="new_file">
        <input type="submit" value="Загрузить" class="p-2 border-b border-black hover:bg-black hover:text-white">
    </form>
</div>
@endsection('left_part')
