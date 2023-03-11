@extends('layouts.master')

@php
    //$user = 'admin';
    date_default_timezone_set('Africa/Lagos');
    $date1 = date('Y-m-d');
    $date2 = date('D');
    $date3 = date('H:ia');
@endphp


@section('content')
    <div class="flex item-center justify-center mt-7">
        <form action="/blogs" method="POST" class="px-2">
            @csrf
            <a class="flex align-center justify-center text-slate-400 underline" href="/">dashboard</a>
            <div>
                <h2 class="font-thin text-xl flex align-center justify-center mb-5 text-slate-400">Add something here</h2>
            </div>
            <div class="flex flex-col">
                <input placeholder="Title" type="text"
                    class="bg-slate-100/20 mt-2 p-1 rounded-md px-2 width-100 focus:outline-none" name="title"
                    value="{{ old('title') }}" />
                @error('title')
                    <p>{{ $message }}</p>
                @enderror
            </div>
            <div class="flex flex-col">
                <input placeholder="Add tag (sparate each word)" type="text"
                    class="bg-slate-100/20 mt-2 p-1 rounded-md px-2 focus:outline-none" name="tags"
                    value="{{ old('tags') }}" />
                @error('tags')
                    <p>{{ $message }}</p>
                @enderror
            </div>
            <div class="flex flex-col">
                <textarea placeholder="Details..." rows="8" cols="40"
                    class="textarea bg-slate-100/20 mt-2 border-2 rounded-md p-1 focus:outline-none resize-none" name="description">{{ old('description') }}</textarea>
                @error('description')
                    <p>{{ $message }}</p>
                @enderror
            </div>
            <input type="hidden" name="date1" value={{ $date1 }} />
            <input type="hidden" name="date2" value={{ $date2 }} />
            <input type="hidden" name="date3" value={{ $date3 }} />
            <div>
                <button type="submit" class="text-slate-400 underline font-thin text-m mt-3">submit </button>
            </div>

        </form>
    </div>
@endsection
