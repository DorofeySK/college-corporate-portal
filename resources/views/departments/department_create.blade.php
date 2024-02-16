@extends('layouts.general')
@section('title', 'Создание отдела')

@section('left_part')
<div id="app" class="w-full flex justify-center">
    <form action="{{ route('departments.store') }}" method="POST" class="w-full p-8 flex flex-col space-y-4 items-center">
        @csrf
        <input v-model="dept_name" type="text" name="name" placeholder="Введите название отдела" class="w-full p-2 border-b border-black">
        <select size="10" name="header" class="w-full p-2 border-b border-black">
            <option disabled>Выберите руководителя отдела (если его нет в списке, то используйте "-Нет-" и добавте его позже)</option>
            <option selected value="null">-Нет-</option>
            @foreach ($users as $user)
                <option value="{{ $user->login }}">{{ $user->second_name }} {{ $user->first_name }}</option>
            @endforeach
        </select>
        <input :disabled="is_valid" type="submit" value="Добавить новый отдел" class="p-2 border-b border-black hover:bg-black hover:text-white disabled:opacity-50">
    </form>
</div>

<script type="module">
    createApp({
        data() {
            return {
                dept_name: ''
            }
        },
        computed: {
            is_valid: function () {
                return this.dept_name.length == 0;
            }
        }
    }).mount('#app');
</script>
@endsection('left_part')
