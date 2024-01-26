@extends('layouts.general')
@section('title', 'Профиль')

@section('left_part')
<div class="w-full h-full overflow-scroll scrollbar p-12">
    <h1 class="w-full text-center mb-6">Таблица выплат</h1>
    <table class="table-auto border border-collapse border-black border-spacing-10">
        <thead>
            <tr>
                <th class="border border-slate-600 p-4">Группа выплат</th>
                <th class="border border-slate-600 p-4">Тип выплаты</th>
                <th class="border border-slate-600 p-4">Критерий выплаты</th>
                <th class="border border-slate-600 p-4">Размер выплаты</th>
                <th class="border border-slate-600 p-4">Период выплаты</th>
                <th class="border border-slate-600 p-4">Подтверждающий документ</th>
                <th class="border border-slate-600 p-4">Проверяющий</th>
                <th class="border border-slate-600 p-4">Дата публикации</th>
                <th class="border border-slate-600 p-4">Последнее обновление</th>
                <th class="border border-slate-600 p-4">Статус</th>
                <th class="border border-slate-600 p-4">Редактировать</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($table as $row)
                <tr>
                    <td class="border border-slate-600 p-4">{{ $row['payment']->name }}</td>
                    <td class="border border-slate-600 p-4">{{ $row['payment']->type }}</td>
                    <td class="border border-slate-600 p-4">{{ $row['payment_detail']->name }}</td>
                    <td class="border border-slate-600 p-4">{{ $row['statement']->amount }} ({{ config('amounttype.' . $row['payment_detail']->amount_type) }})</td>
                    <td class="border border-slate-600 p-4">{{ config('period.' . $row['payment_detail']->period) }}</td>
                    <td class="border border-slate-600 p-4">
                        @foreach ($row['docs'] as $doc)
                            {{ $doc->name }}<br><a href="/storage/{{ $doc->owner_login }}/{{ $doc->name }}">Скачать файл</a>
                        @endforeach
                    </td>
                    <td class="border border-slate-600 p-4">{{ $row['checker']->first_name }} {{ $row['checker']->second_name }}</td>
                    <td class="border border-slate-600 p-4">{{ $row['statement']->publication_day }}</td>
                    <td class="border border-slate-600 p-4">{{ $row['statement']->update_day }}</td>
                    <td class="border border-slate-600 p-4">{{ config('statementstates.' . $row['statement']->state) }}</td>
                    <td class="border border-slate-600 p-4">
                        @if ($row['statement']->state != 'used')
                            <a type="button" class="p-2 border-b border-black hover:bg-black hover:text-white" href="{{ route('statements.edit', ['id' => $row['statement']->id]) }}">Редактировать</a>
                        @else
                            Уже учтен
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection('left_part')
