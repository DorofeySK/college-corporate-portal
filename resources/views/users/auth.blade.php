@extends('layouts.base_template')
@section('title', 'Авторизация')

@section('main')
    <main id="auth_form" class="w-full h-full flex justify-center items-center p-2">
        <form action="{{ route('login') }}" method="POST" class="w-1/2 h-4/6 shadow-2xl rounded-2xl flex flex-col justify-center items-center space-y-10 p-2">
            @csrf
            <h1 class="text-8xl">Авторизация</h1>
            <div class="w-11/12 h-11/12 flex flex-col text-3xl">
                <label>Логин</label>
                <input v-model="login" name="login" type="text" placeholder="Введите логин" class="w-full p-2 border-b border-black">
                <label>Пароль</label>
                <input v-model="password" name="password" type="password" placeholder="Введите пароль" class="w-full p-2 border-b border-black">
            </div>
            <button :disabled="is_valide" class="w-1/2 p-4 text-4xl shadow-2xl rounded-3xl hover:bg-blue-300 active:bg-blue-500 disabled:opacity-50">Авторизоваться</button>
        </form>
    </main>
    <script type="module">
        createApp({
            data() {
                return {
                    login: '',
                    password: '',
                }
            },
            computed: {
                is_valide: function() {
                    return this.login.length == 0 || this.password.length == 0;
                }
            }
        }).mount('#auth_form');
    </script>
@endsection('main')
