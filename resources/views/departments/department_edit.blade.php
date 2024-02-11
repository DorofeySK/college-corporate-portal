@extends('layouts.general')
@section('title', 'Редактирование отдела')

@section('left_part')
<div class="w-full flex justify-center">
    <form action="{{ route('departments.update', ['id' => $department->id]) }}" method="POST" class="w-full p-8 flex flex-col space-y-4 items-center">
        @csrf
        <input type="text" name="name" placeholder="Введите название отдела" class="w-full p-2 border-b border-black" value="{{ $department->name }}">
        <select size="10" name="header" class="w-full p-2 border-b border-black">
            <option disabled>Выберите руководителя отдела (если его нет в списке, то используйте "-Нет-" и добавте его позже)</option>
            <option value="null">-Нет-</option>
            @foreach ($users as $user)
                <option @if($user->login == $department->header) selected @endif value="{{ $user->login }}">{{ $user->second_name }} {{ $user->first_name }}</option>
            @endforeach
        </select>
        <input type="submit" value="Обновить" class="p-2 border-b border-black hover:bg-black hover:text-white">
    </form>
</div>
@endsection('left_part')
