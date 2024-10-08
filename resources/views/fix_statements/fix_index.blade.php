@extends('layouts.general')
@section('title', 'Заявка на ремонт')

@section('left_part')
<div class="w-full h-full overflow-scroll scrollbar p-12">
    <a type="button" class="p-2 border-b border-black hover:bg-black hover:text-white mb-6" href="{{ route('fix.create') }}">Создать заявку</a>
    <table class="table-auto border border-collapse border-black border-spacing-10">
        <thead>
            <th class="border border-slate-600 p-4">Отправитель</th>
            <th class="border border-slate-600 p-4">Ответственный</th>
            <th class="border border-slate-600 p-4">Тип</th>
            <th class="border border-slate-600 p-4">Создан</th>
            <th class="border border-slate-600 p-4">Статус</th>
            @if (in_array('admin', $current_roles) == true)<th class="border border-slate-600 p-4">Изменить</th>@endif
        </thead>
        <tbody>
            @foreach ($fix_statements as $fix)
            <td class="border border-slate-600 p-4">{{ App\Models\User::where('login', $fix->creator_login)->first()->getFullName() }}</td>
            <td class="border border-slate-600 p-4">{{ $fix->assigner_login != null ? App\Models\User::where('login', $fix->assigner_login)->first()->getFullName() : ''}}</td>
            <td class="border border-slate-600 p-4">{{ config('fixstatementtypes.' . $fix->type) }}</td>
            <td class="border border-slate-600 p-4">{{ $fix->create_at }}</td>
            <td class="border border-slate-600 p-4">{{ config('fixstatementstates.' . $fix->state) }}</td>
            @if (in_array('admin', $current_roles) == true)<td class="border border-slate-600 p-4"><a type="button" class="p-2 border-b border-black hover:bg-black hover:text-white" href="{{ route('fix.edit', ['id' => $fix->id]) }}">Открыть</a></td>@endif
            @endforeach
        </tbody>
    </table>
</div>
@endsection('left_part')
