@extends('layouts.general')
@section('title', 'Создание должности')

@section('left_part')
<div class="w-full flex justify-center">
    <form action="{{ route('jobs.store') }}" method="POST" class="w-full p-8 flex flex-col space-y-4 items-center">
        @csrf
        <input type="text" name="name" placeholder="Введите название должности" class="w-full p-2 border-b border-black">
        <input type="number" name="rang" placeholder="Введите ранг должности" class="w-full p-2 border-b border-black">
        <select multiple size="3" name="roles[]" class="w-full p-2 border-b border-black">
            <option disabled>Выберите роли (модификаторы)</option>
            <option value="null">-Нет-</option>
            @foreach ($roles as $key => $value)
                <option value={{ $key }}>{{ $value }}</option>
            @endforeach
        </select>
        <input type="submit" value="Добавить новую должность" class="p-2 border-b border-black hover:bg-black hover:text-white">
    </form>
</div>
@endsection('left_part')
