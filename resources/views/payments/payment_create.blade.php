@extends('layouts.general')
@section('title', 'Добавление типа выписки')

@section('left_part')
<div id="create_payment" class="w-full flex justify-center">
    <form action="{{ route('payments.store') }}" method="POST" class="w-full p-8 flex flex-col space-y-4 items-center">
        @csrf
        <input v-model="name" type="text" name="name" placeholder="Введите название группы" class="w-full p-2 border-b border-black">
        <input v-model="type" type="text" name="type" placeholder="Введите название типа выплаты" class="w-full p-2 border-b border-black">
        <select v-model="job" size="10" name="job_id" class="w-full p-2 border-b border-black">
            <option disabled>Выберите должность, для которой используется выплата</option>
            @foreach ($jobs as $job)
                <option value="{{ $job->id }}">{{ $job->name }}</option>
            @endforeach
        </select>
        <input :disabled="is_valide" type="submit" value="Добавить новый тип выплаты" class="disabled:opacity-50 p-2 border-b border-black hover:bg-black hover:text-white">
    </form>
</div>

<script type="module">
    createApp({
        data() {
            return {
                name: '',
                type: '',
                job: ''
            }
        },
        computed: {
            is_valide: function() {
                return this.name.length == 0 || 
                    this.type.length == 0 || 
                    this.job.length == 0;
            }
        }
    }).mount('#create_payment');
</script>
@endsection('left_part')
