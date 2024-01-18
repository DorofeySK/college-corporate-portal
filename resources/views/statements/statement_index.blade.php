@extends('layouts.general')
@section('title', 'Профиль')

@section('left_part')
<h1 class="w-full text-center">Таблица выплат</h1>
<div class="w-full overflow-auto scrollbar p-2">
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
            </tr>
        </thead>
        <tbody>
            @foreach ($table as $row)
                <tr>
                    <td class="border border-slate-600 p-4">{{ $row['payment']->name }}</td>
                    <td class="border border-slate-600 p-4">{{ $row['payment']->type }}</td>
                    <td class="border border-slate-600 p-4">{{ $row['payment_detail']->name }}</td>
                    <td class="border border-slate-600 p-4">{{ $row['payment_detail']->amount }} ({{ config('amounttype.' . $row['payment_detail']->amount_type) }})</td>
                    <td class="border border-slate-600 p-4">{{ config('period.' . $row['payment_detail']->period) }}</td>
                    <td class="border border-slate-600 p-4">
                        @foreach ($row['docs'] as $doc)
                            {{ $doc->name }}<br>
                        @endforeach
                    </td>
                    <td class="border border-slate-600 p-4">{{ $row['checker']->first_name }} {{ $row['checker']->second_name }}</td>
                    <td class="border border-slate-600 p-4">{{ $row['statement']->publication_day }}</td>
                    <td class="border border-slate-600 p-4">{{ $row['statement']->update_day }}</td>
                    <td class="border border-slate-600 p-4">
                        <select name="state">
                            @foreach(config('statementstates') as $state => $name)
                                @if(in_array('main_checker', $current_user->getRoles()) || $state != 'used') <option @if($row['statement']->state == $state) selected @endif value="{{ $state }}">{{ $name }}</option> @endif
                            @endforeach
                        </select>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection('left_part')
