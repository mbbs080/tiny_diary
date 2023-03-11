@extends('layouts.master')


@section('content')
    <div class="flex item-center justify-center mt-7">
        <form action="/users" method="POST" class="px-2">
            @csrf
            <div>
                <h2 class="font-thin text-xl flex align-center justify-center mb-5 text-slate-400">Register</h2>
            </div>
            <div class="flex flex-col">
                <input placeholder="name" class="bg-slate-100/20 px-2 mt-2 p-1 rounded-md p-1 focus:outline-none"
                    type="text" name="name" value="{{ old('name') }}"
                    class="bg-slate-100 px-2 mt-2 p-1 rounded-md p-1 width-100 focus:outline-none" />
                @error('name')
                    <p class="text-left text-xs">{{ $message }}</p>
                @enderror
            </div>
            <div class="flex flex-col">
                <input placeholder="email" class="bg-slate-100/20 px-2 mt-2 p-1 rounded-md p-1 focus:outline-none"
                    type="text" name="email" value="{{ old('email') }}"
                    class="bg-slate-100 px-2 mt-2 p-1 rounded-md p-1 width-100 focus:outline-none" />
                @error('email')
                    <p class="text-left text-xs">{{ $message }}</p>
                @enderror
            </div>
            <div class="flex flex-col">
                <input placeholder="password" class="bg-slate-100/20 px-2 mt-2 p-1 rounded-md p-1 focus:outline-none"
                    type="password" name="password" value="{{ old('password') }}"
                    class="bg-slate-100 px-2 mt-2 p-1 rounded-md p-1 width-100 focus:outline-none" />
                @error('password')
                    <p class="text-left text-xs">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <input placeholder="password" class="bg-slate-100/20 px-2 mt-2 p-1 rounded-md p-1 focus:outline-none"
                    type="password" name="password_confirmation" value="{{ old('password_confirmation') }}"
                    class="bg-slate-100 px-2 mt-2 p-1 rounded-md p-1 width-100 focus:outline-none" />
                @error('password_confirmation')
                    <p class="text-left text-xs">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="text-slate-400 underline font-thin text-m mt-3">submit </button>
            <p>
                Have an account
                <a href="/login" class="text-slate-400 underline font-thin text-m">sign in</a>
            </p>
        </form>
    </div>
@endsection
