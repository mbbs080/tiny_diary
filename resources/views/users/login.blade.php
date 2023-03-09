@extends('layouts.master')


@section('content')
    <div class="flex item-center justify-center mt-7">
        <form action="/users/authenticate" method="POST">
            @csrf
            <div>
                <h2 class="font-thin text-xl flex align-center justify-center mb-5 text-slate-400">Login</h2>
            </div>
            <div>
                <input placeholder="email" class="bg-slate-100 px-2 mt-2 p-1 rounded-md p-1 width-100 focus:outline-none"
                    type="text" name="email" value="{{ old('email') }}" />
                @error('email')
                    <p>{{ $message }}</p>
                @enderror
            </div>
            <div>
                <input placeholder="password" class="bg-slate-100 px-2 mt-2 p-1 rounded-md p-1 width-100 focus:outline-none"
                    type="password" name="password" value="{{ old('password') }}" />
                @error('password')
                    <p>{{ $message }}</p>
                @enderror
            </div>
            <div>
                <input placeholder="password" class="bg-slate-100 px-2 mt-2 p-1 rounded-md p-1 width-100 focus:outline-none"
                    type="password" name="password_confirmation" value="{{ old('password_confirmation') }}" />
                @error('password_confirmation')
                    <p>{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="text-slate-400 underline font-thin text-m">submit </button>
            <div>
                <p>
                    Register instead
                    <a href="/register" class="text-slate-400 underline font-thin text-m">sign up</a>
                </p>
            </div>

        </form>
    </div>
@endsection
