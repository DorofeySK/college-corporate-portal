@extends('layouts.general')
@section('title', 'Добавление типа выписки')

@section('left_part')
<div class="w-full flex justify-center">
    <form action="{{ route('add_payment_post') }}" method="POST" class="w-full p-8 flex flex-col space-y-4 items-center">
        @csrf
        <input type="text" name="name" placeholder="Введите название группы" class="w-full p-2 border-b border-black">
        <input type="text" name="type" placeholder="Введите название типа выплаты" class="w-full p-2 border-b border-black">
        <select size="3" name="job_id" class="w-full p-2 border-b border-black">
            <option disabled>Выберите должность, для которой используется выплата</option>
            @foreach ($jobs as $job)
                <option value="{{ $job->id }}">{{ $job->name }}</option>
            @endforeach
        </select>
        <input type="submit" value="Добавить новый тип выплаты" class="p-2 border-b border-black hover:bg-black hover:text-white">
    </form>
</div>
@endsection('left_part')
