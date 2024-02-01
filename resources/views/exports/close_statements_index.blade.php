@extends('layouts.general')
@section('title', 'Экспорт в Excel')

@section('left_part')
<div id="close_statement_table" class="w-full h-full overflow-scroll scrollbar p-12">
    <h1 class="w-full text-center mb-6">Экспортируемая таблица</h1>
    <form method="GET" action="{{ route('close.store', ['login' => $owner]) }}" class="w-full flex justify-center mb-6">
        <input type="submit" class="p-2 border-b border-black hover:bg-black hover:text-white" value="Экспортировать">
    </form>
    <table class="table-auto border border-collapse border-black border-spacing-10">
        <thead>
            <tr>
                <th class="border border-slate-600 p-4">Выплата</th>
                <th class="border border-slate-600 p-4">Критерий оценки</th>
                <th class="border border-slate-600 p-4">Размер выплаты</th>
                <th class="border border-slate-600 p-4">Самооценка</th>
                <th class="border border-slate-600 p-4">Оценка администрации</th>
                <th class="border border-slate-600 p-4">Итоговая оценка</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($statements as $statement)
            <tr>
                <td class="border border-slate-600 p-4">{{ App\Models\Payment::where('id', $statement->payment_id)->first()->name }}</td>
                <td class="border border-slate-600 p-4">{{ App\Models\PaymentDetail::where('id', $statement->paymentdetail_id)->first()->name }}</td>
                <td class="border border-slate-600 p-4">{{ App\Models\PaymentDetail::where('id', $statement->paymentdetail_id)->first()->amount }}</td>
                <td class="border border-slate-600 p-4">{{ $statement->amount }}</td>
                <td class="border border-slate-600 p-4">{{ $statement->main_amount }}</td>
                <td class="border border-slate-600 p-4">{{ $statement->main_amount }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection('left_part')
