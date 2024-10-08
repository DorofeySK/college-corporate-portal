@extends('layouts.general')
@section('title', 'Добавление критерия выплаты')

@section('left_part')
<div class="w-full flex justify-center">
    <form id="create_detail" action="{{ route('details.store') }}" method="POST" class="w-full p-8 flex flex-col space-y-4 items-center">
        @csrf
        <select v-model="payment_type" onchange="setFullName();" size="5" id="payment_id" name="payment_id" class="w-full p-2 border-b border-black">
            <option disabled>Выберите тип выплаты, для которой используется критерий оценивания</option>
            @foreach ($payments as $payment)
                <option value="{{ $payment->id }}">{{ $payment->name }} - {{ $payment->type }} ({{ App\Models\Job::where('id', $payment->job_id)->first()->name }})</option>
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
        <input v-model="payment_name" type="text" name="name" placeholder="Введите название критерия оценки" class="w-full p-2 border-b border-black">
        <select v-model="period" size="3" name="period" class="w-full p-2 border-b border-black">
            <option disabled>Выберите период для критерия оценивания</option>
            @foreach ($period_types as $period => $value)
                <option value="{{ $period }}">{{ $value }}</option>
            @endforeach
        </select>
        <select v-model="amount_type" size="3" name="amount_type" class="w-full p-2 border-b border-black">
            <option disabled>Выберите тип критерия</option>
            @foreach ($amount_types as $amount => $value)
                <option value="{{ $amount }}">{{ $value }}</option>
            @endforeach
        </select>
        <input v-model="max_number" type="number" name="amount" placeholder="Максимальный размер" class="w-full p-2 border-b border-black">
        <input :disabled="is_valide" type="submit" value="Добавить новый критерий выплаты" class="disabled:opacity-50 p-2 border-b border-black hover:bg-black hover:text-white">
    </form>
</div>

<script type="module">
    createApp({
        data() {
            return {
                payment_type: '',
                payment_name: '',
                amount_type: '',
                max_number: '',
                period: ''
            }
        },
        computed: {
            is_valide: function() {
                return this.payment_type.length == 0 || 
                    this.payment_name.length == 0 || 
                    this.amount_type.length == 0 || 
                    this.max_number.length == 0 || 
                    this.period.length == 0;
            }
        }
    }).mount('#create_detail');
</script>
@endsection('left_part')
