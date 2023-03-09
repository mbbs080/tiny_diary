@extends('layouts.master')


@section('content')
    <div class="flex item-center justify-center mt-7">
        <form action="/blogs/{{ $blog->id }}" method="POST">
            @csrf
            @method('PUT')
            <a class="flex align-center justify-center text-slate-400 underline" href="/">dashboard</a>
            <div>
                <h2 class="font-thin text-xl flex align-center justify-center mb-5 text-slate-400">Edit Blog</h2>
            </div>
            <div>
                <input placeholder="title" class="bg-slate-100 px-2 mt-2 p-1 rounded-md p-1 width-100 focus:outline-none"
                    type="text" name="title" value={{ $blog->title }} />
                @error('title')
                    <p>{{ $message }}</p>
                @enderror
            </div>
            <div>
                <input placeholder="Add some tag" class="bg-slate-100 px-2 mt-2 p-1 rounded-md p-1 focus:outline-none"
                    type="text" name="tags" value={{ $blog->tags }} />
                @error('tag')
                    <p>{{ $message }}</p>
                @enderror
            </div>
            <div>
                <textarea placeholder="Details..." rows="4" cols="40"
                    class="textarea bg-slate-100 mt-2 border-2 rounded-md p-1 focus:outline-none" name="description">{{ $blog->description }} </textarea>
                @error('description')
                    <p>{{ $message }}</p>
                @enderror
            </div>
            <input type="hidden" name="date1" value={{ $blog->date1 }} />
            <input type="hidden" name="date2" value={{ $blog->date2 }} />
            <input type="hidden" name="date3" value={{ $blog->date3 }} />
            <div>
                <button type="submit" class="text-slate-400 underline font-thin text-m">submit </button>
            </div>

        </form>
    </div>
@endsection
