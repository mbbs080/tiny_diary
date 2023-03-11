@extends('layouts.master')

@section('content')
    <div class="bg-white-200 justify-center align-center flex-column pt-10">
        @auth
            <div class="flex align-center flex-col md:flex-row md:gap-5 justify-center gap-3 px-5">
                <a href="/">
                    <h1 class="text-cyan-500 text-xl flex justify-center align-center"> Tiny Diary App... </h1>
                </a>
                <p class="flex justify-center align-center text-xl font-thin">
                    Welcome @<b>{{ auth()->user()->name }}</b>
                </p>
            </div>
            <div class="flex justify-center align-center gap-4 mt-5 text-cyan-500">
                <h4><a href="/blogs/create" class="underline">Create note</a></h4>
                <h4><a href="/update" class="underline">Update note</a></h4>
                <form method="POST" action="/logout">
                    @csrf
                    <button type="submit" class="underline">Logout</button>
                </form>
            </div>
            <div class="flex justify-center align-center text-cyan-500 text-l text-center mt-10 bg-cyan-100 mx-2 p-1 rounded-s">
                @if (count($notes) > 1)
                    <h2> >>You have created {{ count($notes) }} notes<< </h2>
                        @elseif (count($notes) == 1)
                            <h2> >>You have created {{ count($notes) }} note<< </h2>
                                @else
                                    <h2> >>You have created no note<< </h2>
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
                            <div class="mt-5 p-3 w-100 rounded-xl">
                                <h1 class="text-xl font-thin"><span class="text-cyan-500 font-thin">Title:
                                    </span class="capitalize">{{ $blog->title }}
                                </h1>
                                <p class="text-xs"><span>{{ $blog->date1 }}</span> <span>{{ $blog->date2 }}</span>
                                <p>
                                <p class="text-xs">
                                    <span>{{ $blog->date3 }}</span>
                                </p>
                                <ul class="mt-3 flex align-center justify-left gap-2">
                                    <span class="text-cyan-500 text-xl font-thin">Tag:</span>
                                    @php
                                        $tags = explode(' ', $blog->tags);
                                    @endphp
                                    @foreach ($tags as $tag)
                                        <li>
                                            <a href="/?tag={{ $tag }}"
                                                class="text-cyan-500 bg-cyan-100/20 rounded-md px-3">{{ $tag }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                                <h2 class="mt-1 bg-cyan-100/20 whitespace-pre-line rounded-md p-2 font-light text-l">
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
