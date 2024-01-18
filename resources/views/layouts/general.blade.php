@extends('layouts.base_template')

@section('main')
<div class="w-full h-full flex md:flex-row flex-col bg-white">
    <div class="md:w-3/12 w-full shadow-2xl p-4 overflow-y-auto h-1/2 md:h-full">
        <div class="w-full bg-white mb-6 p-2 rounded-2xl shadow-2xl flex flex-col items-center">
            <div class="w-auto mb-6 h-auto">
                {{-- <img class="p-2 rounded-2xl shadow-2xl overflow-hidden h-80 object-contain" src="{{ asset('storage/temporary.jpg') }}"> --}}
            </div>
            <p class="w-full text-center text-3xl">{{ $current_user->second_name }} {{ $current_user->first_name }}</p>
            <p><b>Отдел:</b> {{ $current_department->name }}</p>
            <p><b>Должность:</b>
            @foreach ($current_jobs as $job)
                {{ $job->name }}/
            @endforeach
            </p>
        </div>
        <div class="w-full text-xl space-y-4">
            @if (in_array('admin', $current_roles) == true)
            <div class="w-full text-center border border-black overflow-hidden">
                <h1 class="border-b-4 border-black p-2 italic">Функции администратора</h1>
                <a type="button" class="w-full p-2 border-b border-black hover:bg-black hover:text-white" href="{{ route('users.index') }}">Пользователи</a>
                <a type="button" class="w-full p-2 border-b border-black hover:bg-black hover:text-white" href="{{ route('jobs.index') }}">Должности</a>
                <a type="button" class="w-full p-2 border-b border-black hover:bg-black hover:text-white" href="{{ route('departments.index') }}">Отделы</a>
            </div>
            @endif
            @if (in_array('statements_creater', $current_roles) == true)
            <div class="w-full text-center border border-black overflow-hidden">
                <h1 class="border-b-4 border-black p-2 italic">Работа с выписками</h1>
                <a type="button" class="w-full p-2 border-b border-black hover:bg-black hover:text-white" href="{{ route('payments.index') }}">Выписки</a>
                <a type="button" class="w-full p-2 border-b border-black hover:bg-black hover:text-white" href="{{ route('details.index') }}">Критерии выписок</a>
            </div>
            @endif
            <div class="w-full text-center border border-black overflow-hidden">
                <a type="button" class="w-full p-2 border-b border-black hover:bg-black hover:text-white" href="{{ route('statements.index', ['login' => $current_user->login]) }}">Таблица</a>
                <a type="button" class="w-full p-2 border-b border-black hover:bg-black hover:text-white" href="{{ route('statements.create') }}">Добавить запись для выплаты</a>
                <a type="button" class="w-full p-2 border-b border-black hover:bg-black hover:text-white" href="{{ route('documents.create') }}">Загрузить документ</a>
                @if (in_array('all_vision', $current_roles) == true || count($current_subordinates) > 0)
                    <a type="button" class="w-full p-2 border-b border-black hover:bg-black hover:text-white" href="{{ route('users.index') }}">Просматриваемые пользователи</a>
                @endif
                <a type="button" class="w-full p-2 border-b border-black hover:bg-black hover:text-white" href="{{ route('messages') }}">Сообщения</a>
                <a type="button" class="w-full p-2 border-b border-black hover:bg-black hover:text-white" href="{{ route('logout') }}">Выход</a>
            </div>
        </div>
    </div>
    <div class="md:w-9/12 w-full p-4 h-1/2 md:h-full">
        @yield('left_part')
    </div>
</div>
@endsection('main')
