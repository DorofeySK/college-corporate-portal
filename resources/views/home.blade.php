@extends('layouts.general')
@section('title', 'Профиль')

@section('left_part')
<h1 class="w-full text-center">Таблица выплат</h1>
<div class="w-full flex justify-center overflow-auto scrollbar p-2">
    <table class="table-auto border-separate border-spacing-10">
        <tr>
            <th>Наименование выплаты</th>
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
    </table>
</div>
@endsection('left_part')
