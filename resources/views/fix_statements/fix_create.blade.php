@extends('layouts.general')
@section('title', 'Создание должности')

@section('left_part')
<div class="w-full flex justify-center">
    <form action="{{ route('fix.store') }}" method="POST" class="w-full p-8 flex flex-col space-y-4 items-center">
        @csrf
        <select size="8" name="type" class="w-full p-2 border-b border-blacыk">
            <option disabled>Выберите тип заявки</option>
            @foreach ($types as $key => $value)
                <option value={{ $key }}>{{ $value }}</option>
            @endforeach
        </select>
        <textarea name="description" class="w-full border border-black" rows="5" placeholder="Описание"></textarea>
        <input type="submit" value="Создать заявку" class="p-2 border-b border-black hover:bg-black hover:text-white disabled:opacity-50">
    </form>
</div>
@endsection('left_part')
