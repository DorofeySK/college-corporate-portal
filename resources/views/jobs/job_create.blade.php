@extends('layouts.general')
@section('title', 'Создание должности')

@section('left_part')
<div id="app" class="w-full flex justify-center">
    <form action="{{ route('jobs.store') }}" method="POST" class="w-full p-8 flex flex-col space-y-4 items-center">
        @csrf
        <input v-model="job_name" type="text" name="name" placeholder="Введите название должности" class="w-full p-2 border-b border-black">
        {{-- <input type="number" name="rang" placeholder="Введите ранг должности" class="w-full p-2 border-b border-black"> --}}
        <select multiple size="8" name="roles[]" class="w-full p-2 border-b border-black">
            <option disabled>Выберите роли (модификаторы)</option>
            <option selected value="null">-Нет-</option>
            @foreach ($roles as $key => $value)
                <option value={{ $key }}>{{ $value }}</option>
            @endforeach
        </select>
        <input type="submit" :disabled="is_valid" value="Добавить новую должность" class="p-2 border-b border-black hover:bg-black hover:text-white disabled:opacity-50">
    </form>
</div>

<script type="module">
    createApp({
        data() {
            return {
                job_name: ''
            }
        },
        computed: {
            is_valid: function () {
                return this.job_name.length == 0;
            }
        }
    }).mount('#app');
</script>
@endsection('left_part')
