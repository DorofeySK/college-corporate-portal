@extends('layouts.general')
@section('title', 'Профиль')

@section('left_part')
<h1 class="w-full text-center">Таблица выплат</h1>
<div class="w-full overflow-auto scrollbar p-2">
    <table class="table-auto border border-separate border-black border-spacing-10">
        <thead>
            <tr>
                <th>Группа выплат</th>
                <th>Тип выплаты</th>
                <th>Критерий выплаты</th>
                <th>Размер выплаты</th>
                <th>Период выплаты</th>
                <th>Подтверждающий документ</th>
                <th>Проверяющий</th>
                <th>Дата публикации</th>
                <th>Последнее обновление</th>
                <th>Статус</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($table as $row)
                <tr>
                    <th>{{ $row['payment']->name }}</th>
                    <th>{{ $row['payment']->type }}</th>
                    <th>{{ $row['payment_detail']->name }}</th>
                    <th>{{ $row['payment_detail']->amount }} ({{ config('amounttype.' . $row['payment_detail']->amount_type) }})</th>
                    <th>{{ config('period.' . $row['payment_detail']->period) }}</th>
                    <th>
                        @foreach ($row['docs'] as $doc)
                            {{ $doc->name }}<br>
                        @endforeach
                    </th>
                    <th>{{ $row['checker']->first_name }} {{ $row['checker']->second_name }}</th>
                    <th>{{ $row['statement']->publication_day }}</th>
                    <th>{{ $row['statement']->update_day }}</th>
                    <th>{{ config('statementstates.' . $row['statement']->state) }}</th>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection('left_part')
