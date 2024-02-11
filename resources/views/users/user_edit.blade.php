@extends('layouts.general')
@section('title', 'Корректировка пользователя')

@section('left_part')
<div class="w-full flex justify-center">
    <form action="{{ route('users.update', ['login' => $user->login]) }}" method="POST" class="w-full p-8 flex flex-col space-y-4 items-center">
        @csrf
        <input type="password" name="password" placeholder="Введите пароль" class="w-full p-2 border-b border-black">
        <input type="text" value="{{ $user->first_name }}" name="first_name" placeholder="Введите имя" class="w-full p-2 border-b border-black">
        <input type="text" value="{{ $user->second_name }}" name="second_name" placeholder="Введите фамилию" class="w-full p-2 border-b border-black">
        <input type="text" value="{{ $user->patronymic }}" name="patronymic" placeholder="Введите отчество" class="w-full p-2 border-b border-black">
        <select size="10" name="department_id" class="w-full p-2 border-b border-black">
            <option disabled>Выберите отдел</option>
            @foreach ($departs as $depart)
                <option @if($user->department_id == $depart->id) selected @endif value="{{ $depart->id }}">{{ $depart->name }}</option>
            @endforeach
        </select>
        <select size="10" multiple name="job_id[]" class="w-full p-2 border-b border-black">
            <option disabled>Выберите должность/должности</option>
            @foreach ($jobs as $job)
                <option @if(in_array($job, $user->getJobs())) selected @endif value="{{ $job->id }}">{{ $job->name }}</option>
            @endforeach
        </select>
        <select size="10" name="header" class="w-full p-2 border-b border-black">
            <option disabled>Выберите руководителя</option>
            <option value="null">-Нет-</option>
            @foreach ($users as $us)
                @if($user->login != $us->login)<option @if($user->header == $us->login) selected @endif value="{{ $us->login }}">{{ $us->second_name }} {{ $us->first_name }}</option>@endif
            @endforeach
        </select>
        <input type="submit" value="Обновить пользователя" class="p-2 border-b border-black hover:bg-black hover:text-white">
    </form>
</div>
@endsection('left_part')
