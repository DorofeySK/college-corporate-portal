@extends('layouts.general')
@section('title', 'Добавление критерия выплаты')

@section('left_part')
<div class="w-full flex justify-center">
    <form action="{{ route('add_detail_post') }}" method="POST" class="w-full p-8 flex flex-col space-y-4 items-center">
        @csrf
        <select onchange="setFullName();" size="5" id="payment_id" name="payment_id" class="w-full p-2 border-b border-black">
            <option disabled>Выберите тип выплаты, для которой используется критерий оценивания</option>
            @foreach ($payments as $payment)
                <option value="{{ $payment->id }}">{{ $payment->name }} - {{ $payment->type }}</option>
            @endforeach
        </select>
        <p class="border border-black" id="full_payment_name"></p>
        <script>
            function setFullName() {
                let selected = document.getElementById('payment_id');
                document.getElementById('full_payment_name').innerText = "Полный текст: " + selected.options[selected.selectedIndex].text;
                document.getElementById('full_payment_name').classList.add('p-2');
            }
        </script>
        <input type="text" name="name" placeholder="Введите название критерия оценки" class="w-full p-2 border-b border-black">
        <select size="3" name="period" class="w-full p-2 border-b border-black">
            <option disabled>Выберите период для критерия оценивания</option>
            @foreach ($period_types as $period => $value)
                <option value="{{ $period }}">{{ $value }}</option>
            @endforeach
        </select>
        <select size="3" name="amount_type" class="w-full p-2 border-b border-black">
            <option disabled>Выберите тип критерия</option>
            @foreach ($amount_types as $amount => $value)
                <option value="{{ $amount }}">{{ $value }}</option>
            @endforeach
        </select>
        <input type="number" name="amount" placeholder="Размер выплаты" class="w-full p-2 border-b border-black">
        <input type="submit" value="Добавить новый тип выплаты" class="p-2 border-b border-black hover:bg-black hover:text-white">
    </form>
</div>
@endsection('left_part')
