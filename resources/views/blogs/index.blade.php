@extends('layouts.master')

@section('content')
    <div class="bg-white-200 justify-center align-center flex-column pt-10">
        @auth
            <p class="flex justify-center align-center text-2xl font-thin">
                Welcome @<b>{{ auth()->user()->name }}</b></p>
            <div class="flex justify-center align-center gap-4 mt-5 text-cyan-500">
                <h4><a href="/blogs/create" class="underline">Create blog</a></h4>
                <h4><a href="/update" class="underline">Update blog</a></h4>
                <form method="POST" action="/logout">
                    @csrf
                    <button type="submit" class="underline">Logout</button>
                </form>
            </div>
            <div class="flex justify-center align-center text-cyan-500 text-l text-center mt-10 bg-cyan-100 mx-2 p-1 rounded-s">
                @if (count($blogs) > 1)
                    <h2> >>You have created {{ count($blogs) }} Notes<< </h2>
                        @elseif (count($blogs) == 1)
                            <h2> >>You have created {{ count($blogs) }} Note<< </h2>
                                @else
                                    <h2> >>You have created no Note<< </h2>
                @endif
            </div>
        @else
            <h1 class="text-slate-500 text-2xl flex justify-center align-center"> >>Tiny Diary App<< </h1>
                    <div class="flex justify-center align-center gap-3 mt-5 underline text-cyan-500">
                        <h4><a href="/login">Login to account</a></h4>
                        <h4><a href="/register">Register </a></h4>
                    </div>
                @endauth

                @auth
                    <div class="grid grid-cols-1 gap-2 md:grid-cols-2 mx-2 mb-5">
                        @foreach ($blogs as $blog)
                            <div class="mt-5 p-3 w-100 border-t-2">
                                <h1 class="text-xl font-thin"><span class="text-cyan-500 font-thin">Title:
                                    </span>{{ $blog->title }}
                                </h1>
                                <p class="text-xs"><span>{{ $blog->date1 }}</span> <span>{{ $blog->date2 }}</span>
                                <p>
                                <p class="text-xs">
                                    <span>{{ $blog->date3 }}</span>
                                </p>
                                <h2 class="mt-3 bg-cyan-100/20 whitespace-pre-line rounded-md p-2">
                                    <span class="font-bold text-slate-300">{{ str_word_count($blog->description) }} words</span>
                                    {{ $blog->description }}
                                </h2>
                            </div>
                        @endforeach
                    </div>
                    <div class="mb-2 mx-2">{{ $blogs->links() }}</div>
                @else
                    <h2 class="flex justify-center align-center mt-5 text-3xl font-thin text-center mx-2 text-slate-500">
                        Create "tiny diaries" by signing in or register if you have no
                        account
                    </h2>
                @endauth
    </div>
@endsection
