@extends('layouts.base_template')
@section('title', 'Авторизация')

@section('main')
    <main class="w-full h-full flex justify-center items-center p-2">
        <form action="{{ route('login') }}" method="POST" class="w-1/2 h-4/6 shadow-2xl rounded-2xl flex flex-col justify-center items-center space-y-10 p-2">
            @csrf
            <h1 class="text-8xl">Авторизация</h1>
            <div class="w-11/12 h-11/12 flex flex-col text-3xl">
                <label>Логин</label>
                <input id="login" name="login" type="text" placeholder="Введите логин" class="w-full p-2 border-b border-black">
                <label>Пароль</label>
                <input id="password" name="password" type="password" placeholder="Введите пароль" class="w-full p-2 border-b border-black">
            </div>
            <button class="w-1/2 p-4 text-4xl shadow-2xl rounded-3xl hover:bg-blue-300 active:bg-blue-500">Авторизоваться</button>
        </form>
    </main>
@endsection('main')
