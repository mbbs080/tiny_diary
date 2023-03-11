@extends('layouts.master')

@section('content')
    <div class="bg-white-200 justify-center align-center flex-column pt-10">
        @auth
            <p class="flex justify-center align-center text-xl font-thin">
                Update note</p>
            <div class="flex justify-center align-center gap-4 mt-5 text-cyan-500">
                <h4><a href="/" class="underline">Dashboard</a></h4>
                <h4><a href="/blogs/create" class="underline">Create note</a></h4>
                <form method="POST" action="/logout">
                    @csrf
                    <button type="submit" class="underline">Logout</button>
                </form>
            </div>
            <p class="flex justify-center align-center font-thin">current time: {{ date('y-m-d H:ia') }}
            </p>
            <div class="flex justify-center align-center text-cyan-500 text-l mt-10 bg-cyan-100 mx-2 p-1 rounded-s">
                @if (count($blogs) > 1)
                    <h2> >>You have created {{ count($blogs) }} notes<< </h2>
                        @elseif (count($blogs) == 1)
                            <h2> >>You have created {{ count($blogs) }} note<< </h2>
                                @else
                                    <h2> >>You have created no note<< </h2>
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
                    <div class="mt-5 p-3 w-100">
                        <h1 class="text-xl font-thin"><span class="text-cyan-500 font-thin">Title: </span>{{ $blog->title }}
                        </h1>
                        <p><span>{{ $blog->date1 }}</span> <span>{{ $blog->date2 }}</span>
                        <p>
                        <p>
                            <span>{{ $blog->date3 }}</span>
                        </p>
                        <h2 class="mt-3 bg-cyan-100/20 whitespace-pre-line rounded-md p-2">
                            {{ $blog->description }}
                        </h2>
                        <div class="flex gap-3 align-center justify-left mt-2 text-slate-500">
                            <p class="text-cyan-500 px-2 rounded-sm">
                                <a href="/blogs/{{ $blog->id }}/edit">Edit</a>
                            </p>
                            <form method="POST" action="/blogs/{{ $blog->id }}" class="text-cyan-500 px-2 rounded-sm ">
                                @csrf
                                @method('DELETE')
                                <button>Delete</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <h2>create blogs by signing in or register if you have no account</h3>
            @endauth
    </div>
@endsection
