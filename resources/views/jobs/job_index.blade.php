@extends('layouts.general')
@section('title', 'Просмотр должностей')

@section('left_part')
<div class="w-full h-full overflow-scroll scrollbar p-12">
    <a type="button" class="p-2 border-b border-black hover:bg-black hover:text-white mb-6" href="{{ route('jobs.create') }}">Добавить должность</a>
    <table class="table-auto border border-collapse border-black border-spacing-10">
        <thead>
            <tr>
                <th class="border border-slate-600 p-4">Название должности</th>
                <th class="border border-slate-600 p-4">Роли</th>
                <th class="border border-slate-600 p-4">Редактирование</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($jobs as $job)
                <tr>
                    <td class="border border-slate-600 p-4">{{ $job->name }}</td>
                    <td class="border border-slate-600 p-4">
                        @foreach($job->getRoles() as $role)
                            {{ config('roles.' . $role) }}/
                        @endforeach
                    </td>
                    <td class="border border-slate-600 p-4"><a type="button" class="p-2 border-b border-black hover:bg-black hover:text-white" href="{{ route('jobs.edit', ['id' => $job->id]) }}">Редактировать</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection('left_part')
