@extends('layouts.general')
@section('title', 'Пользователи')

@section('left_part')
<div class="w-full h-full overflow-scroll scrollbar p-12">
    @if (in_array('admin', $current_roles) == true)
    <a type="button" class="p-2 border-b border-black hover:bg-black hover:text-white mb-6" href="{{ route('users.create') }}">Добавить пользователя</a>
    @endif
    <table class="table-auto border border-collapse border-black border-spacing-10">
        <thead>
            <th class="border border-slate-600 p-4">Фамилия</th>
            <th class="border border-slate-600 p-4">Имя</th>
            <th class="border border-slate-600 p-4">Отдел</th>
            <th class="border border-slate-600 p-4">Должность</th>
            @if(in_array('checker', $current_roles) == true)<th class="border border-slate-600 p-4">Выплаты</th>@endif
            @if(in_array('admin', $current_roles) == true)<th class="border border-slate-600 p-4">Редактировать профиль</th>@endif
        </thead>
        <tbody>
        @foreach($current_subordinates as $user)
            <tr>
                <td class="border border-slate-600 p-4">{{ $user->second_name }}</td>
                <td class="border border-slate-600 p-4">{{ $user->first_name }}</td>
                <td class="border border-slate-600 p-4">{{ $user->getInfo()['current_department']->name }}</td>
                <td class="border border-slate-600 p-4">
                    @foreach ($user->getInfo()['current_jobs'] as $job)
                        {{ $job->name }}/
                    @endforeach
                </td>
                @if(in_array('checker', $current_roles) == true)<td class="border border-slate-600 p-4"><a type="button" class="p-2 border-b border-black hover:bg-black hover:text-white" href="{{ route('statements.index', $user->login) }}">Перейти к выплатам</a></td>@endif
                @if(in_array('admin', $current_roles) == true)<td class="border border-slate-600 p-4"><a type="button" class="p-2 border-b border-black hover:bg-black hover:text-white" href="{{ route('users.edit', $user->login) }}">Редактировать</a></td>@endif
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection('left_part')
