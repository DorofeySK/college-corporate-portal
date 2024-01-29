@extends('layouts.general')
@section('title', 'Добавить запись для выплаты')

@section('left_part')
<form action="{{ route('statements.store') }}" method="POST" class="w-full p-8 flex flex-col space-y-4 items-center">
    @csrf
    <select onchange="setFullName();" size="5" id="payment_id" name="payment_id" class="w-full p-2 border-b border-black">
        <option disabled>Выберите тип выплаты</option>
        @foreach ($payments as $payment)
            <option value="{{ $payment->id }}">{{ $payment->name }} - {{ $payment->type }} ({{ App\Models\Job::where('id', $payment->job_id)->first()->name }})</option>
        @endforeach
    </select>
    <p class="border border-black" id="full_payment_name"></p>
    <select size="5" id="paymentdetail_id" name="paymentdetail_id" class="w-full p-2 border-b border-black">
        <option disabled>Выберите критерий оценивания (отображаются после выбора типа выплаты)</option>
        @foreach ($payments_details as $detail)
            <option onclick="getMaxAmount(this)" hidden data-amount="{{ $detail->amount }}" data-payment="{{ $detail->payment_id }}" value="{{ $detail->id }}">{{ $detail->name }}; период: {{ config('period.' . $detail->period) }}; тип учета: {{ $detail->amount }} {{ config('amounttype.' . $detail->amount_type) }}</option>
        @endforeach
    </select>
    <input type="number" id="amount_id" name="amount" placeholder="Баллы" max="" min="0" class="w-full p-2 border-b border-black">
    <select size="5" name="doc_ids[]" class="w-full p-2 border-b border-black">
        <option disabled>Выберите документы</option>
        @foreach ($docs as $doc)
            <option value="{{ $doc->id }}">{{ $doc->name }}</option>
        @endforeach
    </select>
    <textarea name="description" class="w-full border border-black" rows="5" placeholder="Краткое описание"></textarea>
    <select size="5" name="checker_login" class="w-full p-2 border-b border-black">
        <option disabled>Выберите проверяющего</option>
        @foreach ($current_headers as $user)
            <option value="{{ $user->login }}">{{ $user->first_name }} {{ $user->second_name }}</option>
        @endforeach
    </select>
    <input type="submit" value="Добавить запись о выплате" class="p-2 border-b border-black hover:bg-black hover:text-white">
</form>
<script>
        function setFullName() {
        let selected = document.getElementById('payment_id');
        document.getElementById('full_payment_name').innerText = "Полный текст выплаты: " + selected.options[selected.selectedIndex].text;
        document.getElementById('full_payment_name').classList.add('p-2');
        for (const op of document.getElementById('paymentdetail_id').options) {
            if (op.disabled == false) {
                if (op.dataset.payment == selected.value && op.hidden == true) {
                    op.removeAttribute('hidden');
                } else if (op.hidden == false) {
                    op.setAttribute('hidden', '');
                }
            }
        }
    }
    function getMaxAmount(obj) {
        document.getElementById('amount_id').setAttribute('max', obj.dataset.amount);
    }
</script>
@endsection('left_part')
