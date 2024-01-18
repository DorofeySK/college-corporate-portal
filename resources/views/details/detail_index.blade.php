@extends('layouts.general')
@section('title', 'Критерии')

@section('left_part')

<div class="w-full overflow-auto scrollbar p-2 flex-col justify-center">
    <a type="button" class="p-2 border-b border-black hover:bg-black hover:text-white mb-6" href="{{ route('details.create') }}">Добавить критерий</a>
    <table class="table-auto border border-collapse border-black border-spacing-10">
        <thead>
            <tr>
                <th class="border border-slate-600 p-4">Выплата</th>
                <th class="border border-slate-600 p-4">Должность</th>
                <th class="border border-slate-600 p-4">Критерий</th>
                <th class="border border-slate-600 p-4">Период</th>
                <th class="border border-slate-600 p-4">Тип критерия</th>
                <th class="border border-slate-600 p-4">Размер</th>
                <th class="border border-slate-600 p-4">Редактирование</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($details as $detail)
                <tr>
                    <td class="border border-slate-600 p-4">{{ App\Models\Payment::where('id', $detail->payment_id)->first()->name }} - {{ App\Models\Payment::where('id', $detail->payment_id)->first()->type }}</td>
                    <td class="border border-slate-600 p-4">{{ App\Models\Job::where('id', App\Models\Payment::where('id', $detail->payment_id)->first()->job_id)->first()->name }}</td>
                    <td class="border border-slate-600 p-4">{{ $detail->name }}</td>
                    <td class="border border-slate-600 p-4">{{ config('period.' . $detail->period) }}</td>
                    <td class="border border-slate-600 p-4">{{ config('amounttype.' . $detail->amount_type) }}</td>
                    <td class="border border-slate-600 p-4">{{ $detail->amount }}</td>
                    <td class="border border-slate-600 p-4"><a type="button" class="p-2 border-b border-black hover:bg-black hover:text-white" href="{{ route('details.edit', ['id' => $detail->id]) }}">Редактировать</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection('left_part')
