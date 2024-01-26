@extends('layouts.general')
@section('title', 'Обновить запись')

@section('left_part')
@if ($is_owner)
<form action="{{ route('statements.update', ['id' => $statement->id]) }}" method="POST" class="w-full p-8 flex flex-col space-y-4 items-center">
    @csrf
    <select onchange="setFullName();" size="5" id="payment_id" name="payment_id" class="w-full p-2 border-b border-black">
        <option disabled>Выберите тип выплаты</option>
        @foreach ($payments as $payment)
            <option @if($statement->payment_id == $payment->id) selected @endif value="{{ $payment->id }}">{{ $payment->name }} - {{ $payment->type }} ({{ App\Models\Job::where('id', $payment->job_id)->first()->name }})</option>
        @endforeach
    </select>
    <p class="border border-black" id="full_payment_name"></p>
    <select size="5" id="paymentdetail_id" name="paymentdetail_id" class="w-full p-2 border-b border-black">
        <option disabled>Выберите критерий оценивания (отображаются после выбора типа выплаты)</option>
        @foreach ($payments_details as $detail)
            <option onclick="getMaxAmount(this)" @if($statement->paymentdetail_id == $detail->id) selected @endif hidden data-amount="{{ $detail->amount }}" data-payment="{{ $detail->payment_id }}" value="{{ $detail->id }}">{{ $detail->name }}; период: {{ config('period.' . $detail->period) }}; тип учета: {{ $detail->amount }} {{ config('amounttype.' . $detail->amount_type) }}</option>
        @endforeach
    </select>
    <input type="number" id="amount_id" name="amount" placeholder="Баллы" max="" min="0" class="w-full p-2 border-b border-black">
    <select size="5" name="doc_ids[]" class="w-full p-2 border-b border-black">
        <option disabled>Выберите документы</option>
        @foreach ($docs as $doc)
            <option @if(in_array($doc->id, json_decode($statement->doc_ids, true)['docs'])) selected @endif value="{{ $doc->id }}">{{ $doc->name }}</option>
        @endforeach
    </select>
    <select size="5" name="checker_login" class="w-full p-2 border-b border-black">
        <option disabled>Выберите проверяющего</option>
        @foreach ($current_headers as $user)
            <option @if($statement->checker_login == $user->login) selected @endif value="{{ $user->login }}">{{ $user->first_name }} {{ $user->second_name }}</option>
        @endforeach
    </select>
    <input type="submit" value="Обновить запись о выплате" class="p-2 border-b border-black hover:bg-black hover:text-white">
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
@else
<form action="{{ route('statements.update', ['id' => $statement->id]) }}" method="POST" class="w-full p-8 grid grid-cols-3 gap-4 items-center">
    @csrf
    <p class="col-span-1 p-2 bg-slate-200 rounded-md">Группа выплат</p>
    <p class="col-span-2 p-2 bg-slate-200 rounded-md">{{ $payments->where('id', $statement->payment_id)->first()->name }}</p>
    <p class="col-span-1 p-2 bg-slate-200 rounded-md">Тип выплаты</p>
    <p class="col-span-2 p-2 bg-slate-200 rounded-md">{{ $payments->where('id', $statement->payment_id)->first()->type }}</p>
    <p class="col-span-1 p-2 bg-slate-200 rounded-md">Критерий выплаты</p>
    <p class="col-span-2 p-2 bg-slate-200 rounded-md">{{ $payments_details->where('id', $statement->paymentdetail_id)->first()->name }}</p>
    <p class="col-span-1 p-2 bg-slate-200 rounded-md">Размер выплаты</p>
    <p class="col-span-2 p-2 bg-slate-200 rounded-md">{{ $statement->amount }} ({{ config('amounttype.' . $payments_details->where('id', $statement->paymentdetail_id)->first()->amount_type ) }})</p>
    <p class="col-span-1 p-2 bg-slate-200 rounded-md">Период выплаты</p>
    <p class="col-span-2 p-2 bg-slate-200 rounded-md">{{ config('period.' . $payments_details->where('id', $statement->paymentdetail_id)->first()->period ) }}</p>
    <p class="col-span-1 p-2 bg-slate-200 rounded-md">Подтверждающий документ</p>
    <div class="col-span-2 p-2 bg-slate-200 rounded-md">
        @foreach(App\Models\Document::getDocsFromIds(json_decode($statement->doc_ids, true)['docs']) as $doc)
            <p>{{ $doc->name }} (<a href="/storage/{{ $doc->owner_login }}/{{ $doc->name }}">Скачать файл</a>)</p>
        @endforeach
    </div>
    <p class="col-span-1 p-2 bg-slate-200 rounded-md">Проверяющий</p>
    <p class="col-span-2 p-2 bg-slate-200 rounded-md">{{ App\Models\User::where('login', $statement->checker_login)->first()->second_name }} {{ App\Models\User::where('login', $statement->checker_login)->first()->first_name }}</p>
    <p class="col-span-1 p-2 bg-slate-200 rounded-md">Дата публикации</p>
    <p class="col-span-2 p-2 bg-slate-200 rounded-md">{{ $statement->publication_day }}</p>
    <p class="col-span-1 p-2 bg-slate-200 rounded-md">Последнее обновление</p>
    <p class="col-span-2 p-2 bg-slate-200 rounded-md">{{ $statement->update_day }}</p>
    <p class="col-span-1 p-2 bg-slate-200 rounded-md">Состояние</p>
    <select name="state" class="col-span-2 p-2 bg-slate-200 rounded-md">
        @foreach(config('statementstates') as $state => $name)
            @if(in_array('main_checker', $current_user->getRoles()) || $state != 'used') <option @if($statement->state == $state) selected @endif value="{{ $state }}">{{ $name }}</option> @endif
        @endforeach
    </select>
    @if ($statement->state != 'used')<input type="submit" value="Обновить запись о выплате" class="p-2 col-span-3 border-b border-black hover:bg-black hover:text-white">@endif
</form>

@endif
@endsection('left_part')
