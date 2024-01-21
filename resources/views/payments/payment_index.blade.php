@extends('layouts.general')
@section('title', 'Выплаты')

@section('left_part')

<div class="w-full h-full overflow-scroll scrollbar p-12">
    <a type="button" class="p-2 border-b border-black hover:bg-black hover:text-white mb-6" href="{{ route('payments.create') }}">Добавить выплату</a>
    <table class="table-auto border border-collapse border-black border-spacing-10">
        <thead>
            <tr>
                <th class="border border-slate-600 p-4">Группа</th>
                <th class="border border-slate-600 p-4">Выплата</th>
                <th class="border border-slate-600 p-4">Должность</th>
                <th class="border border-slate-600 p-4">Редактирование</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($payments as $payment)
                <tr>
                    <td class="border border-slate-600 p-4">{{ $payment->name }}</td>
                    <td class="border border-slate-600 p-4">{{ $payment->type }}</td>
                    <td class="border border-slate-600 p-4">{{ App\Models\Job::where('id', $payment->job_id)->first()->name }}</td>
                    <td class="border border-slate-600 p-4"><a type="button" class="p-2 border-b border-black hover:bg-black hover:text-white" href="{{ route('payments.edit', ['id' => $payment->id]) }}">Редактировать</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection('left_part')
