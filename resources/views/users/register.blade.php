@extends('layouts.general')
@section('title', 'Регистрация нового пользователя')

@section('left_part')
<div id="app" class="w-full h-full overflow-scroll scrollbar">
    <form action="{{ route('register') }}" method="POST" class="w-full p-8 flex flex-col space-y-4 items-center">
        @csrf
        <input v-model="login" id="input_login" type="text" name="login" placeholder="Введите логин" class="w-full p-2 border-b border-black">
        <p v-if="login_is_exsist" class="text-red-800">Такой логин уже существует</p>
        <input v-model="password" type="password" name="password" placeholder="Введите пароль" class="w-full p-2 border-b border-black">
        <input v-model="first_name" type="text" name="first_name" placeholder="Введите имя" class="w-full p-2 border-b border-black">
        <input v-model="second_name" type="text" name="second_name" placeholder="Введите фамилию" class="w-full p-2 border-b border-black">
        <input v-model="patronymic" type="text" name="patronymic" placeholder="Введите отчество" class="w-full p-2 border-b border-black">
        <select size="10" name="department_id" class="w-full p-2 border-b border-black">
            <option disabled>Выберите отдел</option>
            <option value="null">-Нет-</option>
            @foreach ($departs as $depart)
                <option value="{{ $depart->id }}">{{ $depart->name }}</option>
            @endforeach
        </select>
        <select v-model="jobs" size="10" multiple name="job_id[]" class="w-full p-2 border-b border-black">
            <option disabled>Выберите должность/должности</option>
            @foreach ($jobs as $job)
                <option value="{{ $job->id }}">{{ $job->name }}</option>
            @endforeach
        </select>
        <select size="10" name="header" class="w-full p-2 border-b border-black">
            <option disabled>Выберите руководителя</option>
            <option value="null">-Нет-</option>
            @foreach ($users as $user)
                <option value="{{ $user->login }}">{{ $user->second_name }} {{ $user->first_name }}</option>
            @endforeach
        </select>
        <input :disabled="is_valide" type="submit" value="Создать нового пользователя" class="p-2 border-b border-black hover:bg-black hover:text-white disabled:opacity-50">
    </form>
</div>
<script type="module">
    createApp({
        data() {
            return {
                login: '',
                password: '',
                first_name: '',
                second_name: '',
                patronymic: '',
                jobs: '',
                logins: [
                    @foreach(App\Models\User::get() as $user)
                        "{{ $user->login }}",
                    @endforeach
                ],
            }
        },
        computed: {
            is_valide: function() {
                return this.login.length == 0 ||
                    this.password.length == 0 ||
                    this.first_name.length == 0 ||
                    this.second_name.length == 0 ||
                    this.patronymic.length == 0 ||
                    this.jobs == 0;
            },
            login_is_exsist: function() {
                return this.logins.includes(this.login);
            }
        }
    }).mount('#app');
</script>
@endsection('left_part')
