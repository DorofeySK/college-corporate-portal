@extends('layouts.general')
@section('title', 'Просмотр отделов')

@section('left_part')

<div class="w-full overflow-auto scrollbar p-2 flex-col justify-center">
    <a type="button" class="p-2 border-b border-black hover:bg-black hover:text-white mb-6" href="{{ route('departments.create') }}">Добавить отдел</a>
    <table class="table-auto border border-collapse border-black border-spacing-10">
        <thead>
            <tr>
                <th class="border border-slate-600 p-4">Название отдела</th>
                <th class="border border-slate-600 p-4">Глава отдела</th>
                <th class="border border-slate-600 p-4">Редактирование</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($departments as $depart)
                <tr>
                    <td class="border border-slate-600 p-4">{{ $depart->name }}</td>
                    @if ($depart->header != null)
                    <td class="border border-slate-600 p-4">{{ App\Models\User::where('login', $depart->header)->first()->second_name }} {{ App\Models\User::where('login', $depart->header)->first()->first_name }}</td>
                    @else
                    <td class="border border-slate-600 p-4">Не заполнено</td>
                    @endif
                    <td class="border border-slate-600 p-4"><a type="button" class="p-2 border-b border-black hover:bg-black hover:text-white" href="{{ route('departments.edit', ['id' => $depart->id]) }}">Редактировать</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection('left_part')
