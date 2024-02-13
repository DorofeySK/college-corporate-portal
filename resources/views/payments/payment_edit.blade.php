@extends('layouts.general')
@section('title', 'Редактирование выписки')

@section('left_part')
<div class="w-full flex justify-center">
    <form action="{{ route('payments.update', ['id' => $payment->id]) }}" method="POST" class="w-full p-8 flex flex-col space-y-4 items-center">
        @csrf
        <input type="text" name="name" value="{{$payment->name}}" placeholder="Введите название группы" class="w-full p-2 border-b border-black">
        <input type="text" name="type" value="{{$payment->type}}" placeholder="Введите название выплаты" class="w-full p-2 border-b border-black">
        <select size="10" name="job_id" class="w-full p-2 border-b border-black">
            <option disabled>Выберите должность, для которой используется выплата</option>
            @foreach ($jobs as $job)
                <option @if($payment->job_id == $job->id) selected @endif value="{{ $job->id }}">{{ $job->name }}</option>
            @endforeach
        </select>
        <input type="submit" value="Обновить параметры выплат" class="p-2 border-b border-black hover:bg-black hover:text-white">
    </form>
</div>
@endsection('left_part')
