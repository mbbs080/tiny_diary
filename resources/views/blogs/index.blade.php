@extends('layouts.master')

@section('content')
    <div class="bg-white-200 justify-center align-center flex-column pt-10">
        @auth
            <p class="flex justify-center align-center text-xl font-thin">
                Welcome @<b>{{ auth()->user()->name }}</b></p>
            <div class="flex justify-center align-center gap-4 mt-5 text-cyan-500">
                <h4><a href="/blogs/create" class="underline">Create blog</a></h4>
                <h4><a href="/update" class="underline">Update blog</a></h4>
                <form method="POST" action="/logout">
                    @csrf
                    <button type="submit" class="underline">Logout</button>
                </form>
            </div>
            <p class="flex justify-center align-center font-thin">current time: {{ date('y-m-d H:ia') }}
            </p>
            <div class="flex justify-center align-center text-cyan-500 text-l mt-10 bg-cyan-100 mx-2 p-1 rounded-s">
                @if (count($blogs) > 1)
                    <h2> >>You have created {{ count($blogs) }} blogs<< </h2>
                        @elseif (count($blogs) == 1)
                            <h2> >>You have created {{ count($blogs) }} blog<< </h2>
                                @else
                                    <h2> >>You have created no blog<< </h2>
                @endif
            </div>
        @else
            <div class="flex justify-center align-center">
                <h4><a href="/login">Login to account</a></h4>
                <h4><a href="/register">Register </a></h4>
            </div>
        @endauth

        @auth
            <div class="grid grid-cols-1 gap-2 md:grid-cols-2 mx-2 mb-5">
                @foreach ($blogs as $blog)
                    <div class="mt-5 p-3 w-100 border-t-2">
                        <h1 class="text-xl font-thin"><span class="text-cyan-500 font-thin">Title: </span>{{ $blog->title }}
                        </h1>
                        <p><span>{{ $blog->date1 }}</span> <span>{{ $blog->date2 }}</span>
                        <p>
                        <p>
                            <span>{{ $blog->date3 }}</span>
                        </p>
                        <h2 class="mt-3 bg-slate-100 rounded-md p-2">
                            <span class="font-bold text-slate-300">{{ str_word_count($blog->description) }}
                                words</span><br>{{ $blog->description }}
                        </h2>
                    </div>
                @endforeach
            </div>
        @else
            <h2>create blogs by signing in or register if you have no account</h3>
            @endauth
    </div>
@endsection
