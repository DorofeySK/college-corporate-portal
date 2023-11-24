@extends('layouts.general')
@section('title', 'Создание должности')

@section('left_part')
<div class="w-full flex justify-center overflow-auto scrollbar p-2">
    <table class="table-auto border-separate border-spacing-10">
        <thead>
            <th>Фамилия</th>
            <th>Имя</th>
            <th>Отдел</th>
            <th>Должность</th>
            <th>Профиль</th>
        </thead>
        <tbody>
        @foreach($current_subordinates as $user)
            <tr>
                <td>{{ $user->second_name }}</td>
                <td>{{ $user->first_name }}</td>
                <td>{{ $user->getInfo()['current_department']->name }}</td>
                <td>
                    @foreach ($user->getInfo()['current_jobs'] as $job)
                        {{ $job->name }}/
                    @endforeach
                </td>
                <td><a type="button" class="border-black border-b-2" href="{{ route('check_user', $user->login) }}">Перейти к профилю</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection('left_part')
