@extends('layouts.master')


@section('content')
    <div class="flex item-center justify-center mt-7">
        <form action="/users" method="POST">
            @csrf
            <div>
                <h2 class="font-thin text-xl flex align-center justify-center mb-5 text-slate-400">Register</h2>
            </div>
            <div>
                <input placeholder="name" type="text" name="name" value="{{ old('name') }}"
                    class="bg-slate-100 px-2 mt-2 p-1 rounded-md p-1 width-100 focus:outline-none" />
                @error('name')
                    <p>{{ $message }}</p>
                @enderror
            </div>
            <div>
                <input placeholder="email" type="text" name="email" value="{{ old('email') }}"
                    class="bg-slate-100 px-2 mt-2 p-1 rounded-md p-1 width-100 focus:outline-none" />
                @error('email')
                    <p>{{ $message }}</p>
                @enderror
            </div>
            <div>
                <input placeholder="password" type="password" name="password" value="{{ old('password') }}"
                    class="bg-slate-100 px-2 mt-2 p-1 rounded-md p-1 width-100 focus:outline-none" />
                @error('password')
                    <p>{{ $message }}</p>
                @enderror
            </div>
            <div>
                <input placeholder="password" type="password" name="password_confirmation"
                    value="{{ old('password_confirmation') }}"
                    class="bg-slate-100 px-2 mt-2 p-1 rounded-md p-1 width-100 focus:outline-none" />
                @error('password_confirmation')
                    <p>{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="text-slate-400 underline font-thin text-m">submit </button>
            <p>
                Have an acaount
                <a href="/login" class="text-slate-400 underline font-thin text-m">sign in</a>
            </p>
        </form>
    </div>
@endsection
