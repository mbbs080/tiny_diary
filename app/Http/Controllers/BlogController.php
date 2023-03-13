<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use Illuminate\Support\Facades\Auth;

use Illuminate\Contracts\Validation\ValidationRule;

class BlogController extends Controller
{
    // show all blogs
    public function index()
    {
        return view('blogs.index', [
            'blogs' => Blog::where('user_id', Auth::id())->latest()->filter(request(['tag']))->paginate(5),
            'notes' => Blog::where('user_id', Auth::id())->get()
        ]);
    }

    // create page
    public function create()
    {
        return view('blogs.create');
    }

    // store
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'title' => 'required',
            'tags' => 'required|string|min:3|max:35',
            'description' => 'required',
            'date1' => 'required',
            'date2' => 'required',
            'date3' => 'required',
        ]);

        $formFields['user_id'] = auth()->id();

        Blog::create($formFields);

        return redirect('/');
    }

    // update blog page
    public function edit(Blog $blog)
    {
        if ($blog->user_id != auth()->id()) {
            return (redirect('/'));
        }

        return view('blogs.edit', [
            'blog' => $blog
        ]);
    }

    // update blog submit
    public function update(Request $request, Blog $blog)
    {
        if ($blog->user_id != auth()->id()) {
            abort(403, "Unauthorised");
        }

        $formFields = $request->validate([
            'title' => 'required',
            'tags' => 'required',
            'description' => 'required',
            'date1' => 'required',
            'date2' => 'required',
            'date3' => 'required',
        ]);

        $blog->update($formFields);

        return redirect('/');
    }

    // delete blog
    public function destroy(Blog $blog)
    {
        if ($blog->user_id != auth()->id()) {
            abort(403, "Unauthorised");
        }

        $blog->delete();
        return redirect('/');
    }

    // updating page link page
    public function updatePage()
    {
        return view('blogs.update', [
            'blogs' => Blog::where('user_id', Auth::id())->latest()->get()
        ]);
    }

    /////////show single blog
    /* public function show(Blog $blog)
    {
        return view('blog', [
            'blog' => $blog
        ]);
    } */
}
