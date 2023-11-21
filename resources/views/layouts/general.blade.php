@extends('layouts.base_template')

@section('main')
<div class="w-full h-full flex md:flex-row flex-col bg-white">
    <div class="md:w-3/12 w-full md:rounded-r-3xl rounded-b-3xl bg-[#CADEFC] shadow-2xl p-4 overflow-y-auto">
        <div class="w-full bg-white mb-6 p-2 rounded-2xl shadow-2xl flex flex-col items-center">
            <div class="w-auto mb-6 h-auto">
                <img class="p-2 rounded-2xl shadow-2xl overflow-hidden h-80 object-contain" src="https://магпк.рф/upload/iblock/c5d/bz720su3e8ykyonl8b4wzr46r2ewv4tx.png">
            </div>
            <p class="w-full text-center text-3xl">{{ $current_user->second_name }} {{ $current_user->first_name }}</p>
            <p><b>Отдел:</b> {{ $department->name }}</p>
            <p><b>Должность:</b>
            @foreach ($jobs as $job)
                {{ $job->name }}/
            @endforeach
            </p>
        </div>
        <div class="w-full text-xl space-y-4">
            @if (in_array(config('roles.admin'), $roles) == true)
            <div class="w-full text-center shadow-2xl rounded-xl overflow-hidden bg-[#DEFCF9]">
                <h1 class="border-b-4 border-black p-2">Функции администратора</h1>
                <a type="button" class="w-full p-2 border-b-2 border-[#C3BEF0] hover:bg-[#C3BEF0] active:bg-[#bbb5f0]" href="{{ route('add_user') }}">Добавить пользователя</a>
                <a type="button" class="w-full p-2 border-b-2 border-[#C3BEF0] hover:bg-[#C3BEF0] active:bg-[#bbb5f0]" href="{{ route('add_job') }}">Добавить должность</a>
                <a type="button" class="w-full p-2 border-b-2 border-[#C3BEF0] hover:bg-[#C3BEF0] active:bg-[#bbb5f0]" href="{{ route('add_department') }}">Добавить отдел</a>
            </div>
            @endif
            <div class="w-full text-center shadow-2xl rounded-xl overflow-hidden bg-[#DEFCF9]">
                <a type="button" class="w-full p-2 border-b-2 border-[#C3BEF0] hover:bg-[#C3BEF0] active:bg-[#bbb5f0]" href="{{ route('home') }}">Таблица</a>
                <a type="button" class="w-full p-2 border-b-2 border-[#C3BEF0] hover:bg-[#C3BEF0] active:bg-[#bbb5f0]" href="{{ route('add_statement') }}">Добавить запись для выплаты</a>
                <a type="button" class="w-full p-2 border-b-2 border-[#C3BEF0] hover:bg-[#C3BEF0] active:bg-[#bbb5f0]" href="{{ route('add_doc') }}">Загрузить документ</a>
                <a type="button" class="w-full p-2 border-b-2 border-[#C3BEF0] hover:bg-[#C3BEF0] active:bg-[#bbb5f0]" href="{{ route('users') }}">Список пользователей</a>
                <a type="button" class="w-full p-2 border-b-2 border-[#C3BEF0] hover:bg-[#C3BEF0] active:bg-[#bbb5f0]" href="{{ route('messages') }}">Сообщения</a>
                <a type="button" class="w-full p-2 border-b-2 border-[#C3BEF0] hover:bg-[#C3BEF0] active:bg-[#bbb5f0]" href="{{ route('logout') }}">Выход</a>
            </div>
        </div>
    </div>
    <div class="md:w-9/12 w-full p-4">
        @yield('left_part')
    </div>
</div>
@endsection('main')
