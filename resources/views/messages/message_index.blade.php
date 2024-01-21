@extends('layouts.general')
@section('title', 'Просмотр сообщений')

@section('left_part')
<div class="w-full h-full overflow-scroll scrollbar p-12">
    <div class="w-full flex flex-col space-y-4 justify-center">
        <div class="flex space-x-4 justify-center">
            <a type="button" class="p-2 border-b border-black hover:bg-black hover:text-white" href="{{ route('messages.index', ['type' => 'out']) }}">Исходящие</a>
            <a type="button" class="p-2 border-b border-black hover:bg-black hover:text-white" href="{{ route('messages.index', ['type' => 'in']) }}">Входящие</a>
            <a type="button" class="p-2 border-b border-black hover:bg-black hover:text-white" href="{{ route('messages.create') }}">Написать сообщение</a>
        </div>
        @foreach($messages as $message)
        <div class="w-full p-8 grid grid-cols-3 gap-4 items-center bg-slate-400 rounded-lg">
            <p class="col-span-1 p-2 bg-slate-200 rounded-md">От кого</p>
            <p class="col-span-2 p-2 bg-slate-200 rounded-md">{{ $users->where('login', $message->login_from)->first()->second_name }} {{ $users->where('login', $message->login_from)->first()->first_name }}</p>
            <p class="col-span-1 p-2 bg-slate-200 rounded-md">Кому</p>
            <p class="col-span-2 p-2 bg-slate-200 rounded-md">{{ $users->where('login', $message->login_to)->first()->second_name }} {{ $users->where('login', $message->login_to)->first()->first_name }}</p>
            <p class="col-span-1 p-2 bg-slate-200 rounded-md">Когда</p>
            <p class="col-span-2 p-2 bg-slate-200 rounded-md">{{ $message->sendtime }}</p>
            <p class="col-span-1 p-2 bg-slate-200 rounded-md">Текст сообщения</p>
            <p class="col-span-2 p-2 bg-slate-200 rounded-md">{{ $message->message_text }}</p>
        </div>
        @endforeach
    </div>
</div>
@endsection('left_part')
