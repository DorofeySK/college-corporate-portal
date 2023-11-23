@extends('layouts.general')
@section('title', 'Регистрация нового пользователя')

@section('left_part')
<div class="w-full flex justify-center">
    <form action="{{ route('register') }}" method="POST" class="w-full p-8 flex flex-col space-y-4 items-center">
        @csrf
        <input type="text" name="login" placeholder="Введите логин" class="w-full p-2 border-b border-black">
        <input type="password" name="password" placeholder="Введите пароль" class="w-full p-2 border-b border-black">
        <input type="text" name="first_name" placeholder="Введите имя" class="w-full p-2 border-b border-black">
        <input type="text" name="second_name" placeholder="Введите фамилию" class="w-full p-2 border-b border-black">
        <select size="3" name="department_id" class="w-full p-2 border-b border-black">
            <option disabled>Выберите отдел</option>
            @foreach ($departs as $depart)
                <option value="{{ $depart->id }}">{{ $depart->name }}</option>
            @endforeach
        </select>
        <select size="5" multiple name="job_id[]" class="w-full p-2 border-b border-black">
            <option disabled>Выберите должность/должности</option>
            @foreach ($jobs as $job)
                <option value="{{ $job->id }}">{{ $job->name }}</option>
            @endforeach
        </select>
        <select size="3" name="header" class="w-full p-2 border-b border-black">
            <option disabled>Выберите руководителя</option>
            <option value="null">-Нет-</option>
            @foreach ($users as $user)
                <option value="{{ $user->login }}">{{ $user->second_name }} {{ $user->first_name }}</option>
            @endforeach
        </select>
        <input type="submit" value="Создать нового пользователя" class="p-2 border-b border-black hover:bg-black hover:text-white">
    </form>
</div>
@endsection('left_part')
