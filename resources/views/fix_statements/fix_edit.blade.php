@extends('layouts.general')
@section('title', 'Создание должности')

@section('left_part')
<div class="w-full flex justify-center">
    <form action="{{ route('fix.update', ['id' => $fix->id]) }}" method="POST" class="w-full p-8 grid grid-cols-3 gap-4 items-center">
        @csrf
        <p class="col-span-1 p-2 bg-slate-200 rounded-md">Отправитель</p>
        <p class="col-span-2 p-2 bg-slate-200 rounded-md">{{ App\Models\User::where('login', $fix->creator_login)->first()->getFullName() }}</p>
        <p class="col-span-1 p-2 bg-slate-200 rounded-md">Тип</p>
        <p class="col-span-2 p-2 bg-slate-200 rounded-md">{{ config('fixstatementtypes.' . $fix->type) }}</p>
        <p class="col-span-1 p-2 bg-slate-200 rounded-md">Описание</p>
        <p class="col-span-2 p-2 bg-slate-200 rounded-md">{{ $fix->description }}</p>
        <p class="col-span-1 p-2 bg-slate-200 rounded-md">Дата создания</p>
        <p class="col-span-2 p-2 bg-slate-200 rounded-md">{{ $fix->create_at }}</p>
        <p class="col-span-1 p-2 bg-slate-200 rounded-md">Комментарий исполнителя</p>
        <input name="assigner_comment" type="text" class="col-span-2 p-2 bg-slate-200 rounded-md">
        <p class="col-span-1 p-2 bg-slate-200 rounded-md">Статус</p>
        <select name="state" class="col-span-2 p-2 bg-slate-200 rounded-md">
            @foreach(config('fixstatementstates') as $key => $value)
                <option @if($fix->state == $key) selected @endif value="{{ $key }}">{{ $value }}</option>
            @endforeach
        </select>
        <input type="submit" value="Обновить статус" class="p-2 col-span-3 border-b border-black hover:bg-black hover:text-white">
    </form>
</div>
@endsection('left_part')
