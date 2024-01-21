@extends('layouts.general')
@section('title', 'Написать сообщение')

@section('left_part')
<div class="w-full flex justify-center">
    <form action="{{ route('messages.store') }}" method="POST" class="w-full p-8 flex flex-col space-y-4 items-center">
        @csrf
        <select size="5" name="login_to" class="w-full p-2 border-b border-black">
            <option disabled>Выберите получателя</option>
            @foreach ($users as $user)
                <option value="{{ $user->login }}">{{ $user->second_name }} {{ $user->first_name }}</option>
            @endforeach
        </select>
        <textarea name="msg_text" rows="5" placeholder="Сообщение" class="w-full p-2 border border-black"></textarea>
        <input type="submit" value="Отправить сообщение" class="p-2 border-b border-black hover:bg-black hover:text-white">
    </form>
</div>
@endsection('left_part')
